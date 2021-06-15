<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    {{-- @if ($projectCollection) --}}
        {{-- @foreach (json_decode($projectCollection, true) as $item)
            <div>{{ $item['id'] }}</div>
        @endforeach --}}
    {{-- @endif --}}
    {{-- {{ var_dump($projectCollection) }} --}}
    {{-- {{ var_dump(json_decode($projectCollection, true)) }} --}}
    {{ dd($projectCollection) }}
    {{-- {{ json_decode($projectCollection)[0]->message }} --}}
</div>