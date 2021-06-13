<div x-data="{ visible: true }" x-init="$watch('visible', ()=> changeVisible_{{ $inputId }}())" class="relative flex flex-col justify-center">

    <input id="{{ $inputId }}"
        class='border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full'
        :aria-visible="visible ? 'text' : 'password'"
        type="password"
        name="{{ $inputId }}"
        required
        autocomplete="{{ $autocomplete }}">

    <button @click=" visible = ! visible " type="button" class="absolute w-10 h-10 mt-1 right-px bg-gray-100 active:bg-gray-300 rounded-r-md border-l border-solid border-gray-300 button__container active:ring ring-green-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:stroke-current group-focus:stroke-current text-green-500 transition-colors p-auto" fill="none" viewBox="0 0 24 24" stroke="#606060">
            <path :class="{'hidden' : visible , 'block' : ! visible }" class="block"  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            <path :class="{'hidden' : ! visible , 'block' : visible }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path :class="{'hidden' : ! visible , 'block' : visible }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>
    </button>

    <script>
        function changeVisible_{!! $inputId !!}()
        {
            document.getElementById('{!! $inputId !!}').type = document.getElementById('{!! $inputId !!}').getAttribute('aria-visible');
        }
    </script>
</div>