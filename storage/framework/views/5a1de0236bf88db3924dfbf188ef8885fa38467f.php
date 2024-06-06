

<?php $__env->startSection('title'); ?>Административный раздел - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>

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
      <a href="<?php echo e(route('administrator.index')); ?>">Административный раздел</a>
    </div>

    <h1 class="page-title" style="margin-bottom: 50px;">Административный раздел</h1>

    <table class="table table_expertise" style="font-weight: normal; color: #000000;">
      <thead>
      <tr>
        <th style="text-align: center;">ID</th>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>E-mail</th>
        <th>Государственный орган</th>
        <th>Дата регистрации</th>
        <th>Статус</th>
      </tr>
      </thead>
      <tbody>

        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>
          <td class="table__status"><?php echo e($user->id); ?></td>
          <td class="table__status"><?php echo e($user->surname); ?></td>
          <td class="table__status"><?php echo e($user->name); ?></td>
          <td class="table__status"><?php echo e($user->middlename); ?></td>
          <td class="table__status"><a href="#"><?php echo e($user->email); ?></a></td>
          <td class="table__status"><?php echo e($user->government->$name_go); ?></td>
          <td class="table__status"><?php echo e(date('d.m.Y H:i:s', strtotime( $user->created_at ))); ?></td>
          <td class="table__status">
            <span style="width: 100%;" class="status status_yes">Активирован</span>
          </td>
        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



      </tbody>
    </table>





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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/govarch.kz/docs/resources/views/administrator/index.blade.php ENDPATH**/ ?>