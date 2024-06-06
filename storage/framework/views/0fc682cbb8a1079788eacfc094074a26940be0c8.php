<nav class="tabs">
  <a class="tabs__link <?php if( Route::is('accounting.index') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('accounting.index')); ?>">
    <span class="tabs__num">0</span>
    <?php echo e(trans('app.myreqests')); ?>

  </a>
  <a class="tabs__link <?php if( Route::is('accounting.inbox') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('accounting.inbox')); ?>">
    <span class="tabs__num">0</span>
    Входящие
  </a>
  <a class="tabs__link <?php if( Route::is('accounting.outbox') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('accounting.outbox')); ?>">
    <span class="tabs__num">0</span>
    Исходящие
  </a>
  <a class="tabs__link <?php if( Route::is('accounting.draft') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('accounting.draft')); ?>">
    <span class="tabs__num">0</span>
    Черновики
  </a>
  <a class="tabs__button btn btn_icon" href="<?php echo e(route('accounting.create')); ?>">
    <svg>
      <use xlink:href="/assets/images/sprite.svg#plus"></use>
    </svg>
    Создать
  </a>
</nav>
<?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/accounting/reqests/menu.blade.php ENDPATH**/ ?>