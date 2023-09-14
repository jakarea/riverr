<div class="w-full">

	{{-- Hero section --}}
	<div class="rounded-xl px-7 pt-2.5 lg:min-h-[530px] md:bg-[120%] md:rtl:bg-[0] xl:bg-[100%] xl:rtl:bg-[0]   bg-contain bg-no-repeat  relative mx-auto dark:bg-zinc-800 dark:border-transparent lg:bg-[image:var(--projects-image-url)]"
		style="--projects-image-url: url({{ url('public/img/home/vector.png') }});">
		<div class="lg:max-w-2xl w-full">

			{{-- Headline --}}
			<h2 class="text-[#1F2131] text-3xl font-semibold mb-4">
				Find a professional for all your jobs in <br>
				and around the house
			</h2>

			{{-- Paragraph --}}
			<p class="text-sm leading-7 text-gray-500 dark:text-zinc-400">
				@lang('messages.t_complete_ur_most_pressing_work_with_project_catatlog')
			</p>

			{{-- Search form --}}
			<form class="flex items-center relative w-4/5 mt-28" action="{{ url('explore/projects') }}" accept="GET">
				{{-- Input --}}
				<div class="relative w-full">
					<div
						class="absolute inset-y-0 ltr:left-0 rtl:right-0 flex items-center ltr:pl-3 rtl:pr-3 pointer-events-none">
						<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
							viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd"
								d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
								clip-rule="evenodd"></path>
						</svg>
					</div>
					<input type="search" name="q" wire:model.defer="q"
						class="text-dark rounded-full shadow-[0_35px_60px_-15px_rgba(0,0,0,0.1)] border-1 text-base block w-full ltr:pl-10 rtl:pr-10 px-2.5 py-4 focus:outline-none focus:ring-0 dark:bg-zinc-700 dark:text-zinc-200 dark:placeholder:text-zinc-200 placeholder:font-normal border-zinc-200 h-16"
						placeholder="{{ __('messages.t_type_something_to_search_in_projects') }}" required>
				</div>

				{{-- Button --}}
				<button type="submit"
					class="px-5 py-4 ltr:ml-2 rtl:mr-2 text-sm font-medium text-white bg-primary-600 rounded-full border-none hover:bg-primary-800 focus:ring-0 focus:outline-none absolute right-2 top-0.8 z-9">
					@lang('messages.t_search')
				</button>
			</form>

			{{-- Popular categories --}}
			<div class="mt-5">
				@php
				$popular_categories =
				App\Models\ProjectCategory::whereHas('projects')->withCount('projects')->take(5)->orderBy('projects_count')->get();
				@endphp
				<div
					class="hidden sm:flex items-center text-slate-500 dark:text-zinc-200 font-semibold text-sm whitespace-nowrap">

					<ul class="flex ltr:ml-3 rtl:mr-3">
						@foreach ($popular_categories as $tag)
						<li class="flex ltr:mr-3 rtl:ml-3 whitespace-nowrap">
							<a href="{{ url('explore/projects', $tag->slug) }}"
								class="rounded-full border hover:bg-slate-100 hover:text-slate-500 transition-all duration-200 px-5 py-2 text-md text-[#363848] border-[#E9E6FE] dark:text-zinc-400 dark:border-zinc-700 dark:hover:bg-zinc-700 dark:hover:text-zinc-300 font-medium">
								{{ $tag->name }}
							</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>

		</div>
	</div>

	{{-- Categories --}}
	{{-- @if ($categories && $categories->count())
	<div class="w-full mt-8 lg:mt-20">

		<div class="block mb-8">
			<h1 class="text-xl md:text-2xl text-black dark:text-white font-bold tracking-wide">
				@lang('messages.t_browse_by_categories')
			</h1>
		</div>
 
		<div class="hidden -mx-2.5" id="projects-categories-slick" wire:ignore>
			@foreach ($categories as $category)
			<a href="{{ url('explore/projects', $category->slug) }}"
				class="relative !h-72 rounded-xl !flex !flex-col overflow-hidden group mx-2.5">
 
				<span aria-hidden="true" class="absolute inset-0">
					<img src="{{ src($category->thumbnail) }}" alt="{{ $category->name }}"
						class="w-full h-full object-center object-cover opacity-70 group-hover:opacity-100">
				</span>
 
				<span aria-hidden="true"
					class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-90"></span>
 
				<span class="relative mt-auto text-center text-xl font-bold text-white pb-6">
					{{ category_title('projects', $category) }}
				</span>

			</a>
			@endforeach
		</div>

	</div>
	@endif --}}

	@if ($categories && $categories->count())
            <div class="col-span-12 mt-6 xl:mt-6 mb-16">
                <span class="font-semibold text-[#363848] text-4xl dark:text-gray-200 tracking-wider text-center block">{{ __('messages.t_featured_categories') }}</span>
                {{-- <div class="flex-wrap justify-center items-center mt-8 -mx-5 hidden" id="featured-categories-slick" wire:ignore> --}}
                <div class="flex w-9/12 justify-center mx-auto mt-12" wire:ignore>

                    @foreach ($categories as $category)
                    <a href="{{ url('categories', $category->slug) }}" 
                        class="bg-white ease-in-out p-4 rounded-3xl mx-3 w-1/3 flex items-center" style="box-shadow: 0px 7px 22px 0px rgba(143, 134, 195, 0.07)">
                        <img src="{{ placeholder_img() }}" data-src="{{ src($category->thumbnail) }}" alt="{{ $category->name }}" class="lazy w-20 h-20 rounded-lg object-cover mr-4">

                        <h5 class="text-[#363848] font-semibold text-2xl">{{ $category->name }}</h5> 
                    </a>
                    @endforeach     
                </div>
            </div>
        @endif

	{{-- Latest projects --}}
	@if ($projects && $projects->count())
	<div class="w-full mt-8 lg:mt-20">

		{{-- Section head --}}
		<div class="block mb-8">
			<h1 class="text-xl md:text-2xl text-black dark:text-white font-bold tracking-wide">
				@lang('messages.t_latest_projects')
			</h1>
		</div>

		{{-- Section body --}}
		<div class="grid grid-cols-1 gap-4 lg:gap-8">
			@foreach ($projects as $project)

			@livewire('main.cards.project', [ 'id' => $project->uid ], key('project-card-id-' . $project->uid))

			@endforeach
		</div>

		{{-- Section footer --}}
		@if ($projects->hasPages())
		<hr class="my-10">
		<div class="px-4 py-5 sm:px-6 flex justify-center">
			{!! $projects->links('pagination::tailwind') !!}
		</div>
		@endif

	</div>
	@endif

</div>

@push('scripts')
<script defer type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
	document.addEventListener("DOMContentLoaded", function(){
			// Init featured categories slick
			$('#projects-categories-slick').slick({
				dots          : false,
				autoplay      : true,
				infinite      : true,
				speed         : 300,
				slidesToShow  : 6,
				slidesToScroll: 1,
				arrows        : false,
				responsive    : [
					{
					breakpoint: 1024,
						settings: {
							slidesToShow  : 4,
							slidesToScroll: 1
						}
					},
					{
					breakpoint: 800,
						settings: {
							slidesToShow  : 3,
							slidesToScroll: 1
						}
					},
					{
					breakpoint: 600,
						settings: {
							slidesToShow  : 3,
							slidesToScroll: 1
						}
					},
					{
					breakpoint: 480,
						settings: {
							slidesToShow  : 2,
							slidesToScroll: 1
						}
					}
				]
			});
			$('#featured-categories-slick').removeClass('hidden');
		});
</script>
@endpush

@push('styles')
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" type="text/css" />
@endpush