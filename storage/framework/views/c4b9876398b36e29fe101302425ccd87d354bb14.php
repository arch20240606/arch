

<?php $__env->startSection('title'); ?><?php echo e(trans('app.myreqests')); ?><?php $__env->stopSection(); ?>

<?php
if (app()->getLocale() == "ru") {
  $names = 'name_ru';
} elseif (app()->getLocale() == "en") {
  $names = 'name_en';
} else {
  $names = 'name_kz';
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
      <a href="<?php echo e(route('accounting.information')); ?>"><?php echo e(trans('app.m_uchet')); ?></a>
      /
      <span>Программное обеспечение</span>
    </div>

    

    
  
   


  
  
  
  
  
    
  


<div class="is-info__header">
  <div class="is-info__header-logo">
    <img src="/assets/images/coordinate-system 1.svg" alt="">
  </div>
  <h2 class="is-info__header-title">
    Текущий статус 
    <span style="font-weight: normal;">
    <?php
    if ($is->bpStatus == 'published') {
        echo 'Зарегистрирован';
    } elseif ($it->bpStatus == 'archive') {
        echo 'Архивный';
    } elseif ($it->bpStatus == 'draft') {
        echo 'Черновик';
    } else {
        echo 'Неизвестный статус';
    }
    ?>
    </span>
  </h2>
</div>

<div style="display: block;"> 
    <div class="is-info__body">
      <form class="form" method="POST" action="asdas">
        <div class="is-info__left is-info__col" style="width:1300px ">
          <div class="is-info__right-header" style="background-color: rgb(9, 71, 242)">Детальная информация</div>
          <div class="is-info__row" style="margin-top: 13px;">
            <p><b>Тип ПО</b></p>
            <input value="<?php echo e($is->categoryType); ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Продукт/версия ПО</b></p>
            <input value="<?php echo e($is->product_version); ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Релиз ПО</b></p>
            <input value="<?php echo e($is->releases); ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Название</b></p>
            <input value="<?php echo e($is->name); ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Владелец</b></p>
            <input value="<?php echo e($is->gosorg->name); ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Заметки</b></p>
            <input value="<?php echo e($is->notes); ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Тип</b></p>
            <input value="<?php echo e($is->LicenseType); ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Количество</b></p>
            <input value="<?php echo e($is->LicenseAmount); ?>" type="text" disabled>
          </div>
        </div>
      </form>
    </div>

    </div>
</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('other_divs'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/license/info.blade.php ENDPATH**/ ?>