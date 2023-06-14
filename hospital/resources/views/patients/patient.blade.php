<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patient') }}
        </h2>
        <h3 class="text-blue-500 text-2xl font-bold">
            {{ __('Your Medicines') }}
        </h3>
    </x-slot>

    <div class="pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="whiteb">
                @if ($medications->count() > 0)
                    @foreach($medications as $medication)
                        <div class="div-gry">
                            <h4>{{ $medication->medication->name }}</h4>
                            <p>Dosage: {{ $medication->medication->dosage }}</p>
                            <p>Instructions: {{ $medication->medication->instructions }}</p>
                            <!-- Autres informations du médicament -->
                        </div>
                        
                    @endforeach
                @else
                    <p>No medicine given.</p>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
