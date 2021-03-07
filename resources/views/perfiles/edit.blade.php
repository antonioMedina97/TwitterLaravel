<x-app-layout>
    @section('contenido')

        <div class="flex flex-col">
            <form action="{{ $user->path() }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-6">
                    <label for="name">Nombre de usuario</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}"
                           class="border border-green-400 p-2 w-full rounded-md">
                    @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}"
                           class="border border-green-400 p-2 w-full rounded-md">
                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label for="avatar">Avatar</label>
                    <div class="flex">

                        <input type="file" name="avatar" id="avatar"
                               class="border border-green-400 p-2 w-full rounded-md">
                        @error('avatar')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        <img src="{{ $user->avatar }}" class=" rounded-full w-16 h-16 flex">
                    </div>


                </div>

                <div class="mb-6">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password"
                           class="border border-green-400 p-2 w-full rounded-md">
                    @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation">Confirme la contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="border border-green-400 p-2 w-full rounded-md">
                    @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 ">
                    <button type="submit" class=" mr-2 mt-4   bg-green-400 text-white rounded py-2 px-4 hover:bg-green-500">
                        Enviar
                    </button>
                    <a href="{{ $user->path() }}">Cancelar</a>
                </div>
            </form>
        </div>
    @endsection
</x-app-layout>