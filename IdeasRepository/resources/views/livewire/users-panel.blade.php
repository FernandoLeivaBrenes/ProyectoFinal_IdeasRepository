<div>
    <div class="container w-4/5 md:w-3/5 md:px-2 my-2 mx-auto grid grid-cols-4 gap-4">
        <a href="{{ route('admin_createView') }}" class="w-full col-span-1 flex justify-center items-center rounded-lg text-white text-center bg-green-500 hover:bg-green-400 outline-none">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-0 sm:mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </div>
            <div class="hidden sm:block">
                {{ __('Create') }}
            </div>
        </a>
        <x-jet-input wire:model="searchTerm" class="block mt-1 col-start-2 col-end-5 shadow-sm" type="text" placeholder="{{ __('Search') }}" />
    </div>

    <div class="container w-4/5 md:w-3/5 md:px-2 my-2 mx-auto">
        @if (session()->has('success_message'))
            <div id="success_message" class="container w-full flex justify-self-center | p-5 my-2 bg-teal-100 border-green-600 bg-green-300 border-l-2 rounded-r-lg">
                <div class="alert alert-success">{{session('success_message')}}</div>
            </div>
            <script>
                setTimeout(function(){document.getElementById('success_message').remove();},6000);
            </script>
        @elseif (session()->has('error_message'))
            <div id="error_message" class="container w-full flex justify-self-center | p-5 my-2 bg-teal-100 border-red-600 bg-red-300 border-l-2 rounded-r-lg">
                <div class="alert alert-danger">{{session('error_message')}}</div>
            </div>
            <script>
                setTimeout(function(){document.getElementById('error_message').remove();},6000);
            </script>
        @endif
    </div>

    <div class="overflow-x-auto">
        <div class="min-w-screen flex items-start justify-center font-sans overflow-hidden">
            <div class="w-full lg:w-4/6">
                <div class="w-full bg-white shadow-md rounded my-6">
                    <div class="w-full grid grid-rows-2 sm:grid-rows-none sm:grid-cols-4 justify-items-center justify-self-auto py-3 bg-gray-200 text-gray-600 uppercase text-sm leading-normal font-semibold">
                        <div class="sm:col-span-3">{{ __('User') }}</div>
                        <div class="sm:col-start-4">{{ __('Actions') }}</div>
                    </div>
                    @foreach ($users as $single_user)
                        <div class="w-full grid grid-cols-3 sm:grid-cols-4 grid-rows-2 sm:grid-rows-none mb-4 sm:mb-0 py-3 justify-self-auto border-b border-gray-200 hover:bg-gray-100">
                            {{-- User --}}
                            <div class="col-span-3 grid grid-cols-4 grid-rows-2">
                                {{-- Image --}}
                                <div class="col-span-1 row-span-2 flex justify-center items-center">
                                    <img class="w-16 h-16 rounded-full" src="{{ $single_user->profile_photo_url }}" alt="{{ $single_user->name }} photo">
                                </div>
                                {{-- Name & Email --}}
                                <div class="col-start-2 col-end-5 row-span-2 grid grid-rows-2">
                                    <div class="col-span-1 font-normal flex items-end">
                                        {{ $single_user->name }}
                                    </div>
                                    <div class="col-span-1 font-light text-gray-500 flex items-start">
                                        {{ $single_user->email }}
                                    </div>
                                </div>
                            </div>
                            {{-- Action --}}
                            <div class="row-start-2 sm:row-start-auto col-end-3 sm:col-end-auto sm:col-start-4 flex justify-evenly items-center">
                                <a wire:click="show({{ $single_user->id }})" class="w-5 transform hover:text-purple-500 hover:scale-125 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <a href="{{ route('admin_EditUser',  $single_user->id) }}" class="w-5 transform hover:text-blue-500 hover:scale-125 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <a wire:click="delete({{ $single_user->id }})" class="w-5 transform hover:text-red-500 hover:scale-125 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <x-jet-dialog-modal wire:model="modalOpened">
        <x-slot name="title">
            <h2>{{ ucfirst(__($action)) }}</h2>
        </x-slot>

        <x-slot name="content">
            @if ($action === 'delete')
                {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter to confirm you would like to permanently delete this account.') }} 
            @endif
            
            @if ($action === 'show')
                <div class="w-full grid grid-rows-3 gap-2 items-center justify-around">
                    <div class="grid grid-col-3 items-center justify-around">
                        <div class="col-span-1 pr-4">
                            <img class="w-20 h-20 rounded-full" src="{{ $userShowed->profile_photo_url }}" alt="{{ $userShowed->name }} photo">
                        </div>
                        <div class="col-start-2">{{ $userShowed->name }}</div>
                    </div>
                    <div>
                        <h4 class="text-gray-500">{{ __('Email') }} :</h4>
                        {{ $userShowed->email }}
                    </div>
                    <div>
                        <h4 class="text-gray-500">{{ __('Account created at') }} :</h4>
                        {{ $userShowedNewData['created_at'] }}
                    </div>
                </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalOpened')" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-jet-secondary-button>
            @if ($action === 'delete')
                <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Delete Account') }}
                </x-jet-danger-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>

    @if (!empty($users))
        {{ $users->links('vendor.livewire.custom') }}
    @endif
</div>
