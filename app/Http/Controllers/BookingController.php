<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTimetableRequest;
use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Timetable;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->is_admin === 1) {
            return view('bookings', ['bookings' => Booking::with('user')->with('timetable.course')->get()]);
        } else { 
            return view('bookings', ['bookings' => Booking::where('user_id', Auth::id())->with('user')->with('timetable.course')->get()]);
        }
         
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreBookingRequest $request)
    {
        $bookingData = [
            
            'timetable_id' => $request->timetable_id,
            'status' => 'pending',
            'user_id' => auth()->id(), 
        ];
        $timetable = Timetable::findOrFail($request->timetable_id);
        $timetableData = [
            'available_places' =>($timetable->available_places)-1
        ];
        
        Booking::create($bookingData);  
        $timetable->update($timetableData);
        
        return redirect()->action([CourseController::class, 'index']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $booking['status'] = $request->status;

        $booking->update();
        return redirect('booking');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $timetable = Timetable::findOrFail($booking->timetable_id);
        $timetableData = [
            'available_places' =>($timetable->available_places)+1
        ];
        
        $timetable->update($timetableData);
            $booking->delete();
            return redirect('/booking');
        
    }
}
