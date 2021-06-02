<div class="min-h-screen flex flex-col content-center sm:justify-center items-center pt-6 sm:pt-0">
    <div>
        <x-jet-application-mark width="180px" class="{{ $errors->isNotEmpty() ? 'filter invert': '' }}"/>
    </div>

    <div class="{{ strpos($_SERVER['HTTP_USER_AGENT'],'Firefox') ? 'glass-AfterEffect ' : 'glass-Effect' }} w-full sm:max-w-md mt-6 px-6 py-4 shadow-xl overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
