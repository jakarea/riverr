<div
    class="flex flex-col rounded-[20px] bg-white overflow-hidden <?php echo e($highlighted ? 'ltr:border-l-[6px] rtl:border-r-[6px] border-primary-600' : '', false); ?>" style="box-shadow:0px 5px 12px 0px rgba(62, 53, 120, 0.07)">
    <div class="flex px-6 py-5 justify-between items-center">
        <div class="w w-1/4">
            
            <a href="<?php echo e(url('project/' . $pid . '/' . $slug), false); ?>"
                class="font-semibold lg:text-xl text-zinc-900 dark:text-white hover:text-primary-600 dark:hover:text-primary-400 mb-1 block">
                <?php echo e($title, false); ?>

            </a>
            
            <a href="<?php echo e(url('explore/projects', $category['slug']), false); ?>"
                class="text-[#5F4BDB] text-base font-normal hover:text-black block">
                <?php echo e($category['title'], false); ?>

            </a>
        </div>
        <div>
            
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
                    <span class="text-lg font-medium text-[#2E2E2E] block"><?php echo e($total_bids, false); ?> <?php echo e(strtolower(__('messages.t_bids')), false); ?></span>
                        <?php if($budget_type === 'fixed'): ?>
                        <span class="text-[#8A8A8A] font-normal text-base block"><?php echo e(__('messages.t_fixed_price'), false); ?></span>
                        <?php else: ?>
                        <span class=" text-[#8A8A8A] font-normal text-base block"><?php echo e(__('messages.t_hourly_price'), false); ?></span>
                        <?php endif; ?>
                </div>
            </div>
        </div>
        <div>
            
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
                    <span class="text-lg font-medium text-[#2E2E2E] block">Min - <?php echo e($budget_min, false); ?> </span> 
                    <span class="text-[#8A8A8A] font-normal text-base block">Max - <?php echo e($budget_max, false); ?></span> 
                </div>  
            </div>
        </div>
        <div>
            
            <div>
                <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                    class="font-medium flex px-3 py-1.5 text-xs rounded-sm border border-transparent text-gray-600 bg-gray-100 hover:bg-gray-200 hover:text-gray-500 dark:bg-primary-600 dark:text-white dark:hover:border-primary-600 dark:hover:bg-primary-200 dark:hover:text-primary-800 transition-colors duration-300 mb-2 last:mb-0">
                    <?php echo e($skill->skill->name, false); ?>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div> 
            
            <div class="flex flex-col">
                <a href="<?php echo e(url('project/' . $pid . '/' . $slug), false); ?>"
                    class="text-[#5F4BDB] hover:text-white transition-colors duration-300 hidden rounded-full md:block dark:text-gray-100 dark:hover:text-white bg-[#F0EEFF] font-semibold text-base  py-3 px-12 hover:bg-[#5F4BDB]">
                    <?php if($status === 'active'): ?>
                    <span><?php echo e(__('messages.t_bid_now'), false); ?></span>
                    <?php else: ?>
                    <span><?php echo e(__('messages.t_view_project'), false); ?></span>
                    <?php endif; ?>
                </a>
            </div>

            
            <?php if($status === 'completed'): ?>
            <span class="flex items-center justify-center relative">
                <span class="text-xs uppercase font-semibold tracking-widest text-green-500 dark:text-green-400">
                    <?php echo e(__('messages.t_project_completed'), false); ?>

                </span>
            </span>
            <?php elseif($urgent): ?>
            <span class="flex items-center justify-center relative">
                <span class="text-xs uppercase font-semibold tracking-widest text-red-500 animate-pulse">
                    <?php echo e(__('messages.t_urgent_project'), false); ?>

                </span>
            </span>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php /**PATH C:\xampp\htdocs\riverr\resources\views/livewire/main/cards/project.blade.php ENDPATH**/ ?>