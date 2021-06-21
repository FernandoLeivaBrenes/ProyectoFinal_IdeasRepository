<div>
    @if ( isset(json_decode($projectCollection->content(), true)['message']))
        <div class="relative flex flex-row justify-center items-center h-full">
            <h1 class="border border-solid border-red-500 bg-red-300 p-6 text-white rounded-full">
                {{ json_decode($projectCollection->content(), true)['message'] }}
            </h1>
        </div>
    @else
        <div class="flex flex-row flex-wrap justify-around">
            @foreach (json_decode($projectCollection->content(), true) as $item)
                @livewire('projectcard-project', ['project'=> $item])
            @endforeach
        </div>
    @endif
</div>