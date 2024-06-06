

<?php $__env->startSection('title'); ?>Административный раздел - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>

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
      <a href="<?php echo e(route('administrator.index')); ?>">Административный раздел</a>
      /
      Список данных учета сведений
    </div>

    <h1 class="page-title" style="margin-bottom: 50px;">Административный раздел</h1>

    <?php echo $__env->make('administrator.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <h3>Список данных учета сведений ( всего <?php echo e($infosyses->total()); ?> )</h3>

    <!--
    <form class="filter filter_expertise form">
      <div class="filter__search form__field">
        <input type="search" name="budget-search" placeholder="Поиск">
      </div>
      <div class="filter__type form__field">
        <select name="search-year">
          <option value="" selected>Государственный орган</option>
        </select>
      </div>
      <div class="filter__version form__field">
        <select name="search-status">
          <option value="" selected>Статус</option>
          <option value="Черновик">Черновик </option>
          <option value="На утверждении">На утверждении</option>
          <option value="На согласовании">На согласовании</option>
          <option value="Согласовано">Согласовано</option>
        </select>
      </div>

    </form>
    -->

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

        <?php $__currentLoopData = $infosyses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $infosys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>
          <td class="table__status"><?php echo e($infosys->id); ?></td>
          <td class="table__status" style="text-align: left;"><a href="<?php echo e(route('administrator.uchet_edit', ['id'=>$infosys->id])); ?>"><?php echo e($infosys->$names); ?></a></td>
          <td class="table__status"><?php echo e($infosys->typeis->$names); ?></td>
          <td class="table__status"><?php echo e($infosys->government->$names); ?></td>
          <td class="table__status"><?php echo e(date('d.m.Y H:i:s', strtotime( $infosys->created_at ))); ?></td>
          <td class="table__status"><?php echo e(date('d.m.Y H:i:s', strtotime( $infosys->updated_at ))); ?></td>
          <td class="table__status">
            <?php if($infosys->status == 1): ?>
              <span style="width: 100%;" class="status status_yes">Утверждено</span>
            <?php elseif($infosys->status == 2): ?>
              <span style="width: 100%;" class="status status_no">Отклонено</span>
            <?php else: ?>
              <span style="width: 100%;" class="status status_wait">На рассмотрении</span>
            <?php endif; ?>
          </td>
        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



      </tbody>
    </table>



    <?php echo e($infosyses->links('layouts.pagination.softdeco')); ?>






  </div>

</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('other_divs'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/administrator/uchet.blade.php ENDPATH**/ ?>