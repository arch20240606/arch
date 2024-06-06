

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
      <a href="<?php echo e(route('integration.index')); ?>">Интеграции ИС</a>
    </div>

    <h1>Интеграции ИС</h1>

    
  
   

<form class="filter filter_expertise form" method="GET" action="<?php echo e(route('integration.search')); ?>">
  <div class="filter__search form__field">
    <input type="text" name="query" placeholder="Поиск...">
  </div>
  <div class="filter__type form__field">
  <button class="tabs__button btn" style="border-radius: 8px 8px 8px 8px;" type="submit">Найти</button>
  </div>
</form>

  
  
  
  
  
    
  


    <?php if($iss->count() > 0 ): ?>

      <table class="table table_expertise" style="font-weight: normal; color: #000000;">
        <thead>
          <tr>
            <th style="text-align: center;">IDIN</th>
            <th style="text-align: center;">Цель</th>
            <th style="text-align: center;">Организация, отправляющая данные</th>
            <th style="text-align: left;">Программный продукт, отправляющий данные</th>
            <th>Организация, принимающая данные</th>
            <th>Программный продукт, принимающий данные</th>
            
          </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $iss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $is): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td class="table__status"><?php echo e($is->idIn); ?></td>
            <td class="table__status"><a href="#"><?php echo e($is->purpose); ?></a></td>
            <td class="table__status"><?php echo e(isset($is->receivingOrg->name) ? $is->receivingOrg->name : ''); ?></td>
            <td class="table__status"><?php echo e(isset($is->dataReceivingSoftware->name) ? $is->dataReceivingSoftware->name : ''); ?></td>
            <td class="table__status"><?php echo e(isset($is->gosorg->name) ? $is->gosorg->name : ''); ?></td>
            <td class="table__status"><?php echo e(isset($is->dataSendingSoftware->name) ? $is->dataSendingSoftware->name : ''); ?></td>
            
              <td class="table__status" style="text-align: left;"><a href="#"><?php echo e($is->name); ?></a>
            </td>
            <td class="table__status"><?php echo e($is->app_software_type); ?></td>
            <td class="table__status"><?php echo e($is->AppShortName); ?></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
      </table>

      <br><br>
      Всего: <?php echo e($iss->total()); ?>

      <?php echo e($iss->links('layouts.pagination.softdeco')); ?>


    <?php else: ?>
      <div class="info-box-error" style="margin-bottom: 5px;">В разделе <b>Интеграции ИС</b> данные отсутствуют</div>
    <?php endif; ?>




  </div>

</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('other_divs'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/integration/index.blade.php ENDPATH**/ ?>