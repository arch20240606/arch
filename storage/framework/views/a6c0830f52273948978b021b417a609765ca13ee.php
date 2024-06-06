

<?php $__env->startSection('title'); ?><?php echo e(trans('app.d_outbox')); ?>: <?php echo e(trans('app.catalog')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>

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
      <a href="<?php echo e(route('datacatalog.index')); ?>"><?php echo e(trans('app.catalog')); ?></a>
      /
      <span><?php echo e(trans('app.d_outbox')); ?></span>
    </div>

    <h1 class="page-title"><?php echo e(trans('app.catalog')); ?></h1>

    <?php echo $__env->make('datacatalog.index_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





    <?php if( $passports->isEmpty() ): ?>
      <div class="notice">В разделе <b><?php echo e(trans('app.d_outbox')); ?></b> отсутствуют данные</div>
    <?php else: ?>

      <table class="table table_expertise">
        <thead>
        <tr>
          <th>IDP</th>
          <th><?php echo e(trans('app.tab_go')); ?></th>
          <th><?php echo e(trans('app.tab_is')); ?></th>
          <th><?php echo e(trans('app.tab_level')); ?></th>
          <th><?php echo e(trans('app.tab_choise')); ?></th>
          <th><?php echo e(trans('app.dc_date_publication')); ?></th>
          <th><?php echo e(trans('app.tab_status')); ?></th>
        </tr>
        </thead>
        <tbody>

          <?php $__currentLoopData = $passports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $passport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <tr>
            <td class="table__status" style="text-align: center;"><?php echo e($passport->id); ?></td>
            <td class="table__status" style="text-align: left;"><?php echo e($passport->government->$name_go); ?></td>
            <td class="table__status"><?php echo e($passport->information_system->name_ru); ?></td>
            <td class="table__status">
              <?php if( $passport->data_used == 1): ?>
                <?php echo e(trans('app.dc_republic')); ?>

              <?php elseif( $passport->data_used == 2): ?>
                <?php echo e(trans('app.dc_local')); ?>

              <?php else: ?>
                <?php echo e(trans('app.no')); ?>

              <?php endif; ?>
            </td>
            <td class="table__status">
              <?php if( $passport->data_enter == 1): ?>
                <?php echo e(trans('app.dc_data_enter_letter')); ?>

              <?php elseif( $passport->data_enter == 2): ?>
                <?php echo e(trans('app.dc_data_enter_electro')); ?>

              <?php elseif( $passport->data_enter == 3): ?>
                <?php echo e(trans('app.dc_data_enter_combo')); ?>

              <?php else: ?>
                <?php echo e(trans('app.no')); ?>

              <?php endif; ?>
            </td>

            <td class="table__status"><?php echo e(date('d.m.Y H:i:s', strtotime( $passport->created_at ))); ?></td>
            
            <td class="table__status">
              <?php if($passport->accepted == 1): ?>
                <span style="width: 100%;" class="status status_yes">Утверждено</span>
              <?php else: ?>

                <?php
                  $emps = json_decode($passport->approve_users);
                  $emps_list = "";

                  foreach ($emps as $emp) {
                    $emps_list .= $passport->getUser($emp)->surname.' '.$passport->getUser($emp)->name.' '.$passport->getUser($emp)->middlename.'&#013;';
                  }
                ?>
                
                <span style="width: 100%; cursor: pointer;" class="status status_wait" title="<?php echo $emps_list; ?>">На утверждении</span>
              <?php endif; ?>
            </td>

          </tr>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        </tbody>
      </table>



    <?php endif; ?>

    


    






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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/datacatalog/index_outbox.blade.php ENDPATH**/ ?>