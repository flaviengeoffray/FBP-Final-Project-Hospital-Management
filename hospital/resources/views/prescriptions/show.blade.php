<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nurse') }}
        </h2>
        <h3 class="text-blue-500 text-2xl font-bold">
            {{ __('Manage Presecriptions') }}
        </h3>
    </x-slot>

    <div class="pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="whiteb">
                <div class="txt-center">Prescriptions for {{ $patient->name }}</div>
                    <div class="div-gry">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Medication</th>
                                    <th>Dosage</th>
                                    
                                    <!-- Autres colonnes de la table -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prescriptions as $prescription)
                                    <tr>
                                        <td>{{ $prescription->medication->name }}</td>
                                        <td>{{ $prescription->medication->dosage }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('prescriptions.destroy', $prescription->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </td>
                                        <!-- Autres colonnes de la table -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

