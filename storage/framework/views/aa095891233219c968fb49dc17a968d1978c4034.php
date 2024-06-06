

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
      <span>Информационные системы</span>
    </div>

    <h1 class="page-title">Информационные системы</h1>
  


    <?php if($iss->count() > 0 ): ?>

      <table class="table table_expertise" style="font-weight: normal; color: #000000;">
        <thead>
          <tr>
            <th style="text-align: center;">IDIS</th>
            <th style="text-align: center;">ID old</th>
            <th style="text-align: left;">Наименование</th>
            <th>Тип</th>
            <th>Сокращение</th>
            <th>Дата создания</th>
            <th>Дата обновления</th>
            <th>Текущий статус</th>
          </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $iss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $is): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td class="table__status"><?php echo e($is->idis); ?></td>
            <td class="table__status"><?php echo e($is->_id); ?></td>
            <td class="table__status" style="text-align: left;"><a href="<?php echo e(route ('accounting.show', ['accounting' => $is->idis])); ?>"><?php echo e($is->name); ?></a></td>
            <td class="table__status"><?php echo e($is->app_software_type); ?></td>
            <td class="table__status"><?php echo e($is->AppShortName); ?></td>
            <?php
            $date = new DateTime();
            $date->setTimestamp($is->objCreateDate);
            ?>
            <td class="table__status"><?php echo e(date('l dS \o\f F Y h:i:s A', $is->objCreateDate )); ?> </td>
            <td class="table__status"><?php echo e($is->objCreateDateString); ?></td>
            <td class="table__status">
              <?php if($is->bpStatus == "published"): ?>
                <span style="width: 100%;" class="status status_yes">Утверждено</span>
              <?php elseif($is->bpStatus == "archive"): ?>
                <span style="width: 100%;" class="status status_no">Архивный</span>
              <?php elseif($is->bpStatus == "review"): ?>
                <span style="width: 100%;" class="status status_wait">На рассмотрении</span>
              <?php else: ?>
                <span style="width: 100%;" class="status">Черновик</span>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
      </table>

      <br><br>
      Всего: <?php echo e($iss->total()); ?>

      <?php echo e($iss->links('layouts.pagination.softdeco')); ?>


    <?php else: ?>
      <div class="info-box-error" style="margin-bottom: 5px;">В разделе <b>Информационные системы</b> данные отсутствуют</div>
    <?php endif; ?>




  </div>

</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('other_divs'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/accounting/iss_search.blade.php ENDPATH**/ ?>