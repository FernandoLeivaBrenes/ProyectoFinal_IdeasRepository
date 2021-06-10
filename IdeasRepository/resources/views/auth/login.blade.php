<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <div class="flex flex-row justify-between content-center">
                    <x-jet-label for="password" class="inline" value="{{ __('Password') }}" />
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-blue-500 hover:text-blue-300" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <x-password-toggle-input.password-input inputId="password" autocomplete="current-password"/>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-6">
                <x-jet-button class="w-full justify-center bg-green-500 hover:bg-green-400">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
        
        <x-slot name='link'>
            @if (Route::has('register'))
                <span class="text-sm text-gray-900">{{ __('New in IdeasRepository?') }} &nbsp;</span>

                <a class="underline text-sm text-blue-500 hover:text-blue-300" href="{{ route('register') }}">
                    {{ __('Create an account') }}
                </a>
            @endif
        </x-slot>

    </x-jet-authentication-card>
</x-guest-layout>
