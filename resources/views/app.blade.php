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
                    <ul class="flex mr-auto gap-4 ml-4 my-3 hover:text">
                        <p>
                            ridders {logo}  
                        </p>
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