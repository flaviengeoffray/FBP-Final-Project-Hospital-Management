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
                    <a href="{{ route('medications.create') }}" class="btn btn-primary" style="display: inline-block; padding: 10px 20px; background-color: #337ab7; color: #fff; text-decoration: none; border-radius: 5px; transition: background-color 0.3s ease;">Give new medicine</a>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <form action="{{ route('appointements.docshow') }}" method="POST">
                    @csrf
                    <div style="height: 27px;"></div>
                    <button type="submit" style="display: inline-block; padding: 10px 20px; background-color: #337ab7; color: #fff; text-decoration: none; border-radius: 5px; transition: background-color 0.3s ease; margin-left: 25px;">See appointement</button>
                    <div style="height: 27px;"></div
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
