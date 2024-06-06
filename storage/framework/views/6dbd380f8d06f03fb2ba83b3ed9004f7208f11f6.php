

<?php $__env->startSection('title'); ?>Реестр обязательных требований<?php $__env->stopSection(); ?>


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
      / Реестр обязательных требований

    </div>

    <h1 class="page-title">Реестр обязательных требований</h1>

    <?php echo $__env->make('reestr.index_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    
    <div class="export dropdown">
      <div class="export__title dropdown__title">
          Экспорт списка реестра
          <svg><use xlink:href="/assets/images/sprite.svg#chevron-down"></use></svg>
      </div>
      <div class="export__content dropdown__content">
          <form class="export__form form">
              <label class="form__label" for="export-from">Дата включения в реестр:</label>
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

    <div class="filter-title">Фильтры поиска по реестру</div>

    <form class="filter filter_expertise form">
        <div class="filter__search form__field">
            <input type="search" name="expertise-search" placeholder="Регуляторный акт">
        </div>
        <div class="filter__search filter__version form__field">
            <input type="search" name="expertise-version" placeholder="ОКЭД">
        </div>
        <div class="filter__search form__field">
          <input type="search" name="expertise-version" placeholder="Государственный орган">
        </div>
        <div class="filter__search filter__version form__field">
          <input type="search" name="expertise-version" placeholder="Статус">
      </div>
    </form>

    <table class="table table_expertise">
        <thead>
        <tr>
            <th>Регуляторный акт</th>
            <th>Сфера предпринимательства (ОКЭД)</th>
            <th>Регулирующий государственный орган</th>
            <th>Срок проведения анализа</th>
            <th>Ccылка на единую систему правовой информации</th>
            <th>Ссылка на досье регуляторных актов</th>
            <th>Статус регуляторного акта</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="table__name"><a href="#">Об Образовании. Закон Республики Казахстан от 27 июля 2007 года №319-III</a></td>
            <td class="table__status">85421</td>
            <td class="table__status">МНВО РК</td>
            <td class="table__status">01.05.2025</td>
            <td class="table__status"><a href="#">Ссылка на ЕСПИ</a></td>
            <td class="table__status"><a href="#">Досье</a></td>
            <td class="table__status"><span class="status status_yes">Действующий</span></td>
            <td >
              <div style="display: flex; position: center;">

                <a href="#" class="feather" title="Редактировать">
                  <svg>
                    <use href="/assets/images/feather-sprite.svg#edit"/>
                  </svg>
                </a>

                &nbsp;&nbsp;&nbsp;
                 
                <a href="#" class="feather" title="История изменений">
                  <svg>
                    <use href="/assets/images/feather-sprite.svg#file-text"/>
                  </svg>
                </a>

                &nbsp;&nbsp;&nbsp;

                <a href="#" class="feather" title="Удалить">
                  <svg style="stroke: #b1073a">
                    <use href="/assets/images/feather-sprite.svg#x-circle"/>
                  </svg>
                </a>
  
              </div>

            </td>
        </tr>


        </tbody>
    </table>

    <!--
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
    -->





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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/govarch.kz/docs/resources/views/reestr/index.blade.php ENDPATH**/ ?>