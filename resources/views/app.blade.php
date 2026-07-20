<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ucwords(str_replace('.', ' ', getPageTitle())) . ' - ' . config('app.name') }}</title>
    <meta name="theme-color" content="#000000">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

    <!-- Scripts & Styles -->
    @vite([
        'resources/sass/app.scss',
        'resources/sass/style.scss',
        'resources/js/app.js',
        'resources/js/script.js',
    ])
</head>
<body>

@if($isAdmin)
    @include('includes.adminBar')
@endif

<div id="app">

    @include('includes.header')

    @include('includes.pageTitle')

    <main class="py-5">
        @yield('content')
    </main>

    @include('includes.footer')

</div>
</body>
</html>
