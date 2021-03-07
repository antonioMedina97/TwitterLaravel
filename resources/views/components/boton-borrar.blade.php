
<form method="post" action="{{ route('delete', ['user' => $user]) }}">
    @csrf
    @method('DELETE')

    <button type="submit" class="bg-red-500  rounded-lg shadow text-white py-2 px-8 ml-2">
        Eliminar
    </button>
</form>