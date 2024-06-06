<div class="lang__current"><?php echo e(app()->getLocale()); ?></div>
<div class="lang__list">
  <?php if( app()->getLocale() == "ru"): ?>
  <a class="lang__item" href="<?php echo e(LaravelLocalization::getLocalizedURL('kz')); ?>">KZ</a>
  <a class="lang__item" href="<?php echo e(LaravelLocalization::getLocalizedURL('en')); ?>">EN</a>
  <?php elseif( app()->getLocale() == "en"): ?>
  <a class="lang__item" href="<?php echo e(LaravelLocalization::getLocalizedURL('kz')); ?>">KZ</a>
  <a class="lang__item" href="<?php echo e(LaravelLocalization::getLocalizedURL('ru')); ?>">RU</a>
  <?php else: ?>
  <a class="lang__item" href="<?php echo e(LaravelLocalization::getLocalizedURL('ru')); ?>">RU</a>
  <a class="lang__item" href="<?php echo e(LaravelLocalization::getLocalizedURL('en')); ?>">EN</a>                
  <?php endif; ?>
</div><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/layouts/lang.blade.php ENDPATH**/ ?>