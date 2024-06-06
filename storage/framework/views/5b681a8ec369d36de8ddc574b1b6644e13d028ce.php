

<?php $__env->startSection('title'); ?>Редактирование данных пользователя - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>

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
      /
      Редактирование данных пользователя
    </div>

    <h1 class="page-title" style="margin-bottom: 50px;">Данные пользователя</h1>

    <?php echo $__env->make('administrator.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(Session::has('successMsg')): ?>
      <div class="success-info"><?php echo Session::get('successMsg'); ?></div>
    <?php endif; ?>

    <?php if(!empty($errorMsg)): ?>
    <div class="info-box-error"><b><?php echo e(trans('app.reg_error')); ?>:</b> <?php echo $errorMsg; ?></div>
    <?php endif; ?>



    <div class="is-info">

      <div class="is-info__header">
        <h2 class="is-info__header-title"><span style="color: #0075ff">Пользователь:</span> <?php echo e($user_data->surname); ?> <?php echo e($user_data->name); ?> <?php echo e($user_data->middlename); ?></h2>
      </div>

      
      <div class="is-info__body">
        <form class="form" method="POST" action="<?php echo e(route('administrator.update', ['administrator' => $user_data->id])); ?>">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PATCH'); ?>
          <div class="is-info__left is-info__col">
            <div class="is-info__right-header" style="background: #0075ff; color:">Учетные данные пользователя</div>
            <div class="is-info__row" style="margin-top: 13px;">
              <p><b>Фамилия</b></p>
              <input id="surname" name="surname" value="<?php echo e($user_data->surname); ?>" type="text" minlength="2" maxlength="255" required>
            </div>
            <div class="is-info__row">
              <p><b>Имя</b></p>
              <input id="name" name="name" value="<?php echo e($user_data->name); ?>" type="text" minlength="2" maxlength="255" required>
            </div>
            <div class="is-info__row">
              <p><b>Отчество</b></p>
              <input id="middlename" name="middlename" value="<?php echo e($user_data->middlename); ?>" type="text" minlength="2" maxlength="255">
            </div>
            <div class="is-info__row">
              <p><b>E-mail (Логин)</b></p>
              <input id="email" name="email" value="<?php echo e($user_data->email); ?>" type="text" minlength="2" maxlength="255">
            </div>
            <div class="is-info__row">
              <p><b <?php if($user_data->government_id == '115'): ?> style="color: red" <?php endif; ?>>Государственный орган</b></p>
              <select id="go_select" name="go_select" required>
                <?php $__currentLoopData = $governments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $government): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($government->id); ?>" <?php if($user_data->government_id == $government->id): ?> selected <?php endif; ?>><?php echo e($government->$names); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="is-info__row">
              <p><b>Новый пароль</b><br>(при необходимости)</p>
              <input id="new_password" name="new_password" value="" type="text" minlength="8" maxlength="16">
            </div>
            <div class="is-info__row">
              <p><b>Статус</b></p>
              <label class="toggle-checkbox">
                <input type="checkbox" id="activity" name="activity" <?php if($user_data->activity == '1'): ?> checked <?php endif; ?>>
                <span></span>
                <p>Пользователь активирован</p>
              </label>
            </div>
            <div class="is-info__row">
              <p><b>Дата регистрации</b></p>
              <div><p><?php echo e(date('d.m.Y в H:i:s', strtotime( $user_data->created_at ))); ?></p></div>
            </div>
            <div class="is-info__row">
              <p><b>Последний IP адрес</b></p>
              <div><p><?php echo e($user_data->ip_address); ?></p></div>
            </div>
            <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
              <p></p>
              <button class="tabs__button btn" type="submit" id="update_account" name="update_account" style="margin-top: 20px; margin-bottom: 20px; width: 100%; font-size: 14px;">Сохранить изменения</button>
            </div>
          </div>
        </form>






        <div class="is-info__right is-info__col">
          <div class="is-info__right-header" style="background: #0075ff; color:">Права и уровни доступа</div>

           
    

      <form method="POST" action="<?php echo e(route('administrator.update', ['administrator' => $user_data->id])); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>    
        <div class="is-info__right-section">
            <div class="is-info__row">
                <p><b>Роли пользователя</b></p>
                <div>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="toggle-checkbox" style="margin-bottom: 5px;">
                        <input type="checkbox" name="roles[]" value="<?php echo e($role->id); ?>" <?php if($user_data->roles->contains($role)): ?> checked <?php endif; ?>>
                        <span></span>
                        <p><?php echo e($role->name); ?></p>
                    </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    
        <button class="tabs__button btn" type="submit" name="update_roles">Сохранить роли</button>
    </form>
    
    </div>













  </div>

</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('other_divs'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/administrator/user_edit.blade.php ENDPATH**/ ?>