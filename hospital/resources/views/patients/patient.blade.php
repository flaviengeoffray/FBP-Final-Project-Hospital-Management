<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PATIENT') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My medicine</div>

                    <div class="card-body">
                        @if ($medications->count() > 0)
                            @foreach($medications as $medication)
                                <div>
                                    <h4>{{ $medication->medication->name }}</h4>
                                    <p>Dosage: {{ $medication->medication->dosage }}</p>
                                    <p>Instructions: {{ $medication->medication->instructions }}</p>
                                    <!-- Autres informations du médicament -->
                                </div>
                                <hr>
                            @endforeach
                        @else
                            <p>No medicine given.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
