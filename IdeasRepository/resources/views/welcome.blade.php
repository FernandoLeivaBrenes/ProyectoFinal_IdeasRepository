<x-guest-layout>
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
            <div class="relative flex flex-col justify-around h-screen w-screen md:w-full">
                <h1 class=" mb-0 md:mb-9 text-gray-800 font-normal sm:font-light text-center tracking-wider text-4xl sm:text-6xl md:text-7xl">
                    {{ __('Public gallery') }}
                </h1>
                <div class="relative min-h-80 bg-green-500 rounded-lg drop-shadow-lg">
                    <x-carrousel.projects-carrousel/>
                </div>
            </div>
            <div class="relative flex flex-col justify-around h-screen w-screen md:w-full my-4">
                <h1 class=" mb-0 md:mb-9 text-gray-800 font-normal sm:font-light text-center tracking-wider text-4xl sm:text-6xl md:text-7xl">
                    {{ __('How to use') }}
                </h1>
                <div class="relative flex justify-center items-center w-full h-full rounded-lg drop-shadow-lg">
                    <div class="flex flex-row w-full h-3/5 rounded-lg">
                        <iframe class="w-full h-full " src="https://www.youtube.com/embed/tZnQrBF3GTs" title="YouTube video player" frameborder="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</x-guest-layout>