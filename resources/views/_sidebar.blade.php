<ul>
    <li>
        <a
                class="font-bold text-lg mb-4 block"
                href="{{route('tweets.index')}}"
        >
            Home
        </a>
    </li>

    <li>
        <a
                class="font-bold text-lg mb-4 block"
                href="{{ route('explorar') }}"
        >
            Explorar
        </a>
    </li>

    @auth
        <li>
            <a
                    class="font-bold text-lg mb-4 block"
                    href="{{ route('perfil', auth()->user()) }}"
            >
                Perfil
            </a>
        </li>

        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="font-bold text-lg mb-4">Cerrar sesión</button>
            </form>
        </li>
    @endauth
    @if(auth()->user()->hasRole('admin'))
    <li>
        <a
                class="font-bold text-lg mb-4 block"
                href="{{ route('admin') }}"
        >
            Administrar
        </a>
    </li>
    @endif
</ul>
