<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctor') }}
        </h2>
        <h3 class="text-blue-500 text-2xl font-bold">
            {{ __('Give medications') }}
        </h3>
    </x-slot>

    <div class="pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="whiteb">
                <div class="card">
                    <div class="txt-center">Give a medication</div>

                    <div>
                        <form method="POST" action="{{ route('medications.store') }}">
                            @csrf

                            <div class="div-gry">
                                <div class="div2">
                                    <label for="patient">Patient </label>
                                    <select name="patient" class="form-control">
                                        @foreach($patients as $patient)
                                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="div-gry">
                                <div class="div2">
                                    <label for="medication">Medication </label>
                                    <select name="medication_id" class="form-control">
                                        @foreach($medications as $medication)
                                            <option value="{{ $medication->id }}">{{ $medication->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Autres champs de formulaire -->
                            <div class="submit-button">
                                <button type="submit">Prescribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
