<div class="header__inner">
  <div class="header__column header__column_left">
    <nav class="header__menu">
      <ul class="header__menu-list">
        <li class="header__menu-item">
          <a class="header__menu-link" href="#"><?php echo e(trans('app.myreqests')); ?></a>
        </li>
        <li class="header__menu-item">
          <a class="header__menu-link" href="#"><?php echo e(trans('app.help')); ?></a>
        </li>
        <li class="header__menu-item">
          <a class="header__menu-link header__menu-link_download" href="<?php echo e(route('terms')); ?>"><?php echo e(trans('app.download_tz')); ?></a>
        </li>
      </ul>
    </nav>
  </div>
  <a class="header__logo logo" href="<?php echo e(route('home')); ?>">
    <img src="/logos/logo_<?php echo e(app()->getLocale()); ?>.png" height="45" alt="<?php echo e(trans('app.site_title')); ?>" title="<?php echo e(trans('app.site_title')); ?>">
    <!--
    <svg class="logo__icon">
      <use xlink:href="/assets/images/sprite.svg#logo"></use>
    </svg>
    <p class="logo__name">
      <?php echo trans('app.archportal'); ?>

    </p>
    -->
  </a>
  <div class="header__column header__column_right">
    <div class="header__actions">
      <a class="header__search header__action popupOpen" href="#search-popup" title="<?php echo e(trans ('app.search')); ?>">
        <svg>
          <use xlink:href="/assets/images/sprite.svg#search"></use>
        </svg>
      </a>
      <div class="header__notifications">
        <div class="header__action">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#bell"></use>
          </svg>
        </div>
        <div class="header__notifications-block">
          <div class="header__notifications-header">
            Уведомления
            <button class="header__notifications-clear">
              <svg>
                <use xlink:href="/assets/images/sprite.svg#trash"></use>
              </svg>
            </button>
          </div>
          <a class="header__notifications-item header__notifications-item_new" href="#">
            <div class="header__action">
              <svg>
                <use xlink:href="/assets/images/sprite.svg#bell"></use>
              </svg>
            </div>
            <span class="header__notifications-item-title">Уведомление 1</span>
            <span class="header__notifications-item-date">2ч. назад</span>
          </a>
          <a class="header__notifications-item" href="#">
            <div class="header__action">
              <svg>
                <use xlink:href="/assets/images/sprite.svg#bell"></use>
              </svg>
            </div>
            <span class="header__notifications-item-title">Уведомление 2</span>
            <span class="header__notifications-item-date">19 д. назад</span>
          </a>
          <a class="header__notifications-all" href="#">Все уведомления</a>
        </div>
      </div>
      <div class="header__user">
        <div class="header__action">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#user"></use>
          </svg>
        </div>
        <?php echo e(Auth::user()->surname); ?> <?php echo e(Auth::user()->name); ?>

        <div class="header__user-menu">

          <?php if( Auth::user()->government_id == 108): ?>
          <a class="header__user-link" href="<?php echo e(route('administrator.index')); ?>">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#admin"></use>
            </svg>
            Администратор
          </a>
          <?php endif; ?>
          <a class="header__user-link" href="<?php echo e(route('profile.index')); ?>">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#user"></use>
            </svg>
            <?php echo e(trans('app.profile')); ?>

          </a>
          <a class="header__user-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#exit"></use>
            </svg>
            <?php echo e(trans('app.logout')); ?>

          </a>
        </div>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
          <?php echo csrf_field(); ?>
        </form>
      </div>
    </div>

    <div class="header__lang lang">
      <?php echo $__env->make('layouts.lang', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    
  </div>
</div><?php /**PATH /var/www/govarch.kz/docs/resources/views/layouts/header_auth.blade.php ENDPATH**/ ?>