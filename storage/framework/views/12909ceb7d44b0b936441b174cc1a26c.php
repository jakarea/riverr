<div class="gig-card" x-data="window._<?php echo e($gig->uid, false); ?>" dir="<?php echo e(config()->get('direction'), false); ?>">
    <div class="bg-white dark:bg-zinc-800 rounded-2xl shadow-current pt-0" style="box-shadow: 0px 2px 28px rgba(62, 53, 120, 0.04)">

        
        <a href="<?php echo e(url('service', $gig->slug), false); ?>" class="flex items-center justify-center overflow-hidden w-full h-48 bg-white dark:bg-zinc-700">
            <img class="object-cover w-full h-full rounded-t-2xl" src="<?php echo e(src($gig->thumbnail), false); ?>" data-src="<?php echo e(src($gig->thumbnail), false); ?>" alt="<?php echo e($gig->title, false); ?>">
        </a>

        
        <div class="px-4 pb-2 mt-6  text-center">

             
             <a href="<?php echo e(url('service', $gig->slug), false); ?>" class="gig-card-title font-semibold text-[#363848] text-base dark:text-gray-100 hover:text-primary-600 dark:hover:text-white !overflow-hidden mb-3">
                <?php echo e(htmlspecialchars_decode($gig->title), false); ?>

            </a>

            
            <?php if($profile_visible): ?>
                <div class="w-full mb-4 flex justify-center items-center">
                    <a href="<?php echo e(url('profile', $gig->owner->username), false); ?>" target="_blank" class="flex-shrink-0 group block">
                        <div class="flex items-center">
                            <span class="inline-block relative">
                                <img class="h-6 w-6 rounded-full object-cover lazy" src="<?php echo e(src($gig->owner->avatar), false); ?>" data-src="<?php echo e(src($gig->owner->avatar), false); ?>" alt="<?php echo e($gig->owner->username, false); ?>">
                            </span>
                            <div class="ltr:ml-3 rtl:mr-3">
                                <div class="text-[#5F4BDB] dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-300 flex items-center mb-0.5 font-normal tracking-wide text-base">
                                    <?php echo e($gig->owner->username, false); ?>

                                    <?php if($gig->owner->status === 'verified'): ?>
                                        <img data-tooltip-target="tooltip-account-verified-<?php echo e($gig->uid, false); ?>" class="ltr:ml-0.5 rtl:mr-0.5 h-4 w-4 -mt-0.5" src="<?php echo e(url('public/img/auth/verified-badge.svg'), false); ?>" alt="<?php echo e(__('messages.t_account_verified'), false); ?>">
                                        <div id="tooltip-account-verified-<?php echo e($gig->uid, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            <?php echo e(__('messages.t_account_verified'), false); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

            
            <div class="flex items-center my-4" wire:ignore>
                
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>

                
                <?php if($gig->rating == 0): ?>
                    <div class=" text-[13px] tracking-widest text-amber-500 ltr:ml-1 rtl:mr-1 font-black"><?php echo e(__('messages.t_n_a'), false); ?></div>
                <?php else: ?>
                    <div class=" text-sm tracking-widest text-amber-500 ltr:ml-1 rtl:mr-1 font-black"><?php echo e($gig->rating, false); ?></div>
                <?php endif; ?>

                
                <div class="ltr:ml-2 rtl:mr-2 text-[13px] font-normal text-gray-400">
                    ( <?php echo e(number_format($gig->counter_reviews), false); ?> )
                </div>
            </div>

            
            <div class="gig-card-prices flex justify-between items-center py-4 pt-1">
                <small class="text-base !text-[#2E2E2E] font-normal"><?php echo e(__('messages.t_starting_at'), false); ?></small>
                <span class="text-base !text-[#2E2E2E] font-semibold"><?php echo money($gig->price, settings('currency')->code, true); ?></span>
            </div>
        </div>

        
        <div class="px-3 py-3 bg-[#fdfdfd] dark:bg-zinc-800 border-t border-gray-50 dark:border-zinc-700 text-right sm:px-4 rounded-b-md flex justify-between items-center">

            <div class="flex items-center">
                
                <button <?php if(auth()->guard()->check()): ?> <?php if($favorite): ?> wire:click="removeFromFavorite('<?php echo e($gig->uid, false); ?>')" wire:target="removeFromFavorite('<?php echo e($gig->uid, false); ?>')" <?php else: ?> wire:click="addToFavorite('<?php echo e($gig->uid, false); ?>')" wire:target="addToFavorite('<?php echo e($gig->uid, false); ?>')" <?php endif; ?> wire:loading.attr="disabled" <?php endif; ?> <?php if(auth()->guard()->guest()): ?> x-on:click="loginToAddToFavorite" <?php endif; ?> data-tooltip-target="tooltip-add-to-favorites-<?php echo e($gig->uid, false); ?>" class="rounded-full flex items-center justify-center -ml-1 focus:outline-none visited:outline-none w-14 h-14 border border-[#E6E6E6] group hover:bg-[#FF5353]">

                    
                    <?php if(auth()->guard()->check()): ?> 
                        
                        <div wire:loading.remove <?php if($favorite): ?> wire:target="removeFromFavorite('<?php echo e($gig->uid, false); ?>')" <?php else: ?> wire:target="addToFavorite('<?php echo e($gig->uid, false); ?>')" <?php endif; ?>>
                            <svg class="w-7 h-7 text-[#FF5353] group-hover:text-white <?php echo e($favorite ? 'text-red-500 hover:text-red-600' : 'text-gray-400 hover:text-gray-500', false); ?>" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                        </div>
                    <?php endif; ?>

                    
                    <?php if(auth()->guard()->guest()): ?>
                        <svg class="w-7 h-7 group-hover:text-white hover:text-[#FF5353] text-gray-400 " stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                    <?php endif; ?>
                    
                </button>
                <div id="tooltip-add-to-favorites-<?php echo e($gig->uid, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    <?php if($favorite): ?>
                        <?php echo e(__('messages.t_remove_from_favorite'), false); ?>

                    <?php else: ?>
                        <?php echo e(__('messages.t_add_to_favorite'), false); ?>

                    <?php endif; ?>
                </div>
            </div> 

            <div class="details-bttn">
                <a href="<?php echo e(url('service', $gig->slug), false); ?>" class="text-[#5F4BDB] hover:text-white transition-colors duration-300 hidden rounded-full md:block dark:text-gray-100 dark:hover:text-white bg-[#F0EEFF] font-semibold text-base py-4 px-10 hover:bg-[#5F4BDB] ml-4">View Details</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    
    
    <script>
        function _<?php echo e($gig->uid, false); ?>() {
            return {

                // Login to add to favorite
                loginToAddToFavorite() {
                    window.$wireui.notify({
                        title      : "<?php echo e(__('messages.t_info'), false); ?>",
                        description: "<?php echo e(__('messages.t_pls_login_or_register_to_add_to_favovorite'), false); ?>",
                        icon       : 'info'
                    });
                }

            }
        }
        window._<?php echo e($gig->uid, false); ?> = _<?php echo e($gig->uid, false); ?>();
    </script>

<?php $__env->stopPush(); ?><?php /**PATH /Applications/MAMP/htdocs/riverr/resources/views/livewire/main/cards/gig.blade.php ENDPATH**/ ?>