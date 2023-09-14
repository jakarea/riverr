<div class="gig-card" x-data="window._{{ $gig->uid }}" dir="{{ config()->get('direction') }}">
    <div class="bg-white dark:bg-zinc-800 rounded-2xl shadow-current pt-0" style="box-shadow: 0px 2px 28px rgba(62, 53, 120, 0.04)">

        {{-- Preview --}}
        <a href="{{ url('service', $gig->slug) }}" class="flex items-center justify-center overflow-hidden w-full h-48 bg-white dark:bg-zinc-700">
            <img class="object-cover w-full h-full rounded-t-2xl" src="{{ src($gig->thumbnail) }}" data-src="{{ src($gig->thumbnail) }}" alt="{{ $gig->title }}">
        </a>

        {{-- Gig content --}}
        <div class="px-4 pb-2 mt-6  text-center">

             {{-- Title --}}
             <a href="{{ url('service', $gig->slug) }}" class="gig-card-title font-semibold text-[#363848] text-base dark:text-gray-100 hover:text-primary-600 dark:hover:text-white !overflow-hidden mb-3">
                {{ htmlspecialchars_decode($gig->title) }}
            </a>

            {{-- User --}}
            @if ($profile_visible)
                <div class="w-full mb-4 flex justify-center items-center">
                    <a href="{{ url('profile', $gig->owner->username) }}" target="_blank" class="flex-shrink-0 group block">
                        <div class="flex items-center">
                            <span class="inline-block relative">
                                <img class="h-6 w-6 rounded-full object-cover lazy" src="{{ src($gig->owner->avatar) }}" data-src="{{ src($gig->owner->avatar) }}" alt="{{ $gig->owner->username }}">
                            </span>
                            <div class="ltr:ml-3 rtl:mr-3">
                                <div class="text-[#5F4BDB] dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-300 flex items-center mb-0.5 font-normal tracking-wide text-base">
                                    {{ $gig->owner->username }}
                                    @if ($gig->owner->status === 'verified')
                                        <img data-tooltip-target="tooltip-account-verified-{{ $gig->uid }}" class="ltr:ml-0.5 rtl:mr-0.5 h-4 w-4 -mt-0.5" src="{{ url('public/img/auth/verified-badge.svg') }}" alt="{{ __('messages.t_account_verified') }}">
                                        <div id="tooltip-account-verified-{{ $gig->uid }}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            {{ __('messages.t_account_verified') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif

            {{-- Rating --}}
            <div class="flex items-center my-4" wire:ignore>
                {{-- Star --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>

                {{-- Rating --}}
                @if ($gig->rating == 0)
                    <div class=" text-[13px] tracking-widest text-amber-500 ltr:ml-1 rtl:mr-1 font-black">{{ __('messages.t_n_a') }}</div>
                @else
                    <div class=" text-sm tracking-widest text-amber-500 ltr:ml-1 rtl:mr-1 font-black">{{ $gig->rating }}</div>
                @endif

                {{-- Reviews --}}
                <div class="ltr:ml-2 rtl:mr-2 text-[13px] font-normal text-gray-400">
                    ( {{ number_format($gig->counter_reviews) }} )
                </div>
            </div>

            {{-- Price --}}
            <div class="gig-card-prices flex justify-between items-center py-4 pt-1">
                <small class="text-base !text-[#2E2E2E] font-normal">{{ __('messages.t_starting_at') }}</small>
                <span class="text-base !text-[#2E2E2E] font-semibold">@money($gig->price, settings('currency')->code, true)</span>
            </div>
        </div>

        {{-- Gig footer --}}
        <div class="px-3 py-3 bg-[#fdfdfd] dark:bg-zinc-800 border-t border-gray-50 dark:border-zinc-700 text-right sm:px-4 rounded-b-md flex justify-between items-center">

            <div class="flex items-center">
                {{-- Add to favorite --}}
                <button @auth @if ($favorite) wire:click="removeFromFavorite('{{ $gig->uid }}')" wire:target="removeFromFavorite('{{ $gig->uid }}')" @else wire:click="addToFavorite('{{ $gig->uid }}')" wire:target="addToFavorite('{{ $gig->uid }}')" @endif wire:loading.attr="disabled" @endauth @guest x-on:click="loginToAddToFavorite" @endguest data-tooltip-target="tooltip-add-to-favorites-{{ $gig->uid }}" class="rounded-full flex items-center justify-center -ml-1 focus:outline-none visited:outline-none w-14 h-14 border border-[#E6E6E6] group hover:bg-[#FF5353]">

                    {{-- Authenticated users --}}
                    @auth 
                        {{-- Button icon --}}
                        <div wire:loading.remove @if ($favorite) wire:target="removeFromFavorite('{{ $gig->uid }}')" @else wire:target="addToFavorite('{{ $gig->uid }}')" @endif>
                            <svg class="w-7 h-7 text-[#FF5353] group-hover:text-white {{ $favorite ? 'text-red-500 hover:text-red-600' : 'text-gray-400 hover:text-gray-500' }}" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                        </div>
                    @endauth

                    {{-- Guests --}}
                    @guest
                        <svg class="w-7 h-7 group-hover:text-white hover:text-[#FF5353] text-gray-400 " stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                    @endguest
                    
                </button>
                <div id="tooltip-add-to-favorites-{{ $gig->uid }}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    @if ($favorite)
                        {{ __('messages.t_remove_from_favorite') }}
                    @else
                        {{ __('messages.t_add_to_favorite') }}
                    @endif
                </div>
            </div> 

            <div class="details-bttn">
                <a href="{{ url('service', $gig->slug) }}" class="text-[#5F4BDB] hover:text-white transition-colors duration-300 hidden rounded-full md:block dark:text-gray-100 dark:hover:text-white bg-[#F0EEFF] font-semibold text-base py-4 px-10 hover:bg-[#5F4BDB] ml-4">View Details</a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    
    {{-- AlpineJs --}}
    <script>
        function _{{ $gig->uid }}() {
            return {

                // Login to add to favorite
                loginToAddToFavorite() {
                    window.$wireui.notify({
                        title      : "{{ __('messages.t_info') }}",
                        description: "{{ __('messages.t_pls_login_or_register_to_add_to_favovorite') }}",
                        icon       : 'info'
                    });
                }

            }
        }
        window._{{ $gig->uid }} = _{{ $gig->uid }}();
    </script>

@endpush