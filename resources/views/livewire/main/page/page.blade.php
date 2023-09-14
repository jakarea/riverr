<div class="w-full px-2 lg:px-0">
    <div class="w-full lg:max-w-4xl mx-auto">
        <div class="relative py-16 bg-white dark:bg-zinc-800 overflow-hidden rounded-xl shadow-sm border border-gray-100 dark:border-zinc-700"
            style="box-shadow: 0px 2px 28px rgba(62, 53, 120, 0.04)">
            <div class="relative px-4 sm:px-6 lg:px-8">
                <div class="text-lg mx-auto">
                    <h1>
                        <span
                            class="block text-xl text-center leading-8 font-extrabold tracking-wide text-gray-900 dark:text-gray-100 md:text-4xl mb-2">{{
                            $page->title }}</span>
                        <span
                            class="block text-sm text-center text-gray-400 dark:text-gray-300 font-normal tracking-widest">
                            {{ __('messages.t_page_last_update_date', ['date' => format_date($page->updated_at)]) }}
                        </span>
                    </h1>
                </div>
                <div
                    class="mt-16 dark:text-gray-200 quill-container break-words text-sm md:text-base leading-relaxed md:px-12 px-2 parental-spacing">
                    {!! htmlspecialchars_decode($page->content) !!}
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .parental-spacing h3,
    .parental-spacing h1,
    .parental-spacing h2 {
        margin: 1rem 0!important;
    }
</style>
@endpush