<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('contenido')

        @include('_introducir-tweet')

        @include('_timeline')

    @endsection
</x-app-layout>
