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
                    <form method="post" action="/course">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" placeholder="Title...">
                            
                        </div>
                        <div class="mb-3">
                            <input type='textarea' class="form-control" name="description" placeholder="Add a description..."/>
                        </div>
                    <div class="mb-3">
                            <input class="form-control" type="text" name="price" placeholder='Price...'>
                        </div> 
                        <button type="submit" class="btn btn-outline-dark">Add Course</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
