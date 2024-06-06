

<?php $__env->startSection('title'); ?>Цифровые карты цифровой трансформации<?php $__env->stopSection(); ?>

<?php
if ( app()->getLocale() == "ru" ) {
  $names = 'name_ru';
} elseif ( app()->getLocale() == "en" ) {
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
      / Цифровая трансформация / Цифровые карты цифровой трансформации

    </div>

    <h1 class="page-title">Цифровые карты цифровой трансформации</h1>

    <br><br>

    <table class="table table_expertise">
        <thead>
          <tr>
            <th>Государственный орган</th>
            <th>Комитет</th>
            <th style="text-align: left;">Наименование</th>
            <th>Примечание</th>
            <th>Статус</th>
        </tr>
        </thead>


        <tbody>
          <?php $__currentLoopData = $roadmaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roadmap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td class="table__status" style="text-align: left;"><?php echo e($roadmap->government->$names); ?></td>
            <td class="table__status"><?php echo e($roadmap->committee); ?></td>
            <td class="table__status" style="text-align: left;"><a href="#"><?php echo e($roadmap->$names); ?></a></td>
            <td class="table__status"><?php echo e($roadmap->comments); ?></td>
            <td class="table__status">
              <?php if($roadmap->status == 1): ?>
                <span class="status status_yes" style="width: 100%">Утверждено</span>
              <?php else: ?>
                <span class="status status_no" style="width: 100%">Отклонено</span>
              <?php endif; ?>
            </td>
            
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

    <?php echo e($roadmaps->links('layouts.pagination.softdeco')); ?>






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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/businessprocess/roadmaps.blade.php ENDPATH**/ ?>