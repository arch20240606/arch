

<?php $__env->startSection('title'); ?>Административный раздел - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>

<?php
if (app()->getLocale() == "ru") {
  $name_go = 'name_ru';
} elseif (app()->getLocale() == "en") {
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
      /
      <a href="<?php echo e(route('administrator.passport')); ?>">Список паспортов</a>
    </div>

    <h1 class="page-title" style="margin-bottom: 50px;">Административный раздел</h1>

    <?php echo $__env->make('administrator.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <h3>Список паспортов Дата каталога ( всего <?php echo e($passports->total()); ?> )</h3>

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


    <table class="table table_expertise" style="font-weight: normal; color: #000000;">
      <thead>
        <tr>
          <th style="text-align: center;">IDP</th>
          <th><?php echo e(trans('app.tab_go')); ?></th>
          <th><?php echo e(trans('app.tab_is')); ?></th>
          <th><?php echo e(trans('app.tab_responsible')); ?></th>
          <th>Дата создания</th>
          <th>Текущий статус</th>
          <th>Ответственные у ГО</th>
        </tr>
      </thead>
      <tbody>

        <?php $__currentLoopData = $passports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $passport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>
          <td class="table__status"><?php echo e($passport->id); ?></td>
          <td class="table__status"><?php echo e($passport->government->$name_go); ?></td>
          <td class="table__status"><a href="#"><?php echo e($passport->information_system->name_ru); ?></a></td>
          <td class="table__status"><?php echo e($passport->user->surname); ?> <?php echo e($passport->user->name); ?> <?php echo e($passport->user->middlename); ?></td>
          <td class="table__status"><?php echo e(date('d.m.Y H:i:s', strtotime( $passport->created_at ))); ?></td>




          <td class="table__status">

            <?php if( $passport->accepted_go == 1 ): ?>
            <span style="width: 100%; cursor: default; padding-left: 10px; background-image: none;" class="status status_yes" title="Всё норм. Находится в Каталоге">
              Согласован ЦПЦП<br>
              <?php echo e(date('d.m.Y в H:i:s', strtotime( $passport->accepted_go_at ))); ?>

            </span>
            <?php elseif( $passport->discarted_go == 1 ): ?>
            <span style="width: 100%; cursor: default; padding-left: 10px; background-image: none;" class="status status_no" title="Находится у ответственного лица в черновиках">
              Отклонен ЦПЦП<br>
              <?php echo e(date('d.m.Y в H:i:s', strtotime( $passport->discarted_go_at ))); ?>

            </span>
            <?php elseif( $passport->accepted == 1 ): ?>
            <span style="width: 100%; cursor: default; padding-left: 10px; background-image: none;" class="status status_wait" title="Находится в ЦПЦП">
              На согласовании<br>
              <?php echo e(date('d.m.Y в H:i:s', strtotime( $passport->accepted_at ))); ?>

            </span>
            <?php elseif( $passport->send == 1 ): ?>
            <span style="width: 100%; cursor: default; padding-left: 10px; background-image: none;" class="status status_wait" title="Находится в ГО. ФИО лиц справа">
              На утверждении<br>
              <?php echo e(date('d.m.Y в H:i:s', strtotime( $passport->updated_at ))); ?>

            </span>
            <?php elseif( $passport->draft == 1 ): ?>
            <span style="width: 100%; cursor: default; padding-left: 10px; background-image: none;" class="status" title="Находится у ответственного лица">Черновик</span>
            <?php endif; ?>

          </td>

          <td class="table__status" style="font-size: 12px;">
            <?php
            if ($passport->approve_users !== 'null') {
              $emps = json_decode($passport->approve_users);
              $emps_list = "";

              foreach ($emps as $emp) {
                $emps_list .= '<p>' . $passport->getUser($emp)->surname . ' ' . $passport->getUser($emp)->name . ' ' . $passport->getUser($emp)->middlename . '</p>';
              }

              echo $emps_list;
            }
            ?>
          </td>

        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



      </tbody>
    </table>



    <?php echo e($passports->links('layouts.pagination.softdeco')); ?>






  </div>

</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('other_divs'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/administrator/passport.blade.php ENDPATH**/ ?>