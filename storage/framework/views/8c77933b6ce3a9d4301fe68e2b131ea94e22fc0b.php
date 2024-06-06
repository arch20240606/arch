

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
        <p><b>Тип оборудования</b></p>
        <input id="surname" name="surname" value="<?php echo e($is->type); ?>" type="text" minlength="2" maxlength="255" required>
      </div>
      <div class="is-info__row">
        <p><b>Инвентарный номер актива</b></p>
        <input id="name" name="name" value="<?php echo e($is->assetInvNumber); ?>" type="text" minlength="2" maxlength="255" required>
      </div>
      <div class="is-info__row">
        <p><b>Серийный номер аппаратного средства</b></p>
        <input id="middlename" name="middlename" value="<?php echo e($is->HardwareItemSerialNumber); ?>" type="text" minlength="2" maxlength="255">
      </div>
      <div class="is-info__row">
        <p><b>Имя</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->name);
        ?>
        <input id="middlename" name="middlename" value="<?php echo e($inputValue); ?>" type="text" minlength="2" maxlength="255">
      </div>
      <div class="is-info__row">
        <p><b>Производитель/линейка</b></p>
        <input id="new_password" name="new_password" value="<?php echo e($is->product); ?>" type="text" minlength="8" maxlength="16">
      </div>
      <div class="is-info__row">
        <p><b>Модель оборудования</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->model);
        ?>
        <input id="new_password" name="new_password" value="<?php echo e($inputValue); ?>" type="text" minlength="8" maxlength="16">
      </div>
      <div class="is-info__row">
        <p><b>Владелец объекта</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->ngrs);
        ?>
        <input id="new_password" name="new_password" value="<?php echo e($is->gosorg->name); ?>" type="text" minlength="8" maxlength="16">
      </div>
      <div class="is-info__row">
        <p><b>Степень износа актива</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->ngrs);
        ?>
        <input id="new_password" name="new_password" value="<?php echo e($inputValue); ?>" type="text" minlength="8" maxlength="16">
      </div>
      <div class="is-info__row">
        <p><b>Владелец актива</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->gosorg->name);
        ?>
        <input id="new_password" name="new_password" value="<?php echo e($inputValue); ?>" type="text" minlength="8" maxlength="16">
      </div>
      <div class="is-info__row">
        <p><b>Модель процессора</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->serverCPUModel);
        ?>
        <input id="new_password" name="new_password" value="<?php echo e($inputValue); ?>" type="text" minlength="8" maxlength="16">
      </div>
      <div class="is-info__row">
        <p><b>Количество процессоров</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->serverCPUAmount);
        ?>
        <input id="new_password" name="new_password" value="<?php echo e($inputValue); ?>" type="text" minlength="8" maxlength="16">
      </div>
      <div class="is-info__row">
        <p><b>Тип используемых модулей ОЗУ</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->serverRAMType);
        ?>
        <input id="new_password" name="new_password" value="<?php echo e($inputValue); ?>" type="text" minlength="8" maxlength="16">
      </div>
      <div class="is-info__row">
        <p><b>Объем ОЗУ</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->serverRAMAmount);
        ?>
        <input id="new_password" name="new_password" value="<?php echo e($inputValue); ?>" type="text" minlength="8" maxlength="16">
      </div>
      <div class="is-info__row">
        <p><b>Тип используемых дисков</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->ngrs);
        ?>
        <input id="new_password" name="new_password" value="<?php echo e($is->BusinessObjectType); ?>" type="text" minlength="8" maxlength="16">
      </div>
      <div class="is-info__row">
        <p><b>Объем хранилища</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->ngrs);
        ?>
        <input id="new_password" name="new_password" value="<?php echo e($is->serverStorageAmount); ?>" type="text" minlength="8" maxlength="16">
      </div>
      <div class="is-info__row">
        <p><b>
          
          Срок гарантийного обслуживания, год</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->ngrs);
        ?>
        <input id="new_password" name="new_password" value="<?php echo e($is->startVersionDateTime); ?>" type="text" minlength="8" maxlength="16">
      </div>
      <div class="is-info__row">
        <p><b>Договор на приобретение </b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->ngrs);
        ?>
        <input id="new_password" name="new_password" value="<?php echo e($is->BusinessObjectType); ?>" type="text" minlength="8" maxlength="16">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/equipment/info.blade.php ENDPATH**/ ?>