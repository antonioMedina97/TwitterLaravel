<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Twitter') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">


        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://kit.fontawesome.com/c5da83cac7.js" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans antialiased">

        <div id="app">
            <section class="px-8">
                <header class="container mx-auto">
                    <img src="{{ asset('images/logo.png') }}" class="w-16">
                    <h1>


                    </h1>
                </header>
            </section>

            <section class="px-8">
                <main class="container mx-auto">
                    <div class="flex lg:justify-between">
                        <div class="lg:w-32" >
                            @include('_sidebar')
                        </div>

                        <div class="flex-1" style="width: 700px">

                            @yield('contenido')


                        </div>

                        <div class="lg:w-1/6 lg:mx-10 bg-green-50 b-2 border border-green-400 rounded-lg p-4">
                            @include('_lista-amigos')
                        </div>
                    </div>
                </main>
            </section>

        </div>

    </body>
</html>
