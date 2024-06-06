

<?php $__env->startSection('title'); ?>Административный раздел - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>

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
      /
      <a href="<?php echo e(route('administrator.index')); ?>">Административный раздел</a>
    </div>

    <h1 class="page-title" style="margin-bottom: 50px;">Административный раздел</h1>

    <?php echo $__env->make('administrator.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <h3>Список пользователей  ( всего <?php echo e($users->total()); ?> )</h3>

    <form class="filter filter_expertise form" method="GET" action="<?php echo e(route('administrator.user.search')); ?>">
      <div class="filter__search form__field">
        <input type="search" <?php if(isset($search_text)): ?> value="<?php echo e($search_text); ?>" <?php endif; ?> name="q" id="q" placeholder="Поиск">
      </div>
      <div class="form__field" style="width: 100% !important;">
        <select id="go_select" name="go_select">
          <option value="" selected>Государственный орган</option>
          <?php $__currentLoopData = $governments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $government): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($government->id); ?>"><?php echo e($government->$names); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div class="filter__type form__field">
      <button class="tabs__button btn" style="border-radius: 8px 8px 8px 8px;" type="submit">Найти</button>
      </div>
    </form>


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
          <td class="table__status"><a href="<?php echo e(route('administrator.edit', ['administrator' => $user->id])); ?>"><?php echo e($user->email); ?></a></td>
          <td class="table__status"><?php echo e($user->government->$names); ?></td>
          <td class="table__status"><?php echo e(date('d.m.Y H:i:s', strtotime( $user->created_at ))); ?></td>
          <td class="table__status">
            <?php if($user->activity == 1 ): ?>
              <span style="width: 100%;" class="status status_yes">Активирован</span>
            <?php else: ?>
              <span style="width: 100%;" class="status status_no">Не активирован</span>
            <?php endif; ?>
          </td>
        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



      </tbody>
    </table>



    <?php echo e($users->links('layouts.pagination.softdeco')); ?>





  </div>

</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('other_divs'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/administrator/index.blade.php ENDPATH**/ ?>