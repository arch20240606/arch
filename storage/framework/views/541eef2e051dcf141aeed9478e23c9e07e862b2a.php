

<?php $__env->startSection('title'); ?><?php echo e(trans('app.expert')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>

<?php
if (app()->getLocale() == "ru") {
  $names = 'name_ru';
} elseif (app()->getLocale() == "en") {
  $names = 'name_en';
} else {
  $names = 'name_kz';
}
?>

<?php $__env->startSection('header'); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="content">

  <div class="container">

    <div class="breadcrumbs">
      <a class="breadcrumbs__home" href="/">
        <svg>
          <use xlink:href="/assets/images/sprite.svg#house"></use>
        </svg>
      </a>
      /
      <a href="<?php echo e(route('expertise.index')); ?>"><?php echo e(trans('app.m_expert')); ?></a>
      <!--
      /
      <span><?php echo e(trans('app.d_catalog')); ?></span>
      -->
    </div>

    <h1 class="page-title"><?php echo e(trans('app.m_expert')); ?></h1>
    
    <?php echo $__env->make('expertise.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="filter-title">Запросы на экспертизу: В работе</div>
    
  
    <?php if( $expertises->isEmpty() ): ?>
      <div class="notice">В разделе <b>В работе</b> отсутствуют данные</div>
    <?php else: ?>

      <table class="table table_expertise">
        <thead>
        <tr>
          <th>IDE</th>
          <th>Тип проекта</th>
          <th style="text-align: left;">Наименование</th>
          <th>Версия</th>
          <th>Владелец</th> 
          
          <th>Действие</th>
        </tr>
        </thead>
        <tbody>

          <?php $__currentLoopData = $expertises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expertise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            if ( $expertise->type_project == "1" ) {
              $type_project_name = "Запрос государственного органа на автоматизацию деятельности государственного органа в уполномоченный орган и сервисному интегратору (СМИ)";
            } elseif ( $expertise->type_project == "2" ) {
              $type_project_name = "Инвестиционное предложение";
            } elseif ( $expertise->type_project == "3" ) {
              $type_project_name = "Технико-экономическое обоснование";
            } elseif ( $expertise->type_project == "4" ) {
              $type_project_name = "Техническое задание";
            } else {
              $type_project_name = "Не определен";
            }
            ?>

            <tr>
              <td class="table__status"><?php echo e($expertise->id); ?></td>
              <td class="table__status"><?php echo e($type_project_name); ?></td>
              <?php if($expertise->user_id == Auth::user()->id): ?>
               
               <td class="table__name"><a href="<?php echo e(route('expertise.create_version', ['expertise' => $expertise->id])); ?>"><?php echo e($expertise->it_project->$names); ?></a></td>
              <?php endif; ?>
              <td class="table__status"><?php echo e($expertise->version); ?></td>
              
              
              <td class="table__status"><?php echo e($expertise->gosorg->name_ru); ?></td>
              
              

              <td class="table__status">
                <?php if($expertise->user_id == Auth::user()->id): ?>
                    <div style="display: flex; align-items: center;">
                        
                        &nbsp;&nbsp;&nbsp;
                        <a href="#" class="feather" onclick="event.preventDefault(); document.getElementById('delete-expertise-<?php echo e($expertise->id); ?>').submit();">
                            <svg style="stroke: #b1073a">
                                <use href="/assets/images/feather-sprite.svg#trash"/>
                            </svg>
                        </a>
                        <form id="delete-expertise-<?php echo e($expertise->id); ?>" action="<?php echo e(route('expertise.destroy', ['expertise' => $expertise->id])); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                        </form>
                    </div>
                <?php endif; ?>
            </td>
            
            </tr>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        </tbody>
      </table>

      <?php echo e($expertises->links('layouts.pagination.softdeco')); ?>



    <?php endif; ?>

    <!-- Toast сообщение -->
    <?php if(session('successMsg')): ?>
        <div class="toast" id="toast" style="position: fixed; top: 20px; right: 20px; background-color: #00f110; color: #fff; padding: 25px; border-radius: 5px; z-index: 1000;">
            <?php echo e(session('successMsg')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('errorMsg')): ?>
            <div class="toast" id="errorToast" style="position: fixed; top: 20px; right: 20px; background-color: #ff0000; color: #fff; padding: 25px; border-radius: 5px; z-index: 1000;">
                <b><?php echo e(trans('app.reg_error')); ?>:</b> <?php echo e(session('errorMsg')); ?>

            </div>
    <?php endif; ?>



  </div>

</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('other_divs'); ?>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
// Функция для показа toast сообщения
function showToast(message, error = false) {
    var toastId = error ? 'errorToast' : 'toast';
    var toast = document.getElementById(toastId);
    toast.innerText = message;
    toast.style.display = 'block';
    setTimeout(function() {
        toast.style.display = 'none';
    }, 5000); // Скрыть toast сообщение через 5 секунд
}

// Вызов функции для показа toast сообщения об успехе
showToast('<?php echo e(session('successMsg')); ?>');

// Вызов функции для показа toast сообщения об ошибке
<?php if((session('errorMsg'))): ?>
    showToast('<?php echo e(session('errorMsg')); ?>', true);
<?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/expertise/draft.blade.php ENDPATH**/ ?>