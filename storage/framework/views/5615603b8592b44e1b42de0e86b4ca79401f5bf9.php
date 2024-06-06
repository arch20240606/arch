

<?php $__env->startSection('title'); ?><?php echo e(trans('app.expert')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>

<?php
if (app()->getLocale() == "ru") {
  $names = 'name_ru';
} elseif (app()->getLocale() == "en") {
  $names = 'name_en';
} else {
  $names = 'name_kz';
}

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



    <div class="export dropdown">
      <div class="export__title dropdown__title">
          Экспорт списка запросов на экспертизу
          <svg><use xlink:href="/assets/images/sprite.svg#chevron-down"></use></svg>
      </div>
      <div class="export__content dropdown__content">
          <form class="export__form form">
              <label class="form__label" for="export-from">Дата заключения:</label>
              <div class="export__form-wrapper">
                  <div class="form__field form__field_date">
                      <input type="date" name="export-from" id="export-from" placeholder="С какого числа">
                  </div>
                  <div class="form__field form__field_date">
                      <input type="date" name="export-to" id="export-to" placeholder="По какое число">
                  </div>
                  <button class="export__submit btn" type="submit">Экспортировать</button>
              </div>
          </form>
      </div>
    </div>

    <div class="filter-title">Запросы на экспертизу: Список запросов</div>


    <?php if(Auth::user()->government_id == 108): ?>

        <form class="filter filter_expertise form">
        <div class="filter__search form__field">
            <input type="search" name="expertise-search" placeholder="Наименование">
        </div>
        <div class="filter__search filter__version form__field">
            <input type="search" name="expertise-version" placeholder="Версия">
        </div>
        </form>

        <table class="table table_expertise">
        <thead>
        <tr>
          <th>IDE</th>
          <th>Тип</th>
          <th>Наименование</th>
          <th>Владелец</th>
          <th>Статус ГО</th>
          <th>Дата взятия в работу в УО</th>
          <th>Статус СИ</th>
          <th>Статус ГТС</th>
          <th>Статус МЦРИАП</th>
          <th>Заключение</th>
          <th>Выдал</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td class="table__status"><?php echo e($expertise->id); ?></td>
          <td class="table__type"><?php echo e($type_project_name); ?></td>
          <td class="table__name"><a href="#"><?php echo e($expertise->it_project->$names); ?></a></td>
          <td class="table__author"><?php echo e($expertise->users->surname); ?> <?php echo e($expertise->users->name); ?> <?php echo e($expertise->users->middle); ?></td>
          <td class="table__status">
            <?php if($expertise->accept_go == 1): ?>
              <span class="status status_yes">Да</span>
            <?php else: ?>
              <span class="status status_no">Нет</span>
            <?php endif; ?>
          </td>
          <td class="table__date"><?php echo e(date('d.m.Y H:i:s', strtotime( $expertise->created_at ))); ?></td>
          <td class="table__status"><span class="status status_yes">Да</span></td>
          <td class="table__status"><span class="status status_yes">Да</span></td>
          <td class="table__status"><span class="status status_yes">Да</span></td>
          <td class="table__version">
            <?php if($expertise->accept_go == 1): ?>
              <a style="cursor: pointer;" onclick="exportPassport(<?php echo e($expertise->id); ?>)">Скачать</a>
            <?php else: ?>
              Отсутствует
            <?php endif; ?>
          </td>
          <td class="table__version"><?php echo e($expertise->ecp_name_mcriap); ?></td>
        </tr>

        

        </tbody>
    </table>

    <?php else: ?>

    <div class="info-box-error" style="margin-bottom: 5px;">Данные отсутствуют</div>

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
  function exportPassport(id) {

    var token = $("input[name='_token']").val();

  
    // Vanilla JavaScript
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo e(route('expertise.signing.export')); ?>', true);
    xhr.responseType = 'arraybuffer';

    xhr.onload = function() {
        if (this.status === 200) {
            var blob = new Blob([this.response], { type: 'application/pdf' });
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'ExpertiseResult.pdf';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    };

    let formData = new FormData();
    formData.append('_token', token);
    formData.append('_id', id);

    xhr.send(formData);

  }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/expertise/index.blade.php ENDPATH**/ ?>