<h2 class="is-content-title" style="padding-left: 15px; font-size: 15px; color: #0075ff;">Информационные системы</h2>


<div class="is-menu-content" data-id="1" style="display: block;">
  <table class="is-table">

    <tr>
      <td style="width: 30%;">Выбранные системы для изменения</td>
      <td></td>
      <td style="width: 70%; padding: 12px 20px 12px 20px;">
        <select id="selected_is_for_change" name="selected_is_for_change" required>
          <option value="0" selected>Выберите информационную систему</option>
          <?php $__currentLoopData = $iss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $is): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($is->id); ?>"><?php echo e($is->$names); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </td>
    </tr>

    <tr>
      <td style="width: 30%;">Выбранные системы для вывода из эксплуатации</td>
      <td></td>
      <td style="width: 70%; padding: 12px 20px 12px 20px;">
        <select id="selected_is_for_exit" name="selected_is_for_exit" required>
          <option value="0" selected>Выберите информационную систему</option>
          <?php $__currentLoopData = $iss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $is): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($is->id); ?>"><?php echo e($is->$names); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </td>
    </tr>


  </table>
</div>


<h2 class="is-content-title" style="padding-left: 15px; font-size: 15px; color: #0075ff;">Интеграции</h2>

<div class="is-menu-content" data-id="1" style="display: block;">
  <table class="is-table">
    <tr>
      <td style="width: 30%;">Планируемые интеграции для создания</td>
      <td></td>
      <td style="width: 70%; padding: 12px 20px 12px 20px;"><input id="paln_integrations" name="paln_integrations" type="text" minlength="2" maxlength="500" autofocus></td>
    </tr>
  </table>
</div><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/expertise/tabs_data/function.blade.php ENDPATH**/ ?>