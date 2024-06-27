<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <link rel="shortcut icon" href="/favicon.ico">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="autor" content="SoftDeCo LLP (c) 2023">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,500&family=Roboto+Flex:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/libs/swiper-bundle.min.css">
  <link rel="stylesheet" href="/assets/css/style.min.css">
  <link rel="stylesheet" href="/assets/css/softdeco.css">
  <link rel="stylesheet" href="/assets/css/libs/select2.min.css">
</head>

<?php if( Auth::user() ): ?>
<body class="has-sidebar">
<?php else: ?>
<body>
<?php endif; ?>

  <div class="body-wrapper">
    <?php echo $__env->yieldContent('header'); ?>

    <?php if( Auth::user() ): ?>
      <?php if( Route::is('datacatalog.*') ): ?>
        <?php echo $__env->make('layouts.menu_slide_datacatalog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php elseif( Route::is('reestr.*') ): ?>
        <?php echo $__env->make('layouts.menu_slide_reestr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php else: ?>
        <?php echo $__env->make('layouts.menu_slide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php endif; ?>
    <?php endif; ?>
    
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->yieldContent('footer'); ?>
  </div>
  
  <?php echo $__env->yieldContent('other_divs'); ?>

  <script src="/assets/js/libs/jquery-3.7.0.min.js"></script>
  <script src="/assets/js/libs/jquery-ui.min.js"></script>
  <script src="/assets/js/libs/jquery.validate.min.js"></script>
  <script src="/assets/js/libs/autosize.min.js"></script>
  <script src="/assets/js/main.min.js"></script>
  <script src="/assets/js/libs/select2.min.js"></script>
  <?php echo $__env->yieldContent('scripts'); ?>

</body>
</html><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/layouts/app.blade.php ENDPATH**/ ?>