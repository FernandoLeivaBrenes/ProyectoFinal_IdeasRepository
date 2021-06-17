    @if ( isset(json_decode($projectCollection->content(), true)['message']))
    <div class="relative w-full h-full overflow-hidden">
        <div class="relative flex flex-row justify-center items-center h-full w-full">
            <h1 class="border border-solid border-red-500 bg-red-300 p-6 text-gray-100 rounded-full">
                {{ json_decode($projectCollection->content(), true)['message'] }}
            </h1>
        </div>
    @else
    <div class="relative w-full max-h-full overflow-hidden">
        <div class="flex flex-row overflow-x-scroll">
            @foreach (json_decode($projectCollection->content(), true) as $item)
                @livewire('projectcard-project', ['project'=> $item])
                <div class="relative px-3"></div>
            @endforeach
        </div>
    @endif
</div>