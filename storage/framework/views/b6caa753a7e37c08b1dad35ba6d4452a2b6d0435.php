

<?php $__env->startSection('title'); ?><?php echo e(trans('app.profile')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>

<?php
if ( app()->getLocale() == "ru" ) {
  $name_go = 'name_ru';
} elseif ( app()->getLocale() == "en" ) {
  $name_go = 'name_en';
} else {
  $name_go = 'name_kz';
}
?>

<?php $__env->startSection('header'); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="content">

  <div class="container">

    <div class="breadcrumbs">
      <a class="breadcrumbs__home" href="/">
        <svg>
          <use xlink:href="/assets/images/sprite.svg#house"></use>
        </svg>
      </a>
      /
      <span><?php echo e(trans('app.profile')); ?></span>
    </div>

    <h1 class="page-title"><?php echo e(trans('app.profile')); ?></h1>
    
    <div style="margin-top: 50px;">
      <h2 style="color: #0075ff;"><?php echo e(Auth::user()->surname); ?> <?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->middlename); ?></h2>
      <p><b>Организация:</b> <?php echo e(Auth::user()->government->$name_go); ?></p>
    </div>




  </div>

</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('other_divs'); ?>

<?php echo $__env->make('layouts.ask_question', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div id="chat" class="chat"></div>
<?php echo $__env->make('layouts.search_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/profile/index.blade.php ENDPATH**/ ?>