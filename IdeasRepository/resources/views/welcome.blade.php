<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="min-h-screen antialiased leading-none font-sans">
    {{-- {{ dd($_SERVER) }} --}}
    <div class="flex flex-col">
        @if(Route::has('login'))
            <div class="absolute top-0 right-0 mt-5 mr-6 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6">
                @auth
                    <a href="{{ url('/dashboard') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Dashboard') }}</a>
                @else
                    <a href="{{ route('login') }}">
                        <x-jet-button class="no-underline text-sm font-normal text-teal-100 uppercase transition-colors duration-100 ease-linear" type="button">
                            {{ __('Sign in') }}
                        </x-jet-button>
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Register') }}</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="min-h-screen flex flex-col items-center justify-center -z-20">
            <div class="flex flex-col justify-around h-screen relative mx-4">
                <div class="py-14 px-8">
                    <h1 class=" mb-0 md:mb-6 text-gray-700 text-center font-normal tracking-wider text-4xl sm:text-6xl">
                        {{ config('app.name') }}
                    </h1>
                    <ul class="hidden md:flex flex-col space-y-2 sm:flex-row sm:flex-wrap sm:space-x-8 sm:space-y-0">
                        <li>
                            <a href="https://laravel.com/docs" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Laravel">Laravel</a>
                        </li>
                        <li>
                            <a href="https://laracasts.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Laracasts">Laracasts</a>
                        </li>
                        <li>
                            <a href="https://nova.laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Nova">Nova</a>
                        </li>
                        <li>
                            <a href="https://forge.laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Forge">Forge</a>
                        </li>
                        <li>
                            <a href="https://vapor.laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Vapor">Vapor</a>
                        </li>
                        <li>
                            <a href="https://github.com/laravel/laravel" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="GitHub">GitHub</a>
                        </li>
                        <li>
                            <a href="https://tailwindcss.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Tailwind Css">Tailwind CSS</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col justify-around h-screen">
                <div>
                    <h1 class="mb-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:text-6xl">
                        {{ config('app.name', 'Laravel') }}
                    </h1>
                    <ul class="flex flex-col space-y-2 sm:flex-row sm:flex-wrap sm:space-x-8 sm:space-y-0">
                        <li>
                            <a href="https://laravel.com/docs" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Documentation">Documentation</a>
                        </li>
                        <li>
                            <a href="https://laracasts.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Laracasts">Laracasts</a>
                        </li>
                        <li>
                            <a href="https://laravel-news.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="News">News</a>
                        </li>
                        <li>
                            <a href="https://nova.laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Nova">Nova</a>
                        </li>
                        <li>
                            <a href="https://forge.laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Forge">Forge</a>
                        </li>
                        <li>
                            <a href="https://vapor.laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Vapor">Vapor</a>
                        </li>
                        <li>
                            <a href="https://github.com/laravel/laravel" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="GitHub">GitHub</a>
                        </li>
                        <li>
                            <a href="https://tailwindcss.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Tailwind Css">Tailwind CSS</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col justify-around h-screen">
                <div>
                    <h1 class="mb-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:text-6xl">
                        {{ config('app.name', 'Laravel') }}
                    </h1>
                    <ul class="flex flex-col space-y-2 sm:flex-row sm:flex-wrap sm:space-x-8 sm:space-y-0">
                        <li>
                            <a href="https://laravel.com/docs" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Documentation">Documentation</a>
                        </li>
                        <li>
                            <a href="https://laracasts.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Laracasts">Laracasts</a>
                        </li>
                        <li>
                            <a href="https://laravel-news.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="News">News</a>
                        </li>
                        <li>
                            <a href="https://nova.laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Nova">Nova</a>
                        </li>
                        <li>
                            <a href="https://forge.laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Forge">Forge</a>
                        </li>
                        <li>
                            <a href="https://vapor.laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Vapor">Vapor</a>
                        </li>
                        <li>
                            <a href="https://github.com/laravel/laravel" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="GitHub">GitHub</a>
                        </li>
                        <li>
                            <a href="https://tailwindcss.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Tailwind Css">Tailwind CSS</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
