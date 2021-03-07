<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('contenido')
        <div class="flex lg:justify-between">
            <div class="lg:w-32" >
                @include('_sidebar')
            </div>

            <div class="flex-1" style="width: 700px">
                @include('_introducir-tweet')

                @include('_timeline');
            </div>

            <div class="lg:w-1/6 lg:mx-10 bg-green-50 rounded-lg p-4">
                @include('_lista-amigos')
            </div>
        </div>
    @endsection
</x-app-layout>
