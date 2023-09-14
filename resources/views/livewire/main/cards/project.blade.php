<div
    class="flex flex-col rounded-[20px] bg-white overflow-hidden {{ $highlighted ? 'ltr:border-l-[6px] rtl:border-r-[6px] border-primary-600' : '' }}" style="box-shadow:0px 5px 12px 0px rgba(62, 53, 120, 0.07)">
    <div class="flex px-6 py-5 justify-between items-center">
        <div class="w w-1/4">
            {{-- Title --}}
            <a href="{{ url('project/' . $pid . '/' . $slug) }}"
                class="font-semibold lg:text-xl text-zinc-900 dark:text-white hover:text-primary-600 dark:hover:text-primary-400 mb-1 block">
                {{ $title }}
            </a>
            {{-- Category --}}
            <a href="{{ url('explore/projects', $category['slug']) }}"
                class="text-[#5F4BDB] text-base font-normal hover:text-black block">
                {{ $category['title'] }}
            </a>
        </div>
        <div>
            {{-- Details --}}
            <div class="flex items-center mt-1">

                <div class="w-14 h-14 rounded-full flex items-center justify-center bg-[#2bc155] mr-4">
                    <svg class="w-6 h-6 text-white" stroke="currentColor" fill="currentColor"
                        stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.707 2.293A.997.997 0 0 0 11 2H6a.997.997 0 0 0-.707.293l-3 3A.996.996 0 0 0 2 6v5c0 .266.105.52.293.707l10 10a.997.997 0 0 0 1.414 0l8-8a.999.999 0 0 0 0-1.414l-10-10zM13 19.586l-9-9V6.414L6.414 4h4.172l9 9L13 19.586z">
                        </path>
                        <circle cx="8.353" cy="8.353" r="1.647"></circle>
                    </svg>
                </div>

                <div>
                    <span class="text-lg font-medium text-[#2E2E2E] block">{{ $total_bids }} {{
                        strtolower(__('messages.t_bids')) }}</span>
                        @if ($budget_type === 'fixed')
                        <span class="text-[#8A8A8A] font-normal text-base block">{{
                            __('messages.t_fixed_price') }}</span>
                        @else
                        <span class=" text-[#8A8A8A] font-normal text-base block">{{
                            __('messages.t_hourly_price') }}</span>
                        @endif
                </div>
            </div>
        </div>
        <div>
            {{-- Details --}}
            <div class="flex items-center mt-1">
                <div class="w w-14 h-14 rounded-full flex items-center justify-center bg-[#fba556] mr-4">
                    <svg class="w-6 h-6 text-white" stroke="currentColor" fill="currentColor"
                        stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.707 2.293A.997.997 0 0 0 11 2H6a.997.997 0 0 0-.707.293l-3 3A.996.996 0 0 0 2 6v5c0 .266.105.52.293.707l10 10a.997.997 0 0 0 1.414 0l8-8a.999.999 0 0 0 0-1.414l-10-10zM13 19.586l-9-9V6.414L6.414 4h4.172l9 9L13 19.586z">
                        </path>
                        <circle cx="8.353" cy="8.353" r="1.647"></circle>
                    </svg>
                </div>
                <div>
                    <span class="text-lg font-medium text-[#2E2E2E] block">Min - {{ $budget_min }} </span> 
                    <span class="text-[#8A8A8A] font-normal text-base block">Max - {{ $budget_max }}</span> 
                </div>  
            </div>
        </div>
        <div>
            {{-- Skills --}}
            <div>
                @foreach ($skills as $skill)
                <div
                    class="font-medium flex px-3 py-1.5 text-xs rounded-sm border border-transparent text-gray-600 bg-gray-100 hover:bg-gray-200 hover:text-gray-500 dark:bg-primary-600 dark:text-white dark:hover:border-primary-600 dark:hover:bg-primary-200 dark:hover:text-primary-800 transition-colors duration-300 mb-2 last:mb-0">
                    {{ $skill->skill->name }}
                </div>
                @endforeach
            </div>
        </div>
        <div> 
            {{-- Bid now --}}
            <div class="flex flex-col">
                <a href="{{ url('project/' . $pid . '/' . $slug) }}"
                    class="text-[#5F4BDB] hover:text-white transition-colors duration-300 hidden rounded-full md:block dark:text-gray-100 dark:hover:text-white bg-[#F0EEFF] font-semibold text-base  py-3 px-12 hover:bg-[#5F4BDB]">
                    @if ($status === 'active')
                    <span>{{ __('messages.t_bid_now') }}</span>
                    @else
                    <span>{{ __('messages.t_view_project') }}</span>
                    @endif
                </a>
            </div>

            {{-- Urgent / Completed --}}
            @if ($status === 'completed')
            <span class="flex items-center justify-center relative">
                <span class="text-xs uppercase font-semibold tracking-widest text-green-500 dark:text-green-400">
                    {{ __('messages.t_project_completed') }}
                </span>
            </span>
            @elseif ($urgent)
            <span class="flex items-center justify-center relative">
                <span class="text-xs uppercase font-semibold tracking-widest text-red-500 animate-pulse">
                    {{ __('messages.t_urgent_project') }}
                </span>
            </span>
            @endif
        </div>
    </div>
</div>

{{-- Description --}}
{{-- <p class="leading-relaxed text-gray-500 dark:text-gray-400 mt-4 break-all" style="word-break: break-word;">
    {{ htmlspecialchars_decode($description) }}
</p> --}}