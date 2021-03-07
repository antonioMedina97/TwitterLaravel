
@unless(auth()->user()->is($user))
<form method="post" action="{{ route('follow', ['user' => $user]) }}">
    @csrf


    <button type="submit" class="bg-green-500  rounded-lg shadow text-white py-2 px-8 ml-2">
        {{ auth()->user()->following($user) ? 'Dejar de seguir' : 'Seguir' }}
    </button>
</form>
@endunless