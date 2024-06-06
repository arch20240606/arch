<nav class="tabs">
  
<?php if(auth()->check() && (auth()->user()->hasRole('ROLE_UO_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_KIB_EXPERTISE_EXECUTOR') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_UO_EXPERTISE_DANA') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_CONFIRMER'))): ?>
    <a class="tabs__link <?php if(Route::is('expertise.in_work')): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('expertise.in_work')); ?>">
        <span class="tabs__num" style="background: #39C07F;">0</span>
        В работе 
    </a>
<?php elseif(auth()->check() && (auth()->user()->hasRole('ROLE_SI_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_REVIEWER'))): ?>
    <a class="tabs__link <?php if(Route::is('expertise.executor')): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('expertise.executor')); ?>">
        <span class="tabs__num" style="background: #39C07F;">0</span>
        В работе 
    </a>
<?php elseif(auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR'))): ?>
    <a class="tabs__link <?php if(Route::is('expertise.goExecutor')): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('expertise.goExecutor')); ?>">
        <span class="tabs__num" style="background: #39C07F;">0</span>
        В работе 
    </a>
    <a class="tabs__link <?php if(Route::is('expertise.draft')): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('expertise.draft')); ?>">
      <span class="tabs__num" style="background: #EEC609;"><?php echo e(session('expertiseCount')); ?></span>
      Черновик
    </a>    
<?php else: ?><a class="tabs__link <?php if(Route::is('expertise.draft')): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('expertise.draft')); ?>">
        <span class="tabs__num" style="background: #EEC609;">0</span>
        В работе
    </a>
<?php endif; ?>

  <?php if(auth()->check() && (auth()->user()->hasRole('ROLE_SI_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_KIB_EXPERTISE_CONFIRMER'))): ?>
  <a class="tabs__link <?php if(Route::is('expertise.approve_confirmers')): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('expertise.approve_confirmers')); ?>">
      <span class="tabs__num" style="background: #39C07F;">0</span>
      На согласовании
  </a>
  <?php else: ?>
  <a class="tabs__link <?php if( Route::is('expertise.approve') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('expertise.approve')); ?>">
    <span class="tabs__num">0</span>
    На согласовании
  </a>
  <?php endif; ?>
  <?php if(auth()->check() && (auth()->user()->hasRole('ROLE_SI_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_SIGNER'))): ?>
  <a class="tabs__link <?php if( Route::is('expertise.signer_outbox') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('expertise.signer_outbox')); ?>">
    <span class="tabs__num">0</span>
    На подписи
  </a>
  <?php else: ?>
  <a class="tabs__link <?php if( Route::is('expertise.outbox') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('expertise.outbox')); ?>">
    <span class="tabs__num" style="background: #0178BC;">0</span>
    На подписи
  </a>
  <?php endif; ?>
  <?php if(auth()->check() && (auth()->user()->hasRole('ROLE_UO_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_STS_EXPERTISE_SIGNER'))): ?>
  <a class="tabs__link <?php if( Route::is('expertise.signing*') ): ?> tabs__link_active <?php endif; ?>" href="<?php echo e(route('expertise.signing')); ?>">
    <span class="tabs__num" style="background: #39C07F;">0</span>
    Исходящие
  </a>
  <?php endif; ?>
  
<!--
  <a class="tabs__link" href="#">
    <span class="tabs__num" style="background: #EEC609; ">0</span>
    Архив
  </a>
--><?php if(auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR'))): ?>
    <a class="tabs__button btn btn_icon" href="<?php echo e(route('expertise.create')); ?>">
      <svg>
        <use xlink:href="/assets/images/sprite.svg#plus"></use>
      </svg>
      Создать
    </a>
  <?php endif; ?>
</nav>
<?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/expertise/menu.blade.php ENDPATH**/ ?>