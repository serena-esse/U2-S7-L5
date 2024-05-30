<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <form method="post" action="/course/{{$course->id}}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title..." value='{{$course->title}}'/>
                            
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <input type='textarea' class="form-control" name="description" placeholder="Add a description..." value='{{$course->description}}'>
                        </div>
                    <div class="mb-3">
                        <label for="">Price</label>
                        <input class="form-control" type="text" name="price" placeholder='Price...'  value='{{$course->price}}'>
                        </div> 
                        <button type="submit" class="btn btn-outline-dark">Edit course</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
