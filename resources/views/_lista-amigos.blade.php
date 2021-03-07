<h3 class="font-bold text-xl  mb-4">Siguiendo</h3>
<ul>
    @foreach(auth()->user()->follows as $user)
    <li>
        <div class="flex items-center mb-4 text-sm">
            <a href="{{route('perfil', $user->name)}}" class="flex text-sm items-center ">
            <img class="rounded-full mr-4 w-16 h-16 flex" src="{{ $user->avatar }}">
            <span class="font-bold">
            {{ $user->name }}
            </span>
            </a>
        </div>
    </li>
    @endforeach


</ul>