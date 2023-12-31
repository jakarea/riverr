<div class="w-full">

    <div class="max-w-2xl mx-auto">

        {{-- Section title --}}
        <div
            class="bg-white dark:bg-zinc-700 px-8 py-6 rounded-lg border-b-2 border-gray-100 dark:border-zinc-700 mb-8 " style="box-shadow: 0px 7px 22px 0px rgba(143, 134, 195, 0.07)">
            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                <div class="ltr:ml-4 rtl:mr-4 mt-4">
                    <h3 class="mb-2 text-2xl text-[#363848] font-semibold">{{
                        __('messages.t_contact_us') }}</h3>
                    <p class="text-md text-[#363848] font-normal">{{
                        __('messages.t_contact_us_subtitle') }}</p>
                </div>
            </div>
        </div>

    </div>

    <div
        class="mb-12 bg-white dark:bg-zinc-800 shadow rounded-md  dark:border-zinc-700 dark:shadow-none max-w-2xl mx-auto">

        {{-- Section content --}}
        <div class="px-12 py-8 bg-white rounded-lg" style="box-shadow: 0px 7px 22px 0px rgba(143, 134, 195, 0.07)">
            <div class="grid grid-cols-12 gap-5">

                {{-- Fullname --}}
                <div class="col-span-12">
                    <x-forms.text-input :label="__('messages.t_name')"
                        :placeholder="__('messages.t_enter_your_fullname')" icon="account" model="name" />
                </div>

                {{-- Email address --}}
                <div class="col-span-12">
                    <x-forms.text-input :label="__('messages.t_email_address')"
                        :placeholder="__('messages.t_enter_email_address')" icon="at" model="email" type="email" />
                </div>

                {{-- Subject --}}
                <div class="col-span-12">
                    <x-forms.text-input :label="__('messages.t_subject')"
                        :placeholder="__('messages.t_enter_message_subject')" icon="format-text" model="subject" />
                </div>

                {{-- Message --}}
                <div class="col-span-12">
                    <x-forms.textarea :label="__('messages.t_message')"
                        :placeholder="__('messages.t_descibe_ur_message_in_details')" icon="file" model="message" />
                </div>

                {{-- Submit --}}
                <div class="col-span-12 mt-6">
                    <x-forms.button action="contact" :text="__('messages.t_lets_talk')" :block="true" />
                </div>

            </div>
        </div>

        {{-- Footer --}}
        <div
            class="px-4 py-6 bg-gray-50 dark:bg-zinc-700 border-t border-gray-200 dark:border-zinc-700 sm:px-10 text-center">
            <p class="text-xs leading-5 text-gray-500 dark:text-gray-300">
                {!! __('messages.t_by_continue_agree_terms_privacy', [
                'privacy_link' => settings('footer')->privacy ? url('page', settings('footer')->privacy->slug) : "#",
                'privacy_text' => settings('footer')->privacy ? settings('footer')->privacy->title :
                __('messages.t_privacy_policy'),
                'terms_link' => settings('footer')->terms ? url('page', settings('footer')->terms->slug) : "#",
                'terms_text' => settings('footer')->terms ? settings('footer')->terms->title :
                __('messages.t_terms_of_service'),
                ]) !!}
            </p>
        </div>

    </div>
</div>