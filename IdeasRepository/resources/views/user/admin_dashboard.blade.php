<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                @livewire('users-panel')
            </div>
        </div>
    </div>
</x-app-layout>