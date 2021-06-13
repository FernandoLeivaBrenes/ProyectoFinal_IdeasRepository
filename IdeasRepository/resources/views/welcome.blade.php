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
    <div class="flex flex-col items-center">
        @if(Route::has('login'))
            <div class="absolute top-0 right-0 mt-5 mr-6 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6 z-10">
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

        <div class="min-h-screen flex flex-col items-center justify-center w-full sm:w-3/5">
            <div class="relative flex flex-col justify-around h-screen">
                <div class="px-5 sm:px-0">
                    <h1 class=" mb-5 md:mb-9 text-gray-800 font-normal sm:font-light text-center tracking-wider text-4xl sm:text-6xl md:text-7xl">
                        {{ config('app.name') }}
                    </h1>
                    <h4 class="max-w-md md:max-w-2xl text-center text-gray-600 tracking-wide leading-relaxed">
                        {{ __('Store ideas, create projects, alone or with friends.') }}
                        {{ __('Include your project or idea here so that we can get to know it and in this way if you do not dare to develop it, someone can help you.') }}
                        <br>
                        <span class="hover:underline">{{ __('This is your site.') }}</span>
                    </h4>
                </div>
            </div>
            <div class="relative flex flex-col justify-around h-screen">
                <div>
                    <h1 class="mb-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:text-6xl">
                        {{ config('app.name', 'Laravel') }}
                    </h1>
                    {{-- <ul class="hidden md:flex flex-col space-y-2 sm:flex-row sm:flex-wrap sm:space-x-8 sm:space-y-0">
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
                    </ul> --}}
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
