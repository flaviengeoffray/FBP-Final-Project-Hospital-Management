
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctor') }}
        </h2>
        <h3 class="text-blue-500 text-2xl font-bold">
            {{ __('Your Dashboard') }}
        </h3>
    </x-slot>

    <div class="pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="whiteb">
                <span class="txt-center">{{ Auth::user()->name }}</span>

                <div class="div-gry">
                    <div class="div1">
                        <span class="ml-2">Select a patient to give him a new medicine</span>
                        <button class="button">
                            <a href="{{ route('medications.create') }}">Give new medicine</a>
                        </button>
                    </div>
                </div>
                <div class="div-gry">
                    <form action="{{ route('appointements.docshow') }}" method="POST">
                        @csrf
                        <div class="div1">
                            <span class="ml-2">Check your appointements</span>
                            <button class="button">My appointments</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout> 