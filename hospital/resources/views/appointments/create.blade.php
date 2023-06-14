<!-- resources/views/appointments/create.blade.php -->


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patient') }}
        </h2>
        <h3 class="text-blue-500 text-2xl font-bold">
            {{ __('Your Appointements') }}
        </h3>
    </x-slot>

    <div class="pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="whiteb">
                <div class="div-gry">
                    <p class="txt">Doctor : {{ $doctor->name }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="whiteb">
                <div class="txt-center">Your appointments :</div>
                    <ul>
                        @foreach ($appointments as $appointment)
                            <div class="div-gry">
                                <li>Doctor: {{ $appointment->doctor_name }}, Patient: {{ $appointment->patient_name }}</li>
                                <li>from: {{ $appointment->start_time }}, to: {{ $appointment->end_time }}</li>
                            </div>
                        @endforeach
                    </ul>

                    <div class="div-gry">
                        <p class="txt">Take a new appointement</p>
                        <form class="form-date" action="{{ route('appointments.apcreate') }}" method="POST">
                            @csrf
                            <input type="hidden" name="doctor" value="{{ json_encode($doctor) }}">
                            <input type="date" name="date" id="date">

                            <select name="time" class="form-hour">
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
                            <div class="submit-button">
                                <button type="submit">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
