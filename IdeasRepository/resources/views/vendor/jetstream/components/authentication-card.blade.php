<div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0">
    <div class="flex flex-col justify-center items-center">
        <x-jet-authentication-card-logo width="180px" class="{{ $errors->isNotEmpty() ? 'filter invert': '' }}"/>

        <h1 class="mt-3 flex flex-row justify-center">
            @if (Route::currentRouteName() === 'login')
                <span class="text-gray-800">{{ __("Join IdeasRepository") }}</span>
            @else
                <span>{{ __("Create your account") }}</span>
            @endif
        </h1>
    </div>

    <div class="w-full sm:w-11/12 sm:max-w-sm mt-6 px-6 py-4 overflow-hidden sm:rounded-lg shadow-md bg-white border border-gray-300 border-solid">
        {{ $slot }}
    </div>
    
    @if (isset($link))
        <x-authentication-card-link>
            {{ $link }}
        </x-authentication-card-link>
    @endif

</div>
