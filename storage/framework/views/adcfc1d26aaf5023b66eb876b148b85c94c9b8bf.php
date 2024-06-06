

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
      <span>Информационный ресурс</span>
    </div>

    

    
  
   


  
  
  
  
  
    
  


<hr>
<h4>Просмотр информационных ресурсов</h4>

<div style="display: block;"> 
    <div class="is-info__body">
      <form class="form" method="POST" action="asdas">
        <div class="is-info__left is-info__col" style="width:1300px ">
          <div class="is-info__right-header" style="background-color: rgb(9, 71, 242)">Детальная информация</div>
          <div class="is-info__row" style="margin-top: 13px;">
            <p><b>Название</b></p>
            <input value="<?php echo e($is->name); ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Описание</b></p>
            <input value="<?php echo isset($is->IADefinition) ? $is->IADefinition : 'Не указано'; ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Тип информационного ресурса</b></p>
            <input value="<?php echo isset($is->IAType) ? $is->IAType : 'Не указано'; ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Тип хранения</b></p>
            <input value="<?php echo isset($is->dataTypeId) ? $is->dataTypeId : 'Отсутствует'; ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Охват</b></p>
            <input value="<?php echo isset($is->coverageId) ? $is->coverageId : 'Не указано'; ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Сложность</b></p>
            <input value="<?php echo isset($is->complexityId) ? $is->complexityId : 'Не указано'; ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Период обновления данных</b></p>
            <input value="<?php echo isset($is->dataUpdatePeriodId) ? $is->dataUpdatePeriodId : 'Не указано'; ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Полнота хранимых данных</b></p>
            <input value="<?php echo isset($is->dataFullnessId) ? $is->dataFullnessId : 'Не указано'; ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Способ наполнения</b></p>
            <input value="<?php echo isset($is->dataFillingWayId) ? $is->dataFillingWayId : 'Не указано'; ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Управляемость</b></p>
            <input value="<?php echo isset($is->controllabilityId) ? $is->controllabilityId : 'Не указано'; ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Степень доступа</b></p>
            <input value="<?php echo isset($is->accessGradeId) ? $is->accessGradeId : 'Не указано'; ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Тип хранимых данных</b></p>
            <input value="<?php echo isset($is->dataTypeId) ? $is->dataTypeId : 'Не указано'; ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Значимость</b></p>
            <input value="<?php echo isset($is->significanceId) ? $is->significanceId : 'Не указано'; ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Уникальность  </b></p>
            <input value="<?php echo isset($is->uniquenessId) ? $is->uniquenessId : 'Не указано'; ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Начало актуальности</b></p>
            <input value="<?php echo isset($is->startVersionDateTime) ? $is->startVersionDateTime : 'Не указано'; ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Конец актуальности</b></p>
            <input value="<?php echo isset($is->endVersionDateTime) ? $is->endVersionDateTime : 'Не указано'; ?>" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Версия</b></p>
            <input value="<?php echo isset($is->version) ? $is->version : 'Не указано'; ?>" type="text" disabled>
          </div>
        </div>
      </form>
    </div>

      <div class="is-info__body">
        <form class="form" method="POST" action="asdas">
          <div class="is-info__left is-info__col" style="width:1300px ">
            <div class="is-info__right-header" style="background-color: rgb(9, 71, 242)">Место хранения </div>
            <table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; border: 1px solid #ddd;">
              <tr>
                <th style="color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Тип</th>
                <th style="color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Информационные системы/Организации</th>
                <th style="color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Время начала взаимоотношений</th>
                <th style="color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Время окончания взаимоотношений</th>
              </tr>
              <tr>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;">Пусто пока</td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;">Пусто пока</td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;">Пусто пока</td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;">Пусто пока</td>
              </tr>
          </table>
          </div>
        </form>
      </div>  

      <div class="is-info__body">
        <form class="form" method="POST" action="asdas">
          <div class="is-info__left is-info__col" style="width:1300px ">
            <div class="is-info__right-header" style="background-color: rgb(9, 71, 242)">Нормативно-правовые акты</div>
            <div class="is-info__row">
              <p><b>Название</b></p>
              <?php
              // Удаление квадратных скобок и кавычек из строки
              $inputValue = str_replace(['[', ']', '"'], '', $is->ngrs);
              ?>
              <a href="https://adilet.zan.kz/rus/docs/<?php echo e($inputValue); ?>">adilet.zan.kz/rus/docs/<?php echo e($inputValue); ?></a>
            </div>
          </div>
        </form>
      </div>


      <div class="is-info__body">
        <form class="form" method="POST" action="asdas">
          <div class="is-info__left is-info__col" style="width:1300px ">
            <div class="is-info__right-header" style="background-color: rgb(9, 71, 242)">Объекты данных</div>
            <table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; border: 1px solid #ddd;">
              <tr>
                <th style="color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Наименование</th>
                <th style="color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Описание</th>
                <th style="color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Синонимы</th>
                <th style="color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Вид</th>
                <th style="color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Разновидности</th>
                <th style="color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Документы</th>
              </tr>
              <tr>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;">Пусто пока</td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;">Пусто пока</td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;">Пусто пока</td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;">Пусто пока</td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;">Пусто пока</td>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;">Пусто пока</td>
              </tr>
          </table>
          </div>
        </form>
      </div>  

      <div class="is-info__body">
        <form class="form" method="POST" action="asdas">
          <div class="is-info__left is-info__col" style="width:1300px ">
            <div class="is-info__right-header" style="background-color: rgb(9, 71, 242)">Документы</div>
            <table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; border: 1px solid #ddd;">
              <tr>
                <th style="color: #333; font-weight: bold; padding: 12px; text-align: left; border: 1px solid #ddd;">Документы</th>
              </tr>
              <tr>
                <td style="padding: 8px; text-align: left; border: 1px solid #ddd;">Пусто пока</td>
              </tr>
          </table>
          </div>
        </form>
      </div>  

    </div>
</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('other_divs'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/informationResources/info.blade.php ENDPATH**/ ?>