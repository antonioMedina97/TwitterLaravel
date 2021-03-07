<div class="border border-green-400 rounded-lg py-6 px-8 mb-8">
    <form action="{{route('tweets.store')}}" method="POST">
        @csrf

        <textarea name="body" class="w-full" ></textarea>

        <footer class="flex justify-between  mt-4">

            <img class="rounded-full mr-4 w-12 h-12 flex" src="{{ auth()->user()->avatar }}">
            <button type="submit" class="bg-green-500 hover:bg-green-300 rounded-lg text-white shadow px-8">Twittear</button>

        </footer>

    </form>

    @error('body')
        <p class="text-red-500 text-sm pt-4">{{ $message }}</p>
    @enderror
</div>