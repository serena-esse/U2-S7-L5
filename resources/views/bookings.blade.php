<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold fs-1 text-center text-gray-800  leading-tight">
            {{ __('Bookings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                @if($bookings)


@foreach($bookings as $b) 
        <div class="card m-5" >
            <div class="card-body">
                <h5 class="card-title display-5">{{$b['timetable']['course']['title']}}</h5>
                <p class="card-text"><span class='fw-semibold text-decoration-underline'>Timetable:</span>{{$b['timetable']['days']}} {{$b['timetable']['time']}}</p>
                
                <p><span class='fw-semibold text-decoration-underline'>Booking date:</span> {{substr($b['created_at'], 0, -9 )}}</p>
             
                <h5 class="card-title fs-3 my-3 ">Price: <span>{{$b['timetable']['course']['price']}}  €/month</span></h5>
                <h5 class="card-title ">Status: 
                @if($b['status'] === 'confirmed')
                <span class="badge rounded-pill text-bg-success">Confirmed</span>
                @elseif ($b['status'] === 'pending')
                <span class="badge rounded-pill text-bg-secondary">Pending</span>
                @else
                <span class="badge rounded-pill text-bg-danger">Rejected</span>
                @endif
                </h5>
                @if(Auth::user()->is_admin)
                <form method="post" action="/booking/{{$b->id}}">
                    @csrf
                    @method('PATCH')
                    <select class="form-select" name="status">
                                    <option value="confirmed" @if ($b->status === "confirmed") {{ 'selected' }} @endif > Confirmed</option>
                                    <option value="pending" @if ($b->status === "pending") {{ 'selected' }} @endif >Pending</option>
                                    <option value="rejected" @if ($b->status === "rejected") {{ 'selected' }} @endif >Rejected</option>
                                   
                            </select>
                    <button type="submit" class="btn btn-outline-success mx-3 px-4" >Update Booking</button>
                </form>
                @endif
                
            </div>
                
            <div class="card-footer text-center">
                    
                <form method="post" action="/booking/{{$b->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger mx-3 px-4" ><i class="bi bi-trash3-fill"></i></button>
                </form>
                
            </div>
            
        </div>

       
@endforeach 
@endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 