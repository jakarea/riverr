<div class="w-full">

	
	<div class="rounded-xl px-7 pt-2.5 lg:min-h-[530px] md:bg-[120%] md:rtl:bg-[0] xl:bg-[100%] xl:rtl:bg-[0]   bg-contain bg-no-repeat  relative mx-auto dark:bg-zinc-800 dark:border-transparent lg:bg-[image:var(--projects-image-url)]"
		style="--projects-image-url: url(<?php echo e(url('public/img/home/vector.png'), false); ?>);">
		<div class="lg:max-w-2xl w-full">

			
			<h2 class="text-[#1F2131] text-3xl font-semibold mb-4">
				Find a professional for all your jobs in <br>
				and around the house
			</h2>

			
			<p class="text-sm leading-7 text-gray-500 dark:text-zinc-400">
				<?php echo app('translator')->get('messages.t_complete_ur_most_pressing_work_with_project_catatlog'); ?>
			</p>

			
			<form class="flex items-center relative w-4/5 mt-28" action="<?php echo e(url('explore/projects'), false); ?>" accept="GET">
				
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
						placeholder="<?php echo e(__('messages.t_type_something_to_search_in_projects'), false); ?>" required>
				</div>

				
				<button type="submit"
					class="px-5 py-4 ltr:ml-2 rtl:mr-2 text-sm font-medium text-white bg-primary-600 rounded-full border-none hover:bg-primary-800 focus:ring-0 focus:outline-none absolute right-2 top-0.8 z-9">
					<?php echo app('translator')->get('messages.t_search'); ?>
				</button>
			</form>

			
			<div class="mt-5">
				<?php
				$popular_categories =
				App\Models\ProjectCategory::whereHas('projects')->withCount('projects')->take(5)->orderBy('projects_count')->get();
				?>
				<div
					class="hidden sm:flex items-center text-slate-500 dark:text-zinc-200 font-semibold text-sm whitespace-nowrap">

					<ul class="flex ltr:ml-3 rtl:mr-3">
						<?php $__currentLoopData = $popular_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li class="flex ltr:mr-3 rtl:ml-3 whitespace-nowrap">
							<a href="<?php echo e(url('explore/projects', $tag->slug), false); ?>"
								class="rounded-full border hover:bg-slate-100 hover:text-slate-500 transition-all duration-200 px-5 py-2 text-md text-[#363848] border-[#E9E6FE] dark:text-zinc-400 dark:border-zinc-700 dark:hover:bg-zinc-700 dark:hover:text-zinc-300 font-medium">
								<?php echo e($tag->name, false); ?>

							</a>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
			</div>

		</div>
	</div>

	
	

	<?php if($categories && $categories->count()): ?>
            <div class="col-span-12 mt-6 xl:mt-6 mb-16">
                <span class="font-semibold text-[#363848] text-4xl dark:text-gray-200 tracking-wider text-center block"><?php echo e(__('messages.t_featured_categories'), false); ?></span>
                
                <div class="flex w-9/12 justify-center mx-auto mt-12" wire:ignore>

                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(url('categories', $category->slug), false); ?>" 
                        class="bg-white ease-in-out p-4 rounded-3xl mx-3 w-1/3 flex items-center" style="box-shadow: 0px 7px 22px 0px rgba(143, 134, 195, 0.07)">
                        <img src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($category->thumbnail), false); ?>" alt="<?php echo e($category->name, false); ?>" class="lazy w-20 h-20 rounded-lg object-cover mr-4">

                        <h5 class="text-[#363848] font-semibold text-2xl"><?php echo e($category->name, false); ?></h5> 
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                </div>
            </div>
        <?php endif; ?>

	
	<?php if($projects && $projects->count()): ?>
	<div class="w-full mt-8 lg:mt-20">

		
		<div class="block mb-8">
			<h1 class="text-xl md:text-2xl text-black dark:text-white font-bold tracking-wide">
				<?php echo app('translator')->get('messages.t_latest_projects'); ?>
			</h1>
		</div>

		
		<div class="grid grid-cols-1 gap-4 lg:gap-8">
			<?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.cards.project', [ 'id' => $project->uid ])->html();
} elseif ($_instance->childHasBeenRendered('project-card-id-' . $project->uid)) {
    $componentId = $_instance->getRenderedChildComponentId('project-card-id-' . $project->uid);
    $componentTag = $_instance->getRenderedChildComponentTagName('project-card-id-' . $project->uid);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('project-card-id-' . $project->uid);
} else {
    $response = \Livewire\Livewire::mount('main.cards.project', [ 'id' => $project->uid ]);
    $html = $response->html();
    $_instance->logRenderedChild('project-card-id-' . $project->uid, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>

		
		<?php if($projects->hasPages()): ?>
		<hr class="my-10">
		<div class="px-4 py-5 sm:px-6 flex justify-center">
			<?php echo $projects->links('pagination::tailwind'); ?>

		</div>
		<?php endif; ?>

	</div>
	<?php endif; ?>

</div>

<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" type="text/css" />
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\riverr\resources\views/livewire/main/explore/projects/projects.blade.php ENDPATH**/ ?>