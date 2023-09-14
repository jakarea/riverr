<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(__('messages.t_toast_something_went_wrong'), false); ?></title>

    
    <?php echo settings('appearance')->font_link; ?>


    
    <style>
        :root {
            --color-primary-h: <?php echo e(hex2hsl( settings('appearance')->colors['primary'] )[0], false); ?>;
            --color-primary-s: <?php echo e(hex2hsl( settings('appearance')->colors['primary'] )[1], false); ?>%;
            --color-primary-l: <?php echo e(hex2hsl( settings('appearance')->colors['primary'] )[2], false); ?>%;
        }
        html {
            font-family: <?php echo settings('appearance')->font_family ?>, sans-serif !important;
        }
    </style>

    
    <link href="<?php echo e(asset('public/css/app.css'), false); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/css/style.css'), false); ?>" rel="stylesheet">

</head>
<body class="h-full">
    
    <div class="bg-gray-50 min-h-full px-4 py-16 sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8">
        <div class="max-w-max mx-auto">
            <main class="text-center">
                <p class="font-extrabold text-primary-600 text-3xl lg:text-8xl">404</p>
                <div class="mt-4">
                    <div class="mt-4">
                        <h1 class="text-2xl font-extrabold text-gray-900 sm:text-3xl uppercase tracking-widest">
                            <?php echo app('translator')->get('messages.t_page_not_fount'); ?>
                        </h1>
                        <p class="mt-1 text-base text-gray-500">
                            <?php echo app('translator')->get('messages.t_pls_check_url_address_bar_try_again'); ?>
                        </p>
                    </div>
                    <div class="mt-10 flex justify-center">
                        <a href="<?php echo e(url('/'), false); ?>" class="inline-flex items-center px-6 py-3 border border-transparent text-md font-medium rounded-full shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600">
                            <?php echo app('translator')->get('messages.t_back_to_homepage'); ?>    
                        </a>
                        
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\riverr\resources\views/errors/404.blade.php ENDPATH**/ ?>