<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctor') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Give a medication</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('medications.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="patient">Patient :</label>
                                <select name="patient" id="patient" class="form-control">
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="medication">Medication :</label>
                                <select name="medication_id" id="medication" class="form-control">
                                    @foreach($medications as $medication)
                                        <option value="{{ $medication->id }}">{{ $medication->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Autres champs de formulaire -->

                            <button type="submit" class="btn btn-primary">Prescrire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
