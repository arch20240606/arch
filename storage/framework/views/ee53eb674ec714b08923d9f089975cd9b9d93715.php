

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
      <a href="<?php echo e(route('contract.index')); ?>">Договора</a>
    </div>

    <h1>Договора</h1>

    
  
   

<form class="filter filter_expertise form" method="GET" action="<?php echo e(route('contract.search')); ?>">
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
            <th style="text-align: center;">IDCon</th>
            
            <th style="text-align: left;">Наименование</th>
            <th>Номер договора</th>
            <th>Дата заключения</th>
            <th>Владелец</th> 
            <th>Заполнено</th>
            <th>Дата изменения</th>
            <th>Текущий статус</th>
          </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $iss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $is): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td class="table__status"><?php echo e($is->idCon); ?></td>
            
            <td class="table__status" style="text-align: left;"><a href="<?php echo e(route('contract.show', ['contract' => $is->idCon])); ?>"><?php echo e($is->name); ?></a>
              
            </td>
            <td class="table__status"><?php echo e($is->AggreementNumber); ?></td>
            <td class="table__status"><?php echo e($is->AggreementDate); ?></td>
            <td class="table__status"><?php echo e(isset($is->gosorg->name) ? $is->gosorg->name : ''); ?></td>
            <td class="table__status"><?php echo e(empty($is->filledPercentage) ? '0 %' : $is->filledPercentage . ' %'); ?></td>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/contract/index.blade.php ENDPATH**/ ?>