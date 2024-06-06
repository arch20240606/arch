

<?php $__env->startSection('title'); ?><?php echo e(trans('app.d_signing')); ?>: <?php echo e(trans('app.catalog')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>

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
      <span><?php echo e(trans('app.d_signing')); ?></span>
    </div>

    <h1 class="page-title"><?php echo e(trans('app.catalog')); ?></h1>

    <?php echo $__env->make('datacatalog.index_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if( $passports->isEmpty() ): ?>
      <div class="notice">В разделе <b><?php echo e(trans('app.d_signing')); ?></b> отсутствуют данные</div>
    <?php else: ?>

    <table class="table table_expertise">
      <thead>
      <tr>
        <th>IDP</th>
        <th><?php echo e(trans('app.tab_go')); ?></th>
        <th><?php echo e(trans('app.tab_is')); ?></th>
        <th><?php echo e(trans('app.tab_autor')); ?></th>
        <th><?php echo e(trans('app.tab_status')); ?></th>
        <th><?php echo e(trans('app.tab_date_application')); ?></th>
        <th><?php echo e(trans('app.tab_action')); ?></th>
      </tr>
      </thead>
      <tbody>

        <?php $__currentLoopData = $passports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $passport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>
          <td class="table__status" style="text-align: center;"><?php echo e($passport->id); ?></td>
          <td class="table__status" style="text-align: left;"><?php echo e($passport->government->$name_go); ?></td>
          <td class="table__status"><a href="<?php echo e(route ('datacatalog.show', ['datacatalog' => $passport->id])); ?>"><?php echo e($passport->information_system->name_ru); ?></a></td>
          <td class="table__status"><?php echo e($passport->user->surname); ?> <?php echo e($passport->user->name); ?> <?php echo e($passport->user->middlename); ?></td>

          <td class="table__status">
            <?php if($passport->accepted_go == 1): ?>
              <span style="width: 100%;" class="status status_yes">Согласовано</span>
            <?php elseif($passport->discarted_go == 1): ?>
              <span style="width: 100%;" class="status status_no">Возвращено ГО</span>
            <?php else: ?>
              <span style="width: 100%;" class="status status_wait">Ожидание согласования</span>
            <?php endif; ?>
          </td>
          <td class="table__status"><?php echo e(date('d.m.Y H:i:s', strtotime( $passport->accepted_at ))); ?></td>
          <td class="table__status">

            <?php if($passport->accepted_go != 1): ?>
              <div style="display: flex; position: center;">

                <a href="<?php echo e(route('datacatalog.signingedit', ['id' => $passport->id])); ?>" class="feather" title="<?php echo e(trans('app.edit')); ?>">
                  <svg>
                    <use href="/assets/images/feather-sprite.svg#edit"/>
                  </svg>
                </a>

                &nbsp;&nbsp;&nbsp;

                <a href="" class="feather" title="<?php echo e(trans('app.delete')); ?>">
                  <svg style="stroke: #b1073a">
                    <use href="/assets/images/feather-sprite.svg#trash"/>
                  </svg>
                </a>

              </div>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/datacatalog/index_signing.blade.php ENDPATH**/ ?>