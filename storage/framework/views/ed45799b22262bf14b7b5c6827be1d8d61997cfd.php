<h2 class="is-content-title" style="padding-left: 15px; font-size: 15px; color: #0075ff;">Информационные системы</h2>


<div class="is-menu-content" data-id="1" style="display: block;">
  <table class="is-table">

    <tr>
      <td style="width: 35%;">Выбранные системы для изменения</td>
      <td></td>
      <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px; width: 65%">
        <?php if($version->selected_is_for_change > 0 ): ?>
          <?php echo e($version->getISS($version->selected_is_for_change)->$names); ?>

        <?php endif; ?>
      </td>
    </tr>

    <tr>
      <td style="width: 35%;">Выбранные системы для вывода из эксплуатации</td>
      <td></td>
      <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px; width: 65%">
        <?php if($version->selected_is_for_exit > 0 ): ?>
          <?php echo e($version->getISS($version->selected_is_for_exit)->$names); ?>

        <?php endif; ?>
      </td>
    </tr>


  </table>
</div>


<h2 class="is-content-title" style="padding-left: 15px; font-size: 15px; color: #0075ff;">Интеграции</h2>

<div class="is-menu-content" data-id="1" style="display: block;">
  <table class="is-table">
    <tr>
      <td style="width: 35%;">Планируемые интеграции для создания</td>
      <td></td>
      <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px; width: 65%"><?php echo e($version->paln_integrations); ?></td>
    </tr>
  </table>
</div>  
<?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/expertise/info/function.blade.php ENDPATH**/ ?>