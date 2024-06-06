

<?php $__env->startSection('title'); ?><?php echo e(trans('app.expert')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>

<?php
if ( app()->getLocale() == "ru" ) {
  $name_go = 'name_ru';
} elseif ( app()->getLocale() == "en" ) {
  $name_go = 'name_en';
} else {
  $name_go = 'name_kz';
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
      <a href="<?php echo e(route('expertize')); ?>"><?php echo e(trans('app.m_expert')); ?></a>
      <!--
      /
      <span><?php echo e(trans('app.d_catalog')); ?></span>
      -->
    </div>

    <h1 class="page-title"><?php echo e(trans('app.m_expert')); ?></h1>










   
    <nav class="tabs">
      <a class="tabs__link tabs__link_active" href="#">
          <span class="tabs__num">10</span>
          В работе
      </a>
      <a class="tabs__link" href="#">
          <span class="tabs__num" style="background: #0178BC;">2</span>
          На согласовании
      </a>
      <a class="tabs__link" href="#">
          <span class="tabs__num" style="background: #39C07F;">2</span>
          На подписи
      </a>
      <a class="tabs__link" href="#">
          <span class="tabs__num" style="background: #727FA2;">1</span>
          Исходящие
      </a>
      <a class="tabs__link" href="#">
          <span class="tabs__num" style="background: #EEC609; ">2</span>
          Архив
      </a>
      <a class="tabs__button btn btn_icon" href="#">
          <svg><use xlink:href="/assets/images/sprite.svg#plus"></use></svg>
          Создать
      </a>
    </nav>

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

    <div class="filter-title">Запросы на экспертизу: В работе</div>

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
            <th>Тип</th>
            <th>Наименование</th>
            <th>Версия</th>
            <th>Владелец</th>
            <th>Статус</th>
            <th>Дата взятия в работу в УО</th>
            <th>Статус СИ</th>
            <th>Статус ГТС</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="table__type">Техническое задание</td>
            <td class="table__name">
                <a href="#">Техническое задание Техническое задание "ИС «Ситуационно-аналитического центра топливо-энергетического комплекса Республики Казахстан»"</a>
            </td>
            <td class="table__version">1.1.1</td>
            <td class="table__author">Фамилия Имя Отчество</td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
            <td class="table__date">20.02.2023 12:00:15</td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
        </tr>

        <tr>
            <td class="table__type">Техническое задание</td>
            <td class="table__name">
                <a href="#">Техническое задание "Развитие Информационно-аналитической системы Ситуационного центра акимата Кызылординской области"</a>
            </td>
            <td class="table__version">1.1.3</td>
            <td class="table__author">Фамилия Имя Отчество</td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
            <td class="table__date">20.02.2023 12:00:15</td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
        </tr>

        <tr>
            <td class="table__type">Техническое задание</td>
            <td class="table__name">
                <a href="#">Техническое задание "Информационная система «Payda»"</a>
            </td>
            <td class="table__version">1.1.2</td>
            <td class="table__author">Фамилия Имя Отчество</td>
            <td class="table__status"><span class="status status_no">Нет</span></td>
            <td class="table__date">20.02.2023 12:00:15</td>
            <td class="table__status"><span class="status status_no">Нет</span></td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
        </tr>

        <tr>
            <td class="table__type">Техническое задание</td>
            <td class="table__name">
                <a href="#">Техническое задание "«Система информационного обеспечения мониторинга земельных ресурсов JerInSpectr»"</a>
            </td>
            <td class="table__version">1.1.1</td>
            <td class="table__author">Фамилия Имя Отчество</td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
            <td class="table__date">20.02.2023 12:00:15</td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
        </tr>

        <tr>
            <td class="table__type">Техническое задание</td>
            <td class="table__name">
                <a href="#">Техническое задание "Единый интеграционный портал"</a>
            </td>
            <td class="table__version">1.1.3</td>
            <td class="table__author">Фамилия Имя Отчество</td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
            <td class="table__date">20.02.2023 12:00:15</td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
        </tr>

        <tr>
            <td class="table__type">Техническое задание</td>
            <td class="table__name">
                <a href="#">Техническое задание "Программный продукт «e-zhetysu»"</a>
            </td>
            <td class="table__version">1.1.2</td>
            <td class="table__author">Фамилия Имя Отчество</td>
            <td class="table__status"><span class="status status_no">Нет</span></td>
            <td class="table__date">20.02.2023 12:00:15</td>
            <td class="table__status"><span class="status status_no">Нет</span></td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
        </tr>

        <tr>
            <td class="table__type">Техническое задание</td>
            <td class="table__name">
                <a href="#">Техническое задание Техническое задание на развитие ИС "Аналитический центр"</a>
            </td>
            <td class="table__version">1.1.1</td>
            <td class="table__author">Фамилия Имя Отчество</td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
            <td class="table__date">20.02.2023 12:00:15</td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
        </tr>

        <tr>
            <td class="table__type">Техническое задание</td>
            <td class="table__name">
                <a href="#">Техническое задание Техническое задание на развитие ИС "Единый реестр административных производств"</a>
            </td>
            <td class="table__version">1.1.3</td>
            <td class="table__author">Фамилия Имя Отчество</td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
            <td class="table__date">20.02.2023 12:00:15</td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
        </tr>

        <tr>
            <td class="table__type">Техническое задание</td>
            <td class="table__name">
                <a href="#">Техническое задание Информационная система "Ситуционный центр"</a>
            </td>
            <td class="table__version">1.1.2</td>
            <td class="table__author">Фамилия Имя Отчество</td>
            <td class="table__status"><span class="status status_no">Нет</span></td>
            <td class="table__date">20.02.2023 12:00:15</td>
            <td class="table__status"><span class="status status_no">Нет</span></td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
        </tr>

        <tr>
            <td class="table__type">Техническое задание</td>
            <td class="table__name">
                <a href="#">Техническое задание "Развитие информационной системы и электронного информационного ресурса Информационный портал «Электронная биржа труда» (ИП "ЭБТ") Министерства труда и социальной защиты населения Республики Казахстан"</a>
            </td>
            <td class="table__version">1.1.2</td>
            <td class="table__author">Фамилия Имя Отчество</td>
            <td class="table__status"><span class="status status_no">Нет</span></td>
            <td class="table__date">20.02.2023 12:00:15</td>
            <td class="table__status"><span class="status status_no">Нет</span></td>
            <td class="table__status"><span class="status status_yes">Да</span></td>
        </tr>

        </tbody>
    </table>

    <div class="pagination">
      <a class="pagination__item" href="#">1</a>
      <a class="pagination__item" href="#">2</a>
      <a class="pagination__item" href="#">3</a>
      <a class="pagination__item" href="#">4</a>
      <a class="pagination__item" href="#">5</a>
      <a class="pagination__item" href="#">25</a>
      <a class="pagination__item" href="#">→</a>
      <a class="pagination__item" href="#">→→</a>
    </div>









    






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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/govarch.kz/docs/resources/views/expertize/index.blade.php ENDPATH**/ ?>