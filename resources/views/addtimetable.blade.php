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
                    <form method="post" action="/timetable">
                        @csrf
                        <input type='hidden' class="form-control" name="course_id" value='{{$course_id}}'/>
                        <div class="mb-3">
                            <label for="">Select a day</label>
                            <select class="form-select" name="days">
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                            </select>
                        </div>
                        <div class="mb-3">
                        <label for="">Select a time</label>
                            <select class="form-select" name="time">
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                            </select>
                        </div>
                    <div class="mb-3">
                            <input class="form-control" type="number" name="available_places" placeholder='Set a number of available places...'>
                        </div> 
                        <button type="submit" class="btn btn-dark">Add Timetable</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
