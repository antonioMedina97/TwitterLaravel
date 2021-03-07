<div class="flex p-4 {{$loop->last ? '' : 'border-b-2 border-gray-300'}}">

    <div class="mr-2 flex-shrink-0">

        <a href="{{route('perfil', $tweet->user)}}">

            <img class="rounded-full mr-4 w-12 h-12 flex" src="{{ $tweet->user->avatar }}">
        </a>
    </div>

    <div class="flex-1">

        <h5 class="font-bold mb-4">
            <a href="{{route('perfil', $tweet->user)}}">
                {{ $tweet->user->name }}
            </a>
        </h5>
        <p class="text-sm">

            {{ $tweet->body }}

        </p>

        @if($tweet->user->is(auth()->user()) )
        <form method="post" action="{{ route('deleteTweet', ['tweet' => $tweet]) }}">
            @csrf
            @method('DELETE')
            <div class="flex">
                <button type="submit" class="bg-red-500  rounded-lg shadow text-white py-2 px-4 ml-auto" >
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>


        </form>
        @endif
    </div>
</div>