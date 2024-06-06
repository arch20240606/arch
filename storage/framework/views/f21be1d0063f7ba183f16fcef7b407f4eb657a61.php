<nav class="tabs">
  <a class="tabs__link <?php if( Route::is('administrator.index') || Route::is('administrator.edit') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('administrator.index')); ?>">
    <span class="tabs__num"><?php echo e($users_count); ?></span>
    Пользователи
  </a>
  <a class="tabs__link <?php if( Route::is('administrator.passport') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('administrator.passport')); ?>">
    <span class="tabs__num"><?php echo e($passports_count); ?></span>
    Паспорта
  </a>
  <a class="tabs__link <?php if( Route::is('administrator.uchet*') || Route::is('administrator.update')): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('administrator.uchet')); ?>">
    <span class="tabs__num"><?php echo e($uchet_count); ?></span>
    Учет сведений
  </a>

</nav>

<?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/administrator/menu.blade.php ENDPATH**/ ?>