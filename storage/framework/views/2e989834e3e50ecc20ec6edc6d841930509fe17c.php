

<?php $__env->startSection('title'); ?><?php echo e(trans('app.is_cgo')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="content">
  
  <section class="geo" style="height: 170px;">
    <div class="geo__bg">
      <picture>
        <source srcset="/assets/images/questions-bg.avif" type="image/avif">
        <source srcset="/assets/images/questions-bg.webp" type="image/webp">
        <img src="/assets/images/questions-bg.jpg" alt="Background">
      </picture>
    </div>

    <div class="container">
      <div class="breadcrumbs breadcrumbs_white">
        <a class="breadcrumbs__home" href="/">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#house"></use>
          </svg>
        </a>
        /
        <span><?php echo e(trans('app.is_cgo')); ?></span>
      </div>

      <h1 class="page-title"><?php echo e(trans('app.is_cgo')); ?></h1>
    </div>
  </section>

  <div class="container" style="margin-top: 50px;">

    <form method="GET" action="<?php echo e(route('infosys.search')); ?>" class="filter filter_expertise form">
      <div class="filter__search form__field" style="width: 100% !important;">
        <input type="search" name="q" id="q" <?php if(isset($search_text)): ?> value="<?php echo e($search_text); ?>" <?php endif; ?> placeholder="Введите любое значение">
      </div>
      <div class="filter__version form__field">
        <button type="submit" class="tabs__button" href="<?php echo e(route('expertise.create')); ?>">Искать</button>
        <input type="hidden" name="search_type" id="search_type" value="iscgo">
      </div>
    </form>


    <table class="table">
      <thead>
        <tr>
          <th>Наименование</th>
          <th>Аббревиатура</th>
          <th>Владелец</th>
          <th>Регистрационный номер</th>
          <th>Версия</th>
          <th>Статус эксплуатации</th>
        </tr>
      </thead>
      <tbody>

        <?php $__currentLoopData = $infosys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td class="table__name"><a href="<?php echo e(route('infosys.info', ['id'=>$info->idis])); ?>"><?php echo e($info->name); ?></a></td>
          <td class="table__status"><?php echo e($info->AppShortName); ?></td>
          <td class="table__status">
            <?php
            if ( isset( $info->getGO($info->ownerId)->name ) ) {
              echo $info->getGO($info->ownerId)->name;
            } else {
              echo "Нет информации";
            }
            ?>
          </td>
          <td class="table__status"><?php echo e($info->regNumber); ?></td>
          <td class="table__status"><?php echo e($info->version); ?></td>
          <td class="table__status">
            <?php if($info->status == "5cf4c17ce8912824cdc2cb70"): ?> 
              Не функционирует
            <?php elseif($info->status == "5cf4c175e8912824cdc2cb6f"): ?> 
              Функционирует
            <?php else: ?>
              Нет информации по эксплуатации
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>

    <br><br>
    Всего: <?php echo e($infosys->total()); ?>

    <?php echo e($infosys->withQueryString()->links('layouts.pagination.softdeco')); ?>



  </div>

</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('other_divs'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/infosys/iscgo.blade.php ENDPATH**/ ?>