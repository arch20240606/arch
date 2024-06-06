<nav class="tabs">
  <a class="tabs__link <?php if( Route::is('etalondatas.index') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('etalondatas.index')); ?>" data-id="1">
    <span class="tabs__num"><?php echo e($domainobjects->count()); ?></span>
    Общий список
  </a>
  <!--
  <a class="tabs__link <?php if( Route::is('etalondatas.build') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('etalondatas.build')); ?>">
    Создание эталонных данных
  </a>
  <a class="tabs__link <?php if( Route::is('datacatalog.outbox') ): ?> tabs__link_active <?php endif; ?>" href="#">
    <span class="tabs__num">0</span>
    Отправленные
  </a>
  -->
  <a class="tabs__link <?php if( Route::is('etalondatas.agreement') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('etalondatas.agreement')); ?>">
    <span class="tabs__num">0</span>
    <?php echo e(trans('app.d_agreement')); ?>

  </a>
  <a class="tabs__link <?php if( Route::is('etalondatas.signing') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('etalondatas.signing')); ?>">
    <span class="tabs__num">0</span>
    Утверждение
  </a>
</nav>

<?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/etalondata/menu.blade.php ENDPATH**/ ?>