<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nurse') }}
        </h2>
        <h3 class="text-blue-500 text-2xl font-bold">
            {{ __('Your Dashboard') }}
        </h3>
    </x-slot>
    

    <div class="pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="whiteb">
                <div class="txt-center">Patients</div>

                @foreach ($patients as $patient)
                    <div class="div-gry">
                        <div class="div1">
                            <h2 class="txt">{{ $patient->name }}</h2>
                            <!-- Autres détails du patient -->
                            <a href="{{ route('prescriptions.show', $patient) }}" class="button">See prescriptions</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
