<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Wiki') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen">
    <div class="m-6 grow" id="top">
        <nav class="flex justify-between text-lg pr-20">
            <a class="flex" href="{{ route('home') }}">
                <h1 class="text-3xl">Wiki</h1>
                <img class="w-12 h-8" src="{{ asset('img/placeholder.png') }}">
            </a>
            <a href="{{ route('test') }}">link</a>
            <a href="">link</a>
            <a href="">link</a>
            <search>
                <form class=" space-x-2" action="">
                    <input class="border border-gray-900 w-40" type="text" name="search">
                    <input type="submit" value="Search">
                </form>
            </search>
        </nav>
        <main class="bg-gray-200 px-10 py-12 m-10 mx-15 min-h-90">
            {{ $slot }}
        </main>
    </div>
    <footer class="flex bg-gray-50 border-t border-gray-200 p-12 px-24 pr-50 mt-auto justify-between text-lg">
        <div>
            <p>OSRSWiki</p>
            <p>Copyright 2025</p>
        </div>
        <a href="#top">Back to top</a>
    </footer>
</body>

</html>
