<nav class="tabs">
  <a class="tabs__link <?php if( Route::is('expertise.index') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('expertise.index')); ?>">
    <span class="tabs__num">0</span>
    В работе
  </a>
  <a class="tabs__link" href="#">
    <span class="tabs__num" style="background: #0178BC;">0</span>
    На согласовании
  </a>
  <a class="tabs__link" href="#">
    <span class="tabs__num" style="background: #39C07F;">0</span>
    На подписи
  </a>
  <a class="tabs__link" href="#">
    <span class="tabs__num" style="background: #727FA2;">0</span>
    Исходящие
  </a>
  <a class="tabs__link" href="#">
    <span class="tabs__num" style="background: #EEC609; ">0</span>
    Архив
  </a>
  <a class="tabs__button btn btn_icon" href="<?php echo e(route('expertise.create')); ?>">
    <svg>
      <use xlink:href="/assets/images/sprite.svg#plus"></use>
    </svg>
    Создать
  </a>
</nav>
<?php /**PATH /var/www/govarch.kz/docs/resources/views/expertise/menu.blade.php ENDPATH**/ ?>