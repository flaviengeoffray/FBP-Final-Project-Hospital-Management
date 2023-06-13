<!-- resources/views/appointments/create.blade.php -->


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PATIENT') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>you chose the doctor: {{ $doctor->name }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        @foreach ($appointments as $appointment)
                            <li>Doctor: {{ $appointment->doctor_name }}, patient: {{ $appointment->patient_name }}</li>
                            <li>from: {{ $appointment->start_time }}, to: {{ $appointment->end_time }}</li>
                            <li>----------------------------------------------------------------</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Créer un nouveau rendez-vous</h2>
                    <form action="{{ route('appointments.apcreate') }}" method="POST">
                        @csrf
                        <input type="hidden" name="doctor" value="{{ json_encode($doctor) }}">
                        <label for="date">Date :</label>
                        <input type="date" name="date" id="date">

                        <select name="time" id="time">
                            @for($hour = 8; $hour <= 20; $hour++)
                                @for($minute = 0; $minute < 60; $minute += 30)
                                    @php
                                        $time = sprintf('%02d:%02d', $hour, $minute);
                                        $timestamp = strtotime($time);
                                        $isDisabled = ($timestamp < strtotime('08:00') || $timestamp > strtotime('20:00'));
                                    @endphp
                                    <option value="{{ $time }}" @if($isDisabled) disabled @endif>{{ $time }}</option>
                                @endfor
                            @endfor
                        </select>

                        <button type="submit" style="display: inline-block; padding: 10px 20px; background-color: #337ab7; color: #fff; text-decoration: none; border-radius: 5px; transition: background-color 0.3s ease;">Creat appointement</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
</x-app-layout>
