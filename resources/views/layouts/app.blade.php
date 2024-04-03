<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js']) --}}
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>{{ env('APP_NAME', 'Laravel project') }} - @yield('title', 'My page') </title>

    @vite('resources/js/app.js')

    @yield('css')
</head>

<body>
    <div id="app">
        <div class="wrapper">

            @include('partials.header')

            <main>
                @yield('content')
            </main>

            @include('partials.footer')
        </div>
        @yield('modal')
        @yield('js')

    </div>
</body>

</html>