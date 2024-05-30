<x-app-layout>
    <x-slot name="header">
        <h2 class=" fs-1 font-semibold  text-gray-800  leading-tight text-center">
            {{ __($course['title']) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
                                
            <div class="card text-center mx-5">
                <div class="card-header d-flex justify-content-end">
                @if(Auth::user()->is_admin === 1)
                                            <a type="button" class="btn btn-outline-warning mx-3 px-4" href="/course/{{$course->id}}/edit"><i class="bi bi-pencil-square"></i></a>
                                            
                                            <form method="post" action="/course/{{$course->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger mx-3 px-4" ><i class="bi bi-trash3-fill"></i></button>
                                            </form>
                                            @endif
                            
            </div>
            <div class="card-body text-start">
                <h4 class="card-title display-6">Description</h4>
                <p class="card-text ">{{$course['description']}}</p>
                <h5 class="fs-3 my-3">Price: <span>{{$course['price']}} €/month</span></h5>
                <hr>
                <div class='d-flex justify-content-between align-items-center'>
                <h4 class="card-title display-6">Availablity times</h4>
                @if(Auth::user()->is_admin === 1)
                <a type="button" class="btn btn-outline-success" href="/timetable/create?course_id={{$course['id']}}">Add timetable</a>
                @endif
                
                </div>
                
                @if($course['timetables'])
                                <ul>
                                    @foreach($course['timetables'] as $tt)
                                        <li class='mb-4'>
                                            <h4>Day: {{$tt['days']}} - {{$tt['time']}} </h4>
                                            <p>Available places: {{$tt['available_places']}}</p>
                                           
                                            @if(Auth::user()->is_admin === 1)
                                            <div class='d-flex justify-content-end'>
                                            <form method="post" action="/timetable/{{$tt->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger mx-3 px-4" ><i class="bi bi-trash3-fill"></i></button>
                                            </form>
                                            <a type="button" class="btn btn-outline-warning" href="/timetable/{{$tt['id']}}/edit">Edit</a>
                                            </div>
                                            @else
                                            <div> 
                                                @if ($tt->available_places === 0)
                                                <a type="button" class="btn btn-outline-success disabled" >Book</a>
                                                @else
                                                <a type="button" class="btn btn-outline-success" href="/booking/create?timetable_id={{$tt['id']}}">Book</a>
                                                @endif
                                            </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                                @endif
                                

            </div>
            
          
                                        
                                </div>
                        </div>
                    </div>
                
</x-app-layout>





                  
                   
                    
                


        
   