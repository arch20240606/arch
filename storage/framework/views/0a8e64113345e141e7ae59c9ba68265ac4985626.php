<div id="login-popup" class="popup">
  <div class="popup__block">
    <div class="popup__col popup__col_left">
      <div class="popup__caption"><?php echo trans('app.welcome'); ?></div>
    </div>
    <div class="popup__col popup__col_right">
      <button class="popup__close"></button>

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
          <input type="password" name="password" id="password" required>
        </div>
        <a class="form__forgot-password" href="#"><?php echo e(trans('app.forgot')); ?></a>
        <button class="form__submit" type="submit"><?php echo e(trans('app.login')); ?></button>
      </form>

      <div class="popup__warning warning_success warning">
        <div class="warning__title"></div>
        <div class="warning__text"><?php echo trans('app.allquestions'); ?></div>
      </div>
    </div>
  </div>
</div><?php /**PATH /var/www/govarch.kz/docs/resources/views/layouts/login_popup.blade.php ENDPATH**/ ?>