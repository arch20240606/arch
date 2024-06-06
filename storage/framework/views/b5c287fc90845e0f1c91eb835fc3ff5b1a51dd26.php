<option value=""><?php echo e(trans('app.dc_name_is_select')); ?></option>
<?php $__currentLoopData = $InformationSystems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $InformationSystem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option value="<?php echo e($InformationSystem->id); ?>" <?php if($InformationSystem->id == $passport): ?> selected <?php endif; ?>><?php echo e($InformationSystem->name_ru); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /var/www/govarch.kz/docs/resources/views/datacatalog/select_is.blade.php ENDPATH**/ ?>