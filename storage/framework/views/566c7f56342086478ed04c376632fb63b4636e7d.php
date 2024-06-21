<nav class="tabs">
  <?php if(Auth::user()->government_id == 108 ): ?>
    <a class="tabs__link <?php if( Route::is('businessprocess.reestr') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('businessprocess.reestr')); ?>">
      <span class="tabs__num">0</span>
      Реестр
    </a>
  <?php endif; ?>
  <?php if(Auth::user()->government_id != 108 ): ?>
  <a class="tabs__link <?php if( Route::is('businessprocess.index') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('businessprocess.index')); ?>">
    <span class="tabs__num">0</span>
    Мои кейсы
  </a>
  <?php endif; ?>
  <!--
  <a class="tabs__link <?php if( Route::is('datacatalog.outbox') ): ?> tabs__link_active <?php endif; ?>" href="#">
    <span class="tabs__num">0</span>
    <?php echo e(trans('app.d_outbox')); ?>

  </a>
  <a class="tabs__link <?php if( Route::is('datacatalog.agreement') ): ?> tabs__link_active <?php endif; ?>" href="#">
    <span class="tabs__num">0</span>
    <?php echo e(trans('app.d_agreement')); ?>

  </a>
  -->
  <a class="tabs__link <?php if( Route::is('datacatalog.signing') ): ?> tabs__link_active <?php endif; ?>" href="#">
    <span class="tabs__num">0</span>
    <?php echo e(trans('app.d_signing')); ?>

  </a>
  <a class="tabs__button btn btn_icon" href="<?php echo e(route('businessprocess.create')); ?>">
    <svg>
      <use xlink:href="/assets/images/sprite.svg#plus"></use>
    </svg>
    Включение в Реестр
  </a>
</nav>

<?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/businessprocess/index_menu.blade.php ENDPATH**/ ?>