<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Course List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                @if($courses)


@foreach($courses as $c) 
        <div class="card m-5" >
            <div class='card-header d-flex justify-content-end'>
            @if(Auth::user()->is_admin === 1)
                <a type="button" class="btn btn-outline-warning mx-3 px-4" href="/course/{{$c->id}}/edit"><i class="bi bi-pencil-square"></i></a>
                <form method="post" action="/course/{{$c->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger mx-3 px-4" ><i class="bi bi-trash3-fill"></i></button>
                </form>
                @endif
            </div>
            <div class="card-body">
                <h5 class="card-title display-5">{{$c['title']}}</h5>
                <p class="card-text"><span class='fw-semibold text-decoration-underline'>Description:</span> {{$c['description']}}</p>
                
                <p><span class='fw-semibold text-decoration-underline'>Creation date:</span> {{substr($c['created_at'], 0, -9 )}}</p>
                <h5 class="fs-3">Price: <span>{{$c['price']}} €/month</span></h5>
              
            </div>
                
            <div class="card-footer text-center">
                    
                <a type="button" class="btn btn-outline-dark mx-3 px-4" href="/course/{{$c->id}}"><i class="bi bi-eye-fill"></i></a>
                
            </div>
            
        </div>

       
@endforeach 
@endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 


   