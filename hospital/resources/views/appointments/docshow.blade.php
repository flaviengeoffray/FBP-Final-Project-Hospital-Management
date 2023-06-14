
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DOCTOR') }}
        </h2>
        <h3 class="text-blue-500 text-2xl font-bold">
            {{ __('Your Appointements') }}
        </h3>
    </x-slot>
    <div class="pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="whiteb">
                <div class="div-gry">
                    <ul>
                        @foreach ($appointments as $appointment)
                            <li>Doctor: {{ $appointment->doctor_name }}, Patient: {{ $appointment->patient_name }}</li>
                            <li>from: {{ $appointment->start_time }}, to: {{ $appointment->end_time }}</li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <form action="{{ route('appointments.delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                        <div class="submit-button">
                            <button type="submit">Delete the oldest appointement</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
