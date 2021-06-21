<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg flex justify-center items-center">
                <div class="w-full sm:w-11/12 sm:max-w-sm mt-6 px-6 py-4 overflow-hidden sm:rounded-lg shadow-md bg-white border border-gray-300 border-solid">
                    <x-jet-validation-errors class="mb-4" />
                    
                    <form method="POST" action="{{ route('admin_create') }}">
                        @csrf
            
                        <div>
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>
            
                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>
                        
                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            {{-- <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" /> --}}
                            <x-password-toggle-input.password-input wire:model="password" inputId="password" autocomplete="current-password"/>
                        </div>
            
                        <div class="mt-4">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            {{-- <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" /> --}}
                            <x-password-toggle-input.password-input inputId="password_confirmation" autocomplete="new-password"/>
                        </div>
            
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms"/>
            
                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                        @endif
            
                        <div class="flex items-center justify-center mt-6">
                            <x-jet-button class="w-full justify-center bg-green-500 hover:bg-green-400">
                                {{ __('Create account') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>