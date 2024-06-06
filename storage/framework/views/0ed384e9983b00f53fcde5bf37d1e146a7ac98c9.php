

<?php $__env->startSection('title'); ?><?php echo e(trans('app.expert')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>

<?php
if (app()->getLocale() == "ru") {
  $name_go = 'name_ru';
} elseif (app()->getLocale() == "en") {
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
      <a href="<?php echo e(route('expertise.index')); ?>"><?php echo e(trans('app.m_expert')); ?></a>
      /
      <a href="<?php echo e(route('expertise.create')); ?>">Создание запроса на экспертизу</a>
      /
      <span>Создание нового IT-проекта</span>
    </div>

    <h1 class="page-title">Создание нового IT-проекта</h1>


    <?php echo $__env->make('expertise.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(!empty($successMsg)): ?>
    <div class="success-info"><?php echo $successMsg; ?></div>
    <?php endif; ?>

    <?php if(!empty($errorMsg)): ?>
    <div class="info-box-error"><b><?php echo e(trans('app.reg_error')); ?>:</b> <?php echo $errorMsg; ?></div>
    <?php endif; ?>





    <div class="is-info">

      <form class="form" enctype="multipart/form-data" method="POST" action="<?php echo e(route('expertise.store')); ?>">
        <?php echo csrf_field(); ?>

        <div class="is-info__header">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title">Укажите название IT-проекта на трех языках</span></h2>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th style="width: 20%; border: 0px;"></th>
              <th style="width: 80%; border: 0px;"></th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td>На государственном</td>
              <td><input class="form__field" id="name_kz" name="name_kz" type="text" minlength="5" maxlength="600" required tabindex="1" autofocus></td>
            </tr>

            <tr>
              <td>На русском</td>
              <td><input class="form__field" id="name_ru" name="name_ru" type="text" minlength="5" maxlength="600" required tabindex="2"></td>
            </tr>

            <tr>
              <td>На английском</td>
              <td><input class="form__field" id="name_en" name="name_en" type="text" minlength="5" maxlength="600" required tabindex="3"></td>
            </tr>


          </tbody>
        </table>
        
          <div class="buttons-wrapper" style="border-top: 1px solid #e3e5ec; padding-top: 25px; margin-top: 50px;">
            <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← <?php echo e(trans('app.but_cancel')); ?></a>
            <button class="btn" type="submit" id="create_it" name="create_it" style="font-size: 14px; background: #00317B;">Создать</button>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/expertise/create_it_project.blade.php ENDPATH**/ ?>