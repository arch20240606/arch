<nav class="is-tabs tabs">
  <a style="width: 25%; font-size: 16px;" class="tabs__link tabs__link_active" href="#" data-id="1">Паспорт</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="2">Функциональная часть</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="3">Техническое задание</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="4">Документы</a>
  
  <?php if(auth()->check() && (auth()->user()->hasRole('ROLE_UO_EXPERTISE_DANA') || auth()->user()->hasRole('ROLE_UO_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_UO_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_SIGNER') || (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')) || auth()->user()->hasRole('ROLE_GO_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_GO_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_KIB_EXPERTISE_EXECUTOR') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_SIGNER')|| auth()->user()->hasRole('ROLE_UO_EXPERTISE_CONFIRMER'))): ?>
    <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="5">Комментарии/Заключение</a>
  <?php endif; ?>
</nav>




<div class="is-tab-content" data-id="1" style="display: block;">
  <?php echo $__env->make('expertise.info.passport', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="is-tab-content" data-id="2">
  <?php echo $__env->make('expertise.info.function', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="is-tab-content" data-id="3">
  <?php echo $__env->make('expertise.info.tz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="is-tab-content" data-id="4">
  <?php echo $__env->make('expertise.info.documents', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>



<div class="is-tab-content" data-id="5">
  <?php echo $__env->make('expertise.info.comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>



<div class="is-tab-content" data-id="7">
  <?php echo $__env->make('expertise.signing.comments_show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/expertise/info/tabs_for_data.blade.php ENDPATH**/ ?>