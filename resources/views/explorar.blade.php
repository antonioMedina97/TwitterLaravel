<x-app-layout>
    @section('contenido')
        <div>
                @foreach($users as $user)

                        <a href="{{$user->path()}}" class="flex mt-4 rounded-xl border-2 border-gray-300 items-center">
                        <img src="{{ $user->avatar }}" alt="avatar"  class="mr-4 w-16 h-16 flex rounded-full">

                        <span class=" font-bold "> {{ $user->name }} </span>
                            <div class="ml-auto mr-3">
                                <x-boton-seguir :user="$user"></x-boton-seguir>
                            </div>

                        </a>


                @endforeach
        </div>
    @endsection
</x-app-layout>