<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('contenido')

        <header class="mb-4">
            <img src="{{ asset('images/default-banner.png') }}" class="min-w-full rounded">

            <div class="flex justify-between items-center mt-4">
                <div class="flex">
                    <div>
                        <img class="rounded-full mr-4 w-16 h-16 flex" src="{{ $user->avatar }}">
                    </div>

                    <div>
                        <h2 class="font-bold">{{ $user->name }}</h2>
                        <p class="text-sm">Joinded {{ $user->created_at->diffForHumans() }}</p>
                    </div>


                </div>
                <div class="flex">
                    @can('edit', $user)

                        <x-boton-editar :user="$user"></x-boton-editar>

                    @endcan
                    <x-boton-seguir :user="$user"></x-boton-seguir>

                </div>
            </div>

            <p class="text-sm mt-4">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </header>

        @include('_timeline', ['tweets' => $user->tweets])
    @endsection
</x-app-layout>