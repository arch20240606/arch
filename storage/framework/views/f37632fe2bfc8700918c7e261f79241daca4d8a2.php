

<?php $__env->startSection('title'); ?><?php echo e(trans('app.m_otchet')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>

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
      <a href="<?php echo e(route('reports.index')); ?>"><?php echo e(trans('app.m_otchet')); ?></a>
      <!--
      /
      <span><?php echo e(trans('app.d_catalog')); ?></span>
      -->
    </div>

    <h1 class="page-title"><?php echo e(trans('app.m_otchet')); ?></h1>







    <form class="filter form" method="GET" action="<?php echo e(route('reports.search')); ?>" style="justify-content: normal; margin: 0; margin-top: 25px;">

      <div class="form__field" style="width: 100%">
        <input type="text" name="q" style="width: 100%" placeholder="Поиск" <?php if(isset($search_text)): ?> value="<?php echo e($search_text); ?>" <?php endif; ?>>
      </div>
      <div class="form__field  buttons-wrapper">
        <button class="tabs__button btn" style="font-size: 14px; background: #727FA2; width: 120px;" type="submit">Поиск</button>
      </div>

    </form>




    <form class="filter form" method="GET" action="<?php echo e(route('reports.search')); ?>" style="justify-content: end; margin: 0; margin-bottom: 25px;">

      <div class="filter__type form__field">
        <select name="report_type" required>
          <option value="1" selected>Информационнные системы</option>
        </select>
      </div>
    
      <div class="form__field">
        <select name="report_go">
          <option value="" selected>Выберите государственный орган</option>
          <?php $__currentLoopData = $govs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if( isset($_GET['report_go']) ): ?>
              <option value="<?php echo e($gov->id); ?>" <?php if( $gov->id == $_GET['report_go'] ): ?> selected <?php endif; ?>><?php echo e($gov->$names); ?></option>
            <?php else: ?>
              <option value="<?php echo e($gov->id); ?>"><?php echo e($gov->$names); ?></option>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>

      <div class="filter__status form__field" style="min-width: 170px;">
        <select name="report_status">
          <option value="1" selected>Действующий</option>
        </select>
      </div>

      <div class="form__field buttons-wrapper">
        <button class="tabs__button btn" name="show_report" id="show_report" type="submit" style="width: 120px; font-size: 14px;">Показать</button>
      </div>

      <div class="form__field buttons-wrapper">
        <button class="tabs__button btn" name="export_report" id="export_report" type="submit" style="width: 120px; font-size: 14px; background: #00317B;">Экспорт</button>
      </div>

    </form>




    <table class="table table_requests">
      <thead>
        <tr>
          <th>Наименование</th>
          <th style="text-align: left;">Государственный орган</th>
          <th>Аббревиатура</th>
          <th>Статус</th>
          <th>ЦГО/МИО</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $ios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $io): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td class="table__name"><a href="#"><?php echo e($io->$names); ?></a></td>
            <td class="table__name"><?php echo e($io->government->$names); ?></td>
            <td class="table__status"><?php echo e($io->abbreviation); ?></td>
            <td class="table__status"><span class="status status_yes">Действующий</span></td>
            <td class="table__status"><?php echo e($io->cgo_mio); ?></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      </tbody>
    </table>

    
    <br>
    <div style="font-size: 14px;"><b>Всего:</b> <?php echo e($ios->total()); ?></div>
    <?php echo e($ios->withQueryString()->links('layouts.pagination.softdeco')); ?>

    












  </div>

</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('other_divs'); ?>

<?php echo $__env->make('layouts.ask_question', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div id="chat" class="chat"></div>
<?php echo $__env->make('layouts.search_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/govarch.kz/docs/resources/views/reports/index.blade.php ENDPATH**/ ?>