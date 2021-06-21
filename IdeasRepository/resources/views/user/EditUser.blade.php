<x-app-layout>
    {{-- {{ dd($request->name) }} --}}
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
                    
                    <form method="POST" action="{{ route('admin_edit') }}">
                        @csrf
                        
                        <div class="hidden" >
                            <x-jet-input id="id" class="block mt-1 w-full" type="text" name="id" placeholder="{{ $userInfo->id }}" value="{{ $userInfo->id }}" required autofocus autocomplete="name" />
                        </div>

                        <div>
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="{{ $userInfo->name }}" value="{{ $userInfo->name }}" required autofocus autocomplete="name" />
                        </div>
            
                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="{{ $userInfo->email }}" value="{{ $userInfo->email }}" required />
                        </div>
            
                        <div class="flex items-center justify-center mt-6">
                            <x-jet-button class="w-full justify-center bg-green-500 hover:bg-green-400">
                                {{ __('Edit account') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>