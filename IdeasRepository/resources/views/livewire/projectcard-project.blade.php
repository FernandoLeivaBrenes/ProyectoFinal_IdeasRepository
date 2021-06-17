<div x-data="{ openUserInfo: true, toggle() { this.openUserInfo = ! this.openUserInfo } }" class="relative flex justify-around flex-col items-center my-3 md:my-20 min-w-full min-h-full">
    {{-- Down text content and shows user info --}}
    <div :class="{'animate-bounce' : !openUserInfo}" class="flex justify-center -mb-8 z-30 transform hover:translate-y-1">
        <img @click="toggle()" class="w-18 h-18 md:w-24 md:h-24 object-cover rounded-full | border border-gray-700 hover:border-{{ $project['access'] }}-500 shadow-md" src="{{ $project['userProfileImage'] }}" alt="profile users" loading="lazy">
    </div>
    <div class="relative shadow-lg rounded-lg overflow-hidden z-0">
        <div class="absolute flex flex-col justify-evenly items-center min-w-full min-h-full top-0 rounded-lg bg-gray-800 py-4">
            <div class="flex flex-col justify-between items-center">
                <h3 class="font-semibold tracking-wide text-gray-200 py-2">
                    {{ $project['userName'] }}
                </h3>
                <h3 class="font-semibold text-gray-200 py-2">
                    ( {{ $project['teamName'] }} )
                </h3>
                <h3 class="font-normal tracking-wider text-gray-300 py-2">
                    {{ $project['created'] }}
                </h3>
            </div>
            @auth
                <div class="flex items-center text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    <p class="font-medium">Pop</p>
                </div>
            @endauth
        </div>
        <div class="h-12"></div>
        <div  
            :class="{'animation-pullDown' : !openUserInfo }"
            class="relative flex-col w-full md:max-w-lg rounded-lg bg-gray-200 shadow-lg z-10 | border-t border-l-2 border-b-2 border-r-2 border-solid border-gray-500 hover:border-{{ $project['access'] }}-500 | transition">
            <div class="flex justify-between -mt-4 px-4">
                {{-- Access --}}
                <span class="inline-block px-3 pt-0.5 ring-4 bg-{{ $project['access'] }}-500 ring-gray-200 rounded-full text-sm font-normal tracking-wide text-gray-700">
                    {{ ucfirst($project['access']) }}
                </span>
                    {{-- Project Last Update --}}
                    <span class="flex h-min py-1 px-2 items-center space-x-2 rounded-full text-gray-800 bg-gray-200 text-xs font-medium ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-blue-500 font-semibold text-xs pr-1">
                            {{ $project['datesDiff'] }}
                        </p>
                    </span>
                </div>
                <div class="py-2 px-6">
                    {{-- Project Title --}}
                    <h1 class="text-xl font-medium leading-6 tracking-wide text-gray-800 hover:text-blue-500 cursor-pointer">
                        <a href="login">{{ $project['title'] }}</a>
                    </h1>
                </div>
                <div class="px-4 space-y-5 mx-5 pb-6 text-justify">
                    {{-- Project Content --}}
                    <p class="text-gray-700 font-normal leading-5 tracking-wide overflow-y-scroll sm:overflow-auto h-64 sm:h-24 md:h-full">
                        {{ $project['content'] }}
                    </p>
                    <a href="login" class="font-bold text-gray-700 hover:text-blue-400" >read more...</a>
                </div>
        </div>
    </div>
</div>