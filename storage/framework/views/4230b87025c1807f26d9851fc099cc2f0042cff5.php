<div class="header__inner">
  <div class="header__column header__column_left"></div>
  <a class="header__logo logo" href="/<?php echo e(app()->getLocale()); ?>/">
    <img src="/logos/logo_<?php echo e(app()->getLocale()); ?>.png" height="45" alt="<?php echo e(trans('app.site_title')); ?>" title="<?php echo e(trans('app.site_title')); ?>">
    <!--
    <svg class="logo__icon">
      <use xlink:href="/assets/images/sprite.svg#logo"></use>
    </svg>
    <p class="logo__name"><?php echo trans('app.archportal'); ?></p>
    -->
  </a>
  <div class="header__column header__column_right">
    <a class="header__auth btn" style="margin-right: 15px;" href="<?php echo e(route('register')); ?>"><?php echo e(trans('app.registration')); ?></a>
    <a class="header__auth btn" href="<?php echo e(route('login')); ?>"><?php echo e(trans('app.аuthorization')); ?></a>

    <div class="header__lang lang">
      <?php echo $__env->make('layouts.lang', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    
  </div>
</div><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/layouts/header_without_auth.blade.php ENDPATH**/ ?>