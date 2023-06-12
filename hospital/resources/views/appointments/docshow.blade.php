
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DOCTOR') }}
        </h2>
    </x-slot>
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
                    <form action="{{ route('appointments.delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                        <button type="submit" class="btn btn-danger">Delete the oldest appointement</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
