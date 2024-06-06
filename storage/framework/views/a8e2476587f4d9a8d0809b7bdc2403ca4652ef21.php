<?php $__env->startSection('title'); ?><?php echo e(trans('app.registration')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>

<?php
if (app()->getLocale() == "ru") {
  $name_go = 'name_ru';
} elseif (app()->getLocale() == "en") {
  $name_go = 'name_en';
} else {
  $name_go = 'name_kz';
}
?>


<?php $__env->startSection('content'); ?>
<div>
  <a class="header__logo logo" href="/<?php echo e(app()->getLocale()); ?>/" style="top: 6%;">
    <p class="logo__name" style="color: #FFFFFF"><img src="/logos/logo_grey_<?php echo e(app()->getLocale()); ?>.png" height="45" alt="<?php echo e(trans('app.site_title')); ?>" title="<?php echo e(trans('app.site_title')); ?>"></p>
  </a>
</div>

<main class="content">
  <section>
    <div class="intro__bg">
      <picture>
        <source srcset="/assets/images/intro-bg.avif" type="image/avif">
        <source srcset="/assets/images/intro-bg.webp" type="image/webp">
        <img src="/assets/images/intro-bg.jpg" alt="Background" style="height: 100vh">
      </picture>
    </div>
  </section>
</main>



<div>
  
  <div class="registration__block">
    <div>
      <div class="popup__title" style="padding-top: 20px;"><?php echo e(trans('app.reg_new_user')); ?></div>

      <form class="form" method="POST" action="<?php echo e(route('register')); ?>">
        <?php echo csrf_field(); ?>
        <div class="registration__form">
          <div class="form__field" style="padding-right: 20px;">
            <label class="form__label" for="surname" style="color: #055698;"><?php echo e(trans('app.reg_surname')); ?></label>
            <input type="text" name="surname" id="surname" pattern="[А-Яа-яЁёӘҒҚҢӨҰҮҺІәғқңөұүһі\s\-]+" placeholder="<?php echo e(trans('app.reg_enter_surname')); ?>" required autofocus <?php if(!empty($reg_surname)): ?> value="<?php echo e($reg_surname); ?>" <?php endif; ?>>
          </div>
          <div class="form__field" style="padding-left: 20px;">
            <label class="form__label" for="name" style="color: #055698;"><?php echo e(trans('app.reg_name')); ?></label>
            <input type="text" name="name" id="name" pattern="[А-Яа-яЁёӘҒҚҢӨҰҮҺІәғқңөұүһі\s\-]+" placeholder="<?php echo e(trans('app.reg_enter_name')); ?>" required autofocus <?php if(!empty($reg_name)): ?> value="<?php echo e($reg_name); ?>" <?php endif; ?>>
          </div>
          <div class="form__field" style="padding-right: 20px;">
            <label class="form__label" for="middlename" style="color: #055698;"><?php echo e(trans('app.reg_middlename')); ?></label>
            <input type="text" name="middlename" id="middlename" pattern="[А-Яа-яЁёӘҒҚҢӨҰҮҺІәғқңөұүһі\s\-]+" placeholder="<?php echo e(trans('app.reg_enter_middlename')); ?>" autofocus <?php if(!empty($reg_middlename)): ?> value="<?php echo e($reg_middlename); ?>" <?php endif; ?>>
          </div>
          <div class="form__field" style="padding-left: 20px;">
            <label class="form__label" for="email" style="color: #055698;"><?php echo e(trans('app.reg_email')); ?></label>
            <input type="text" name="email" id="email" placeholder="<?php echo e(trans('app.reg_enter_email')); ?>" required autofocus <?php if(!empty($reg_email)): ?> value="<?php echo e($reg_email); ?>" <?php endif; ?>>
          </div>
          <div class="form__field" style="padding-right: 20px;">
            <label class="form__label" for="password" style="color: #055698;"><?php echo e(trans('app.reg_password')); ?></label>
            <input type="password" minlength="8" name="password" id="password" required autofocus>
          </div>
          <div class="form__field" style="padding-left: 20px;">
            <label class="form__label" for="password_confirmation" style="color: #055698;"><?php echo e(trans('app.reg_password_confirm')); ?></label>
            <input type="password" minlength="8" name="password_confirmation" id="password_confirm" required autofocus>
          </div>
        </div>

        <div class="form__field">
          <label class="form__label" for="password" style="color: #055698;"><?php echo e(trans('app.reg_go')); ?></label>
          <select id="government_id" name="government_id" required autofocus>
            <option value="0"><?php echo e(trans('app.reg_select_go')); ?></option>
            <?php if(!empty($reg_government_id) ): ?>
              <?php $__currentLoopData = $governments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $government): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($government->id); ?>" <?php if( $reg_government_id==$government->id ): ?> selected <?php endif; ?> ><?php echo e($government->$name_go); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
              <?php $__currentLoopData = $governments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $government): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($government->id); ?>"><?php echo e($government->$name_go); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>


          </select>
        </div>

        <?php if(!empty($errorMsg)): ?>
        <div class="info-box-error"><b><?php echo e(trans('app.reg_error')); ?>:</b> <?php echo $errorMsg; ?></div>
        <?php elseif(!empty($successMsg)): ?>
        <div class="info-box-success"><?php echo $successMsg; ?></div>
        <?php else: ?>
        <div class="info-box"><?php echo e(trans('app.reg_need_fields')); ?><br><?php echo e(trans('app.reg_check_correct')); ?></div>
        <?php endif; ?>



        <button class="form__submit" type="submit"><?php echo e(trans('app.registration')); ?></button>

      </form>


    </div>
  </div>
</div>





<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/auth/register.blade.php ENDPATH**/ ?>