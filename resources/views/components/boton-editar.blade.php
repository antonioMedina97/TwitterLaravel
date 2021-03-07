<form method="GET" action="{{ route('edit', ['user' => $user]) }}">
    @csrf
    @method('GET')

    <button type="submit" class=" rounded-lg shadow py-2 px-8 ml-2">
        Editar Perfil
    </button>
</form>
