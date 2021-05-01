<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ Route::currentRouteName() . ' - ' . config('app.name') }}</title>
    <meta name="theme-color" content="#000000">

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>
    <script src="{{ asset('/js/app.js.map') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/app.css.map') }}" rel="stylesheet">
    <link href="{{ asset('/css/tools.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/tools.css.map') }}" rel="stylesheet">
</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('root') }}">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tools') }}">Tools</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Converters</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item disabled" href="#"><i>Future update</i></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Downloaders</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('tools.youtube-downloader') }}">Youtube</a>
                            <a class="dropdown-item" href="{{ route('tools.instagram-downloader') }}">Instagram</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><a href="{{ route('logout') }}">{{ __('Logout') }}</a></li>
                    <form id="logout-form" method="post" action="{{ route('logout') }}" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-5">
        @yield('content')
    </main>

    <footer class="bg-dark text-light">
        <div class="text-center py-3">Copyright &copy; 2020 - <?php echo date('Y', $_SERVER['REQUEST_TIME']); ?>
            <a href="{{ route('root') }}">{{ config('app.name') }}</a>
        </div>
    </footer>

</div>
</body>
</html>
