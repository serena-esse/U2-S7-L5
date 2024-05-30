<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Timetable;
use App\Http\Requests\StoreTimetableRequest;
use App\Http\Requests\UpdateTimetableRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreTimetableRequest $request)
    {
        return view('addtimetable', ['course_id' => $request->course_id]); 
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTimetableRequest $request)
    {
        $timetableData=[
            'course_id'=>$request->course_id,
            'days'=>$request->days,
            'time'=>$request->time,
            'available_places'=>$request->available_places
        ];

        Timetable::create($timetableData);
        $id= Course::where('id', $timetableData['course_id'])->first()->id;

        return redirect('course/'.$id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Timetable $timetable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Timetable $timetable)
    {
        return view('edittimetable', ['timetable' => $timetable]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTimetableRequest $request, Timetable $timetable)
    {
        $timetable['days'] = $request->days;
        $timetable['time'] = $request->time;
        $timetable['available_places'] = $request->available_places;
        $timetable['updated_at'] = Carbon::now();

        $timetable->update();
        return redirect('course/'.$timetable->course_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timetable $timetable)
    {
        if(Auth::user()-> is_admin) {
            $timetable->delete();
            return redirect('course/'.$timetable->course_id);
        }else {
            return 'non sei autorizzato';
        }
    }
}
