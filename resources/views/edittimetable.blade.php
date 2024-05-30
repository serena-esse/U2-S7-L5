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
                    <form method="post" action="/timetable/{{$timetable->id}}">
                        @csrf
                        @method('PATCH')
                        <input type='hidden' class="form-control" name="course_id" value='{{$timetable->course_id}}'/>
                        <div class="mb-3">
                            <label for="">Select a day</label>
                            <select class="form-select" name="days">
                                    <option value="Monday" @if ($timetable->days === "Monday") {{ 'selected' }} @endif> Monday</option>
                                    <option value="Tuesday" @if ($timetable->days === "Tuesday") {{ 'selected' }} @endif>Tuesday</option>
                                    <option value="Wednesday" @if ($timetable->days === "Wednesday") {{ 'selected' }} @endif>Wednesday</option>
                                    <option value="Thursday" @if ($timetable->days === "Thursday") {{ 'selected' }} @endif>Thursday</option>
                                    <option value="Friday" @if ($timetable->days === "Friday") {{ 'selected' }} @endif>Friday</option>
                            </select>
                        </div>
                        <div class="mb-3">
                        <label for="">Select a time</label>
                            <select class="form-select" name="time">
                                    <option value="16:00"  @if ($timetable->time === "16:00:00") {{ 'selected' }} @endif >16:00</option>
                                    <option value="17:00" @if ($timetable->time === "17:00:00") {{ 'selected' }} @endif >17:00</option>
                                    <option value="18:00" @if ($timetable->time === "18:00:00") {{ 'selected' }} @endif >18:00</option>
                                    <option value="19:00" @if ($timetable->time === "19:00:00") {{ 'selected' }} @endif >19:00</option>
                                    <option value="20:00" @if ($timetable->time === "20:00:00") {{ 'selected' }} @endif >20:00</option>
                            </select>
                        </div>
                    <div class="mb-3">
                        <label for="">Available places</label>
                            <input class="form-control" type="number" name="available_places" placeholder='Set a number of available places...' value='{{$timetable->available_places}}'>
                        </div> 
                        <button type="submit" class="btn btn-outside-dark">Edit Timetable</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
