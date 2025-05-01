<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="strippenkaart" content="klanten pagina voor uren">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Strippenkaart</title>
</head>
<div class="">

    <header>
        <div>
            <div>
                <nav class="nav-bar">
                    <ul class="flex items-center gap-4 ml-4 my-3 w-full">
                        <a href="{{ route('home') }}">Home</a>
                        @guest
                            <a href="{{route('login') }}">Login</a>
                            <a href="{{route('register') }}">Registreren</a>
                        @endguest                        
                        @auth
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                            <p class="ml-auto mr-5">Welkom {{ Auth::user()->voornaam }} </p>
                        @endauth
                    </ul>
                </nav>
            </div>
        </header>
        <body class="">
            @yield('content')
        </body>
        <footer>
            <div class="fixed bottom-0">
                <p>Footer :)</p>
            </div>
        </footer>
    </div>

</html>