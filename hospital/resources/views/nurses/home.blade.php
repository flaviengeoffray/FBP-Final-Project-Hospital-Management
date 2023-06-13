<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nurse') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($patients as $patient)
                        <div>
                            <h2>Patient name: {{ $patient->name }}</h2>
                            <!-- Autres détails du patient -->

                            <a href="{{ route('prescriptions.show', $patient) }}" class="btn btn-primary" style="display: inline-block; padding: 10px 20px; background-color: #337ab7; color: #fff; text-decoration: none; border-radius: 5px; transition: background-color 0.3s ease;">See prescriptions</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
