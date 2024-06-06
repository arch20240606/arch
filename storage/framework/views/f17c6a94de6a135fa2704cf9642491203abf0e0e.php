

<?php $__env->startSection('title'); ?><?php echo e(trans('app.myreqests')); ?><?php $__env->stopSection(); ?>

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
      
      <a href="<?php echo e(route('accounting.information')); ?>">Режим редактирования бюджетных заявок</a>
      /
      <span>Режим редактирования бюджетных заявок</span>
    </div>

    <h3 >Режим редактирования бюджетных заявок</h3>
    <hr>
    <h4>Бюджетный процесс</h4>
    
    <div class="is-info__body">
      <form class="form" method="POST" action="asdas">
        
        <div class="is-info__left is-info__col" style="width:1300px ">
          <div class="is-info__right-header">Детальная информация</div>
          <div class="is-info__row" style="margin-top: 13px;">
            <p><b>Год заявки</b></p>
            <input id="surname" name="surname" value="<?php echo e($budgetProcess->year); ?>" type="text" minlength="2" maxlength="255" required>
          </div>
          <div class="is-info__row">
            <p><b>Название</b></p>
            <input id="name" name="name" value="<?php echo e($budgetProcess->name); ?>" type="text" minlength="2" maxlength="255" required>
          </div>
          <div class="is-info__row">
            <p><b>Актуальность</b></p>
            <input id="middlename" name="middlename" value="<?php echo e($budgetProcess->isActual ? 'Да' : 'Нет'); ?>" type="text" minlength="2" maxlength="255">
          </div>
          <div class="is-info__row">
            <p><b>Тип бюджетного процесса</b></p>
            <input id="email" name="email" value="<?php
            switch ($budgetProcess->type) {
                case "actualisation":
                    echo "Уточнение";
                    break;
                case "adjustment":
                    echo "Корректировка";
                    break;
                case "applying":
                    echo "Начало нового бюджетного цикла";
                    break;
                default:
                    echo "Неизвестный тип";
                    break;
            }
            ?>" type="text" minlength="2" maxlength="255">
          </div>
          <div class="is-info__row">
            <p><b>Список бюджетных заявок</b></p>
            <input id="new_password" name="new_password" value="Список бюджетных заявок в данном бюджетном процессе" type="text" minlength="8" maxlength="16">
            <p>Ссылка на просмотр бюджетных заявок</p>
          </div>
          <div class="is-info__row">
            <p><b>Дата создания</b></p>
            <input id="new_password" name="new_password" value="<?php echo e($budgetProcess->createDateTime); ?>" type="text" minlength="8" maxlength="16">
          </div>
          <div class="is-info__row">
            <p><b>Дата закрытия</b></p>
            <input id="new_password" name="new_password" value="<?php echo e($budgetProcess->finishDateTime); ?>" type="text" minlength="8" maxlength="16">
          </div>
          
          
        </div>
      </form>

</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('other_divs'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/budget/show.blade.php ENDPATH**/ ?>