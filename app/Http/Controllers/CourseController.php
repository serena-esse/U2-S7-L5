<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('courselist', ['courses' => Course::with('timetables')->with('timetables.bookings')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('addcourse');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $courseData=[
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price
        ];

        Course::create($courseData);
        $id= Course::where('title', $courseData['title'])->first()->id;

        return redirect('course/'.$id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('coursedetail', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {

        return view('editcourse', ['course' => $course]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course['title'] = $request->title;
        $course['description'] = $request->description;
        $course['price'] = $request->price;
        $course['updated_at'] = Carbon::now();

        $course->update();
        return redirect('course/'.$course->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if(Auth::user()-> is_admin) {
            $course->delete();
            return redirect('/course');
        }else {
            return 'non sei autorizzato';
        }
       
    }
}
