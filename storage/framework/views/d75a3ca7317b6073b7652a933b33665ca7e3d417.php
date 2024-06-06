<nav class="tabs">
  <a class="tabs__link <?php if( Route::is('datacatalog.index') ): ?> tabs__link_active <?php endif; ?>" href="#">
    <span class="tabs__num">0</span>
    <?php echo e(trans('app.d_inbox')); ?>

  </a>
  <a class="tabs__link <?php if( Route::is('datacatalog.draft') ): ?> tabs__link_active <?php endif; ?>" href="#">
    <span class="tabs__num">0</span>
    <?php echo e(trans('app.d_draft')); ?>

  </a>
  <a class="tabs__link <?php if( Route::is('datacatalog.outbox') ): ?> tabs__link_active <?php endif; ?>" href="#">
    <span class="tabs__num">0</span>
    <?php echo e(trans('app.d_outbox')); ?>

  </a>
  <a class="tabs__link <?php if( Route::is('datacatalog.agreement') ): ?> tabs__link_active <?php endif; ?>" href="#">
    <span class="tabs__num">0</span>
    <?php echo e(trans('app.d_agreement')); ?>

  </a>
  <a class="tabs__link <?php if( Route::is('datacatalog.signing') ): ?> tabs__link_active <?php endif; ?>" href="#">
    <span class="tabs__num">0</span>
    <?php echo e(trans('app.d_signing')); ?>

  </a>
  <a class="tabs__button btn btn_icon" href="<?php echo e(route('reestr.create')); ?>">
    <svg>
      <use xlink:href="/assets/images/sprite.svg#plus"></use>
    </svg>
    Включение в Реестр
  </a>
</nav>

<?php /**PATH /var/www/govarch.kz/docs/resources/views/reestr/index_menu.blade.php ENDPATH**/ ?>