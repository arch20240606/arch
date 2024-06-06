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
      
      <li class="sidebar__item sidebar__item_has-submenu">
        <a class="sidebar__link" href="#" title="Реестр регуляторных актов">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#folder"></use>
          </svg>
          <span>Реестр регуляторных актов</span>
        </a>
        <ul class="sidebar__submenu">
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Реестр регуляторных актов</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Свод</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Реестр</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Сценарий</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Инструкции</a></li>
        </ul>
      </li>

      <li class="sidebar__item sidebar__item_has-submenu">
        <a class="sidebar__link" href="#" title="Система управления рисками">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#folder"></use>
          </svg>
          <span>Система управления рисками</span>
        </a>
        <ul class="sidebar__submenu">
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Система управления рисками</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Свод</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Реестр</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Инструкции</a></li>

        </ul>
      </li>


    </ul>
  </nav>
</aside><?php /**PATH /var/www/govarch.kz/docs/resources/views/layouts/menu_slide_reestr.blade.php ENDPATH**/ ?>