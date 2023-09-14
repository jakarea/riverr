<div class="w-full">

    {{-- Section title --}}
    <div class="max-w-xl mx-auto mb-12 text-center block">
        <h1 class="text-xl md:text-2xl font-extrabold text-black dark:text-white">
            {{ __('messages.t_top_sellers') }}
        </h1>
        <p class="text-sm md:text-base text-gray-400 dark:text-gray-300 font-normal mt-2">
            {{ __('messages.t_hire_our_best_sellers') }}
        </p>
    </div>

    {{-- List of sellers --}}
    <ul role="list"
        class="grid grid-cols-1 md:gap-x-6 gap-y-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach ($sellers as $seller)
        <li class="col-span-1 flex flex-col  text-center bg-white p-10 rounded-xl" style="box-shadow: 0px 2px 28px rgba(62, 53, 120, 0.04)">
            <div class="flex flex-col"> 

                <div class="text-right">
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-dark" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                            <path
                                d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z" />
                        </svg>
                    </button>
                </div>

                <div id="dropdown"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 max-w-fit p-0">
                    <ul class="py-3 px-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="{{ url('messages/new', $seller->username) }}"
                                class="text-[#000] py-1 px-3 block hover:text-['#5F4BDB']"> 
                                {{ __('messages.t_contact_me') }}
                            </a>
                        </li>  
                        <li>
                            <a href="{{ url('profile', $seller->username) }}"
                                class="text-[#000] py-1 px-3 block hover:text-['#5F4BDB']"> 
                                {{ __('messages.t_view_profile') }}
                            </a>
                        </li>
                    </ul>
                </div>
 
                {{-- Avatar --}}
                <img class="flex-shrink-0 mx-auto rounded-full object-cover lazy w-28 h-28 mt-[-5px]"
                    src="{{ placeholder_img() }}" data-src="{{ src($seller->avatar) }}" alt="{{ $seller->username }}">

                @if ($seller->status === 'verified')
                <div
                    class="bg-[#5F4BDB] mx-7 rounded-full py-2 px-2 text-white text-center flex justify-center align-center mt-[-14px]">

                    <img data-tooltip-target="tooltip-account-verified-{{ $seller->id }}"
                        class="ltr:ml-0.5 rtl:mr-0.5 h-4 w-4 -mt-0.5"
                        src="{{ url('public/img/auth/verified-badge.svg') }}"
                        alt="{{ __('messages.t_account_verified') }}"> 

                    <div class="text text-xs">
                        {{ __('messages.t_account_verified') }}
                    </div>
                </div>
                @endif

                <h3 class="dark:text-gray-200 tracking-wider text-[#363848] text-2xl font-semibold mt-6">
                    {{ $seller->username }}
                </h3>
                <dl class="mt-1 flex-grow flex flex-col justify-between">
                    <dt class="sr-only">Level</dt>
                    <dd class="text-base font-normal text-[#363848]" style="color:{{ $seller->level->level_color }}">{{
                        $seller->level->title }}</dd>
                    <dt class="sr-only">Skills</dt>
                    <dd class="mt-5 space-x-2 rtl:space-x-reverse">
                        @foreach ($seller->skills()->limit(3)->get() as $skill)
                        <span
                            class="inline-flex mb-2 px-3 py-1.5 items-center text-gray-800 dark:text-zinc-400 text-xs font-medium bg-gray-100 dark:bg-zinc-700 rounded-full">
                            {{ $skill->name }}
                        </span>
                        @endforeach
                    </dd>
                </dl>
                <p class="ss text-[#636363] text-sm font-normal">
                    {{ Str::limit($seller->description, $limit = 80, $end = '..') }}
                </p>
            </div>
        </li>
        @endforeach
    </ul>

    {{-- Pages --}}
    @if ($sellers->hasPages())
    <div class="flex justify-center pt-12">
        {!! $sellers->links('pagination::tailwind') !!}
    </div>
    @endif

</div>