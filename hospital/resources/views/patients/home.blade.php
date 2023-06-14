<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patient') }}
        </h2>
        <h3 class="text-blue-500 text-2xl font-bold">
            {{ __('Your Dashboard') }}
        </h3>
    </x-slot>

    <div class="pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="whiteb">
                <div class="submit-button">
                    <a href="{{ route('medications.patient') }}">See my medicine</a>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="whiteb">
                <div class="txt-center">Take an appointement</div>
                <div class="div-gry">
                    <div class="div1">
                        <span class="txt">Select a doctor to take an appointement</span>
                    </div>
                    <form action="{{ route('appointments.create') }}" method="POST">
                        @csrf
                        <label for="doctor">Chose a doctor: </label>
                        <select name="doctor" class="form-control">
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                        <div class="submit-button">
                            <button type="submit">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
