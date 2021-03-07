<div class="border border-gray-300 rounded-lg">

    @forelse($tweets as $tweet)

        @include('_tweet')

    @empty

        <div class="p-4">
            <span class="p-4">No hay tweets</span>
        </div>

    @endforelse

</div>