<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Projects') }}
    </h2>
</x-slot>

<div class="block min-h-screen">

    @if (session()->has('message'))
        <div id="error_message" class="container flex justify-self-center w-full | p-5 my-2 bg-teal-100 border-blue-600 border-l-2 rounded-r-lg">
            <div class="alert alert-success">{{session('message')}}</div>
        </div>
        <script>
            setTimeout(function(){document.getElementById('error_message').remove();},6000);
        </script>
    @endif

<div class="min-h-screen flex flex-col items-center justify-center w-full">
    <x-carrousel.projects-carrousel/>
</div>

    {{-- {{ $projects->links() }} --}}
</div>
