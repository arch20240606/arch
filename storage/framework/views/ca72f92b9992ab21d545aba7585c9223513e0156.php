<header class="header">
  <div class="container container_large">
    <?php if( Auth::user() ): ?>
      <?php echo $__env->make('layouts.header_auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
      <?php echo $__env->make('layouts.header_without_auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
  </div>
</header><?php /**PATH /var/www/govarch.kz/docs/resources/views/layouts/header.blade.php ENDPATH**/ ?>