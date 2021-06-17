<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Projects') }}
    </h2>
</x-slot>

<div class="block min-h-screen">
    {{-- @if (Auth::user()->isAtAdminTeam())
        <div class="container px-4 md:px-2 my-2">
            <input wire:model="search" class="form-input rounded-md shadow-sm mt-1 block w-full" type="text" placeholder="Search projects">
        </div>
    @endif --}}

    @if (session()->has('message'))
        <div id="error_message" class="container flex justify-self-center w-full | p-5 my-2 bg-teal-100 border-blue-600 border-l-2 rounded-r-lg">
            <div class="alert alert-success">{{session('message')}}</div>
        </div>
        <script>
            setTimeout(function(){document.getElementById('error_message').remove();},6000);
        </script>
    @endif
    {{-- {{ dd($projects) }} --}}
    @foreach($projects as $project)
        <fieldset class="p-2 md:p-5 my-12 mx-8 | relative grid grid-cols-7 gap-3 items-center | bg-gray-100 bg-opacity-90 rounded-lg md:rounded-md border-{{ $project->access }} border-2 | shadow-md transform hover:-translate-y-1 hover:translate-x-1 hover:shadow-lg">
            <legend class="absolute p-1 px-3 rounded-full text-sm bg-{{ $project->access }}"><b>{{ ucfirst(trans($project->access)) }}</b></legend>
            {{-- <a id="title" href="{{ route('oneProjetc',['id' => $project->id]) }}" class="cursor-pointer | pt-3 md:p-0 md:col-span-7 md:col-start-1 md:col-end-7 col-span-8 col-start-1 col-end-8 top-0 ">
                {{ dd($project) }} --}}
                <h2>{{ $project->title }}</h2>
            {{-- </a> --}}
            <div id="control" x-data="{ open: false }" class="absolute right_top p-1 md:relative md:col-span-12 md:col-start-7 md:col-end-12 right_top md:top-auto md:right-auto flex justify-end rounded-full | border-{{$project->access}} border-2 bg-gray-100 shadow-md md:border-transparent md:border-0 md:bg-transparent md:shadow-none">
                <div class="hidden sm:flex sm:items-center ml-6">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button @click="open = ! open">
                                <button class="group | border-gray-800 border-2 rounded-full ring-2 
                                | relative justify-self-end md:p-1 m-0.5 md:h-11 md:w-11 h-9 w-9 text-sm
                                | hover:bg-gray-800 hover:text-white hover:border-0 hover:stroke-2">
                                    <h1 class="text-gray-800 relative top-0 group-hover:text-white hover:shadow-md">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </h1>
                                </button>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <div class="actions p-1 flex justify-evenly">
                                <button class="group | border-pink-600 border-2 rounded-full ring-2 
                                | relative justify-self-end md:p-1 m-0.5 md:h-11 md:w-11 h-9 w-9 text-sm
                                | hover:bg-pink-600 hover:text-white hover:border-0 hover:stroke-2">
                                    <h1 class="text-pink-600 relative top-0 group-hover:text-white hover:shadow-md">
                                        <i class="fa fa-heart-o"></i>
                                    </h1>
                                </button>
                                @if (Auth::user()->belongsToTeamById($project->team_id))
                                    {{-- <button wire:click="" class="group | border-teal-600 border-2 rounded-full ring-2 
                                    | justify-self-end md:p-1 m-0.5 md:h-11 md:w-11 h-9 w-9 text-sm 
                                    | hover:bg-teal-600 hover:text-white hover:border-0 hover:stroke-2">
                                        <h1 class="text-teal-600 font-bold group-hover:text-white hover:shadow-md">
                                            <i class="fa fa-pencil"></i>
                                        </h1>
                                    </button>     --}}
                                    <button wire:click="intoTrash({{ $project->id }})" class="group | border-red-600 border-2 rounded-full ring-2 
                                    | justify-self-end md:p-1 m-0.5 md:h-11 md:w-11 h-9 w-9 text-sm 
                                    | hover:bg-red-600 hover:text-white hover:border-0 hover:stroke-2">
                                        <h1 class="text-red-600 font-bold group-hover:text-white hover:shadow-md">
                                            <i class="fa fa-trash-o"></i>
                                        </h1>
                                    </button>
                                @endif
                            </div>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="block group | border-gray-800 border-2 rounded-full ring-2 
                    | relative justify-self-end h-9 w-9 text-sm m-1 left-0
                    | hover:bg-gray-800 hover:text-white hover:border-0 hover:stroke-2 transition duration-150 ease-in-out">
                        <h1 class="text-gray-800 font-bold group-hover:text-white hover:shadow-md">
                            <i class="fa fa-ellipsis-v"></i>
                        </h1>
                    </button>
                </div>
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="actions flex justify-evenly">
                        <button class="group | border-pink-600 border-2 rounded-full ring-2 
                        | relative justify-self-end md:p-1 m-0.5 md:h-11 md:w-11 h-9 w-9 text-sm
                        | hover:bg-pink-600 hover:text-white hover:border-0 hover:stroke-2">
                            <h1 class="text-pink-600 relative top-0 group-hover:text-white hover:shadow-md">
                                <i class="fa fa-heart-o"></i>
                            </h1>
                        </button>
                        @if (Auth::user()->belongsToTeamById($project->team_id))
                            {{-- <button wire:click="" class="group | border-teal-600 border-2 rounded-full ring-2 
                            | justify-self-end md:p-1 m-0.5 md:h-11 md:w-11 h-9 w-9 text-sm 
                            | hover:bg-teal-600 hover:text-white hover:border-0 hover:stroke-2">
                                <h1 class="text-teal-600 font-bold group-hover:text-white hover:shadow-md">
                                    <i class="fa fa-pencil"></i>
                                </h1>
                            </button> --}}
                            <button wire:click="intoTrash({{ $project->id }})" class="group | border-red-600 border-2 rounded-full ring-2 
                            | justify-self-end md:p-1 m-0.5 md:h-11 md:w-11 h-9 w-9 text-sm 
                            | hover:bg-red-600 hover:text-white hover:border-0 hover:stroke-2">
                                <h1 class="text-red-600 font-bold group-hover:text-white hover:shadow-md">
                                    <i class="fa fa-trash-o"></i>
                                </h1>
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <hr class="col-span-12">
            <div class="col-span-7 h-15 overflow-ellipsis overflow-hidden">
                <p>{{ ucfirst(trans($project->content)) }}</p>
            </div>
            <hr class="col-span-12">
            <div class="col-span-12 md:col-span-12 md:col-start-1 md:col-end-7 | text-gray-600">
                <h5>Created by <b>{{ $project->userName }}</b>, <b class="">{{ ucfirst(trans($project->teamName)) }}</b></h5>
            </div>
            <div class="col-span-11 md:col-span-12 md:col-start-7 md:col-end-12 | text-gray-600 text-right">
                <h6>{{ $project->created_at }}</h6>
            </div>
        </fieldset>
    @endforeach

    {{-- {{ $projects->links() }} --}}
</div>
