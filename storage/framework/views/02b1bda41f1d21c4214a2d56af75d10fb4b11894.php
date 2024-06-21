<nav class="tabs">
  <a class="tabs__link <?php if( Route::is('datacatalog.index') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('datacatalog.index')); ?>">
    <span class="tabs__num">0</span>
    <?php echo e(trans('app.d_catalog')); ?>

  </a>
  <a class="tabs__link <?php if( Route::is('datacatalog.draft') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('datacatalog.draft')); ?>">
    <span class="tabs__num">0</span>
    <?php echo e(trans('app.d_draft')); ?>

  </a>
  <a class="tabs__link <?php if( Route::is('datacatalog.outbox') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('datacatalog.outbox')); ?>">
    <span class="tabs__num">0</span>
    <?php echo e(trans('app.d_outbox')); ?>

  </a>
  <a class="tabs__link <?php if( request()->is('*agreement*') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('datacatalog.agreement')); ?>">
    <span class="tabs__num">0</span>
    На утверждении
  </a>
  <a class="tabs__link <?php if( request()->is('*signing*') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('datacatalog.signing')); ?>">
    <span class="tabs__num">0</span>
    <?php echo e(trans('app.d_agreement')); ?>

  </a>
  <a class="tabs__button btn btn_icon" href="<?php echo e(route('datacatalog.create')); ?>">
    <svg>
      <use xlink:href="/assets/images/sprite.svg#plus"></use>
    </svg>
    <?php echo e(trans('app.d_create')); ?>

  </a>
</nav>

<?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/datacatalog/index_menu.blade.php ENDPATH**/ ?>