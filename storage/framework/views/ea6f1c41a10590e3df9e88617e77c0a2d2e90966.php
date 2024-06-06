

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
      <span>Запросы на добавление</span>
    </div>

    <h1 class="page-title"><?php echo e(trans('app.myreqests')); ?></h1>



    <?php echo $__env->make('accounting.reqests.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if($iss->count() > 0 ): ?>

      <table class="table table_expertise" style="font-weight: normal; color: #000000;">
        <thead>
          <tr>
            <th style="text-align: center;">IDIS</th>
            <th style="text-align: left;">Наименование</th>
            <th>Тип</th>
            <th><?php echo e(trans('app.tab_go')); ?></th>
            <th>Дата создания</th>
            <th>Дата обновления</th>
            <th>Текущий статус</th>
          </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $iss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $is): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td class="table__status"><?php echo e($is->id); ?></td>
            <td class="table__status" style="text-align: left;"><a href="#"><?php echo e($is->$names); ?></a></td>
            <td class="table__status"><?php echo e($is->typeis->$names); ?></td>
            <td class="table__status"><?php echo e($is->government->$names); ?></td>
            <td class="table__status"><?php echo e(date('d.m.Y H:i:s', strtotime( $is->created_at ))); ?></td>
            <td class="table__status"><?php echo e(date('d.m.Y H:i:s', strtotime( $is->updated_at ))); ?></td>
            <td class="table__status">
              <?php if($is->status == 1): ?>
                <span style="width: 100%;" class="status status_yes">Утверждено</span>
              <?php elseif($is->status == 2): ?>
                <span style="width: 100%;" class="status status_no">Отклонено</span>
              <?php else: ?>
                <?php if($is->draft == 1): ?>
                  <span style="width: 100%;" class="status">Черновик</span>
                <?php else: ?>
                  <span style="width: 100%;" class="status status_wait">На рассмотрении</span>
                <?php endif; ?>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
      </table>

    <?php else: ?>
      <div class="info-box-error" style="margin-bottom: 5px;">В разделе <b>Мои запросы</b> данные отсутствуют</div>
    <?php endif; ?>




  </div>

</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('other_divs'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/accounting/reqests/index.blade.php ENDPATH**/ ?>