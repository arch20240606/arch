<nav class="is-tabs tabs">
  <a style="width: 25%; font-size: 16px;" class="tabs__link tabs__link_active" href="#" data-id="1">Паспорт</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="2">Функциональная часть</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="3">Техническое задание</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="4">Документы</a>
  <?php if(auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR') || auth()->user()->hasRole('ROLE_GO_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_SIGNER'))): ?>
    <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="5">Комментарии</a>
  <?php elseif(auth()->check() && (auth()->user()->hasRole('ROLE_UO_EXPERTISE_DANA') || auth()->user()->hasRole('ROLE_UO_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_UO_EXPERTISE_SIGNER'))): ?>
    <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="5">Комментарии/Заключение</a>
  <?php endif; ?>
</nav>




<div class="is-tab-content" data-id="1" style="display: block;">
  <?php echo $__env->make('expertise.tabs_data.passport', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="is-tab-content" data-id="2">
  <?php echo $__env->make('expertise.tabs_data.function', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="is-tab-content" data-id="3">
  <?php echo $__env->make('expertise.tabs_data.tz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="is-tab-content" data-id="4">
  <?php echo $__env->make('expertise.tabs_data.documents', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php if(auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR') || auth()->user()->hasRole('ROLE_GO_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_SIGNER'))): ?>
<div class="is-tab-content" data-id="5">
  <?php echo $__env->make('expertise.tabs_data.comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php else: ?>
<div class="is-tab-content" data-id="5">
  <?php echo $__env->make('expertise.signing.comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php endif; ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/expertise/tabs_for_data.blade.php ENDPATH**/ ?>