<footer class="footer">
  <div class="container">
    <a class="footer__logo logo" href="/<?php echo e(app()->getLocale()); ?>/">
      <img src="/logos/logo_<?php echo e(app()->getLocale()); ?>.png" height="45" alt="<?php echo e(trans('app.site_title')); ?>" title="<?php echo e(trans('app.site_title')); ?>">
      <!--
      <svg class="logo__icon"><use xlink:href="/assets/images/sprite.svg#logo"></use></svg>
      <p class="logo__name"><?php echo trans('app.archportal'); ?></p>
      -->
    </a>
    <nav class="footer__menu">
      <ul class="footer__list">
        <li class="footer__item">
          <a class="footer__link" href="<?php echo e(route('accounting.information')); ?>"><?php echo e(trans('app.uchet')); ?></a>
        </li>
        <li class="footer__item">
          <a class="footer__link" href="<?php echo e(route('budget.index')); ?>"><?php echo e(trans('app.budget')); ?></a>
        </li>
        <li class="footer__item">
          <a class="footer__link" href="<?php echo e(route('expertise.index')); ?>"><?php echo e(trans('app.expert')); ?></a>
        </li>
        <li class="footer__item">
          <a class="footer__link" href="#"><?php echo e(trans('app.public_discus')); ?></a>
        </li>
        <li class="footer__item">
          <a class="footer__link" href="https://govarchi.kz/" target="_blank"><?php echo e(trans('app.architecture')); ?></a>
        </li>
        <li class="footer__item">
          <a class="footer__link" href="<?php echo e(route('calculator')); ?>"><?php echo e(trans('app.calculator')); ?></a>
        </li>
        <li class="footer__item">
          <a class="footer__link footer__link_download" href="<?php echo e(route('terms')); ?>"><?php echo e(trans('app.download_tz')); ?></a>
        </li>
      </ul>
    </nav>
  </div>
</footer><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/layouts/footer.blade.php ENDPATH**/ ?>