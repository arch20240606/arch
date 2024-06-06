<?php $__env->startSection('title'); ?><?php echo e(trans('app.аuthorization')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="content">
  <section >

    <div class="intro__bg">
      <picture>
        <source srcset="/assets/images/intro-bg.avif" type="image/avif">
        <source srcset="/assets/images/intro-bg.webp" type="image/webp">
        <img src="/assets/images/intro-bg.jpg" alt="Background" style="height: 100vh">
      </picture>
    </div>
  </section>
</main>

<div id="login-popup">
  <div class="popup__block">
    <div class="popup__col popup__col_left">
      <div class="popup__caption"><?php echo trans('app.welcome'); ?></div>
    </div>
    <div class="popup__col popup__col_right">

      <div style="text-align: center;">
      <img src="/logos/logo_<?php echo e(app()->getLocale()); ?>.png" height="45" alt="<?php echo e(trans('app.site_title')); ?>" title="<?php echo e(trans('app.site_title')); ?>">
      </div>

      <div class="popup__title"><?php echo e(trans('app.login')); ?></div>

      <form class="popup__form form" method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form__field">
          <label class="form__label" for="email"><?php echo e(trans('app.name_email')); ?></label>
          <input type="text" name="email" id="email" placeholder="E-mail" required autofocus>
        </div>
        <div class="form__field">
          <label class="form__label" for="password"><?php echo e(trans('app.password')); ?></label>
          <input type="password" name="password" id="password" placeholder="*************" required>
        </div>
        <a class="form__forgot-password" href="#"><?php echo e(trans('app.forgot')); ?></a>
        <button class="form__submit" type="submit"><?php echo e(trans('app.login')); ?></button>
      </form>

      <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="popup__warning warning">
          <div class="warning__text">Введенные данные некорректны. Проверьте e-mail и пароль</div>
        </div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

      <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="popup__warning warning">
          <div class="warning__text">Введенные данные некорректны. Проверьте e-mail и пароль</div>
        </div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

      <div class="popup__warning warning_success warning">
        <div class="warning__title"></div>
        <div class="warning__text"><?php echo trans('app.allquestions'); ?></div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/auth/login.blade.php ENDPATH**/ ?>