<aside class="sidebar">
  <nav class="sidebar__menu">
    <ul class="sidebar__list">
      <li class="sidebar__item">
        <a class="sidebar__link sidebar__toggle" href="#" title="<?php echo e(trans('app.m_show')); ?>" data-title-alt="<?php echo e(trans('app.m_hide')); ?>">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#caret-circle-right"></use>
          </svg>
          <span><?php echo e(trans('app.m_hide')); ?></span>
        </a>
      </li>
      <li class="sidebar__item <?php if( Route::is('datacatalog.create') ): ?> sidebar__item_active <?php endif; ?>">
        <a class="sidebar__link" href="<?php echo e(route('datacatalog.create')); ?>" title="<?php echo e(trans('app.d_create')); ?>">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#plus"></use>
          </svg>
          <span><?php echo e(trans('app.d_create')); ?></span>
        </a>
      </li>
      <li class="sidebar__item <?php if( Route::is('datacatalog.index') ): ?> sidebar__item_active <?php endif; ?>">
        <a class="sidebar__link" href="<?php echo e(route('datacatalog.index')); ?>" title="<?php echo e(trans('app.d_catalog')); ?>">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#folder"></use>
          </svg>
          <span><?php echo e(trans('app.d_catalog')); ?></span>
        </a>
      </li>
      <li class="sidebar__item <?php if( Route::is('datacatalog.draft') ): ?> sidebar__item_active <?php endif; ?>">
        <a class="sidebar__link" href="<?php echo e(route('datacatalog.draft')); ?>" title="<?php echo e(trans('app.d_draft')); ?>">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#archive"></use>
          </svg>
          <span><?php echo e(trans('app.d_draft')); ?></span>
        </a>
      </li>
      <li class="sidebar__item <?php if( Route::is('datacatalog.outbox') ): ?> sidebar__item_active <?php endif; ?>">
        <a class="sidebar__link" href="<?php echo e(route('datacatalog.outbox')); ?>" title="<?php echo e(trans('app.d_outbox')); ?>">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#file"></use>
          </svg>
          <span><?php echo e(trans('app.d_outbox')); ?></span>
        </a>
      </li>
      <li class="sidebar__item <?php if( request()->is('*agreement*') ): ?> sidebar__item_active <?php endif; ?>">
        <a class="sidebar__link" href="<?php echo e(route('datacatalog.agreement')); ?>" title="<?php echo e(trans('app.d_agreement')); ?>">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#check-fill"></use>
          </svg>
          <span><?php echo e(trans('app.d_agreement')); ?></span>
        </a>
      </li>
      <li class="sidebar__item <?php if( request()->is('*signing*') ): ?> sidebar__item_active <?php endif; ?>">
        <a class="sidebar__link" href="<?php echo e(route('datacatalog.signing')); ?>" title="<?php echo e(trans('app.d_signing')); ?>">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#check-square"></use>
          </svg>
          <span><?php echo e(trans('app.d_signing')); ?></span>
        </a>
      </li>
    </ul>
  </nav>
</aside><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/layouts/menu_slide_datacatalog.blade.php ENDPATH**/ ?>