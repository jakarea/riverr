<div class="w-full">

    <div class="bg-[#5F4BDB] pt-14 pb-20 text-center">
		<h1 class="text-white text-3xl font-semibold">{{ $skill->name }}</h1>
		<ol class="inline-flex items-center mb-3 space-x-1 md:space-x-3 rtl:space-x-reverse sm:mb-0 mt-4">

			{{-- Home --}}
			<li>
				<div class="flex items-center">
					<a href="{{ url('/') }}"
						class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-white  ltr:md:ml-2 rtl:md:mr-2 dark:text-zinc-300 dark:hover:text-white">
						@lang('messages.t_home')
					</a>
				</div>
			</li>

			{{-- Projects --}}
			<li aria-current="page">
				<div class="flex items-center text-white">
					/ 
                    <a href="{{ url('explore/projects') }}"
                        class="ltr:ml-2 rtl:mr-2 text-sm font-medium text-white hover:text-gray-700 dark:text-zinc-300 dark:hover:text-zinc-100">
                        @lang('messages.t_explore_projects')
                    </a>

				</div>
			</li>
			<li aria-current="page">
				<div class="flex items-center text-white">
					/ 
                    <a href="{{ url('explore/projects', $category->slug) }}"
                        class="ltr:ml-2 rtl:mr-2 text-sm font-medium text-white hover:text-gray-700 dark:text-zinc-300 dark:hover:text-zinc-100"
                        aria-current="page">
                        {{ category_title('projects', $category) }}
                    </a>

				</div>
			</li>

			{{-- Project title --}}
			<li aria-current="page">
				<div class="flex items-center text-white">
					/
					<span
                        class="ltr:ml-2 rtl:mr-2 text-sm font-medium text-white hover:text-gray-700 dark:text-zinc-300 dark:hover:text-zinc-100"
                        aria-current="page">
                        {{ $skill->name }}
                    </span>
				</div>
			</li>

		</ol>
	</div>

    <div class="px-32 max-w-screen-xl mx-auto mb-12">
        {{-- Projects --}}
        <div class="w-full mt-8 lg:mt-16">

            {{-- Section body --}}
            <div class="grid grid-cols-1 gap-4 lg:gap-8">
                @forelse ($projects as $project)

                @livewire('main.cards.project', [ 'id' => $project->uid ], key('project-card-id-' . $project->uid))

                @empty

                {{-- Nothing to show --}}
                <div
                    class="border-dashed border-2 border-gray-200 rounded py-16 text-center font-normal tracking-wider text-gray-300 text-base dark:border-zinc-700 dark:text-zinc-500">
                    @lang('messages.no_results_found')
                </div>

                @endforelse
            </div>

            {{-- Section footer --}}
            @if ($projects->hasPages())
            <hr class="my-10">
            <div class="px-4 py-5 sm:px-6 flex justify-center">
                {!! $projects->links('pagination::tailwind') !!}
            </div>
            @endif

        </div>
    </div>



</div>