

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
      <a href="<?php echo e(route('accounting.information')); ?>"><?php echo e(trans('app.m_uchet')); ?></a>
      /
      <span>Объекты данных</span>
    </div>

    

    
  
   


  
  
  
  
  
    
  


<hr>
<h4>Просмотр сведений об объекте данных.</h4>


<div class="is-info__body">
  <form class="form" method="POST" action="asdas">
    <div class="is-info__left is-info__col" style="width:1300px ">
      <div class="is-info__right-header" style="background-color: rgb(45, 45, 239)">Детальная информация</div>
      <div class="is-info__row" style="margin-top: 13px;">
        <p><b>Наименование объекта данных</b></p>
        <input id="surname" name="surname" value="<?php echo e($is->name); ?>" type="text" minlength="2" maxlength="255" required>
      </div>
      <div class="is-info__row">
        <p><b>Владелец</b></p>
        <input id="name" name="name" value="<?php echo e($is->gosorg->name); ?>" type="text" minlength="2" maxlength="255" required>
      </div>
      <div class="is-info__row">
        <p><b>Описание объекта данных</b></p>
        <input id="middlename" name="middlename" value="<?php echo e($is->BusinessObjectDescription); ?>" type="text" minlength="2" maxlength="255">
      </div>
      <div class="is-info__row">
        <p><b>Синонимы объекта данных</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->BusinessObjectSynonyms);
        ?>
        <input id="middlename" name="middlename" value="<?php echo e($inputValue); ?>" type="text" minlength="2" maxlength="255">
      </div>
      <div class="is-info__row">
        <p><b>Вид объекта данных</b></p>
        <input id="new_password" name="new_password" value="<?php echo e($is->BusinessObjectType); ?>" type="text" minlength="8" maxlength="16">
      </div>
      <div class="is-info__row">
        <p><b>Разновидности объекта данных</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->BusinessObjectVariants);
        ?>
        <input id="new_password" name="new_password" value="<?php echo e($inputValue); ?>" type="text" minlength="8" maxlength="16">
      </div>
      <div class="is-info__row">
        <p><b>Нормативно-правовые акты</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->ngrs);
        ?>
        <a href="https://adilet.zan.kz/rus/docs/<?php echo e($inputValue); ?>">adilet.zan.kz/rus/docs/<?php echo e($inputValue); ?></a>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/bussinessObject/info.blade.php ENDPATH**/ ?>