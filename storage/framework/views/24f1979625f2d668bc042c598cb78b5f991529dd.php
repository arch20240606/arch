

<?php $__env->startSection('title'); ?>Реестр бизнес-процессов<?php $__env->stopSection(); ?>


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
      / Реестр бизнес-процессов

    </div>

    <h1 class="page-title">Реестр бизнес-процессов</h1>

    <?php echo $__env->make('businessprocess.index_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    
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
          <input type="search" name="expertise-version" placeholder="Государственный орган">
      </div>
      <div class="filter__search filter__version form__field">
          <input type="search" name="expertise-version" placeholder="Направление">
      </div>
      <div class="filter__search form__field">
        <input type="search" name="expertise-version" placeholder="Группа функций">
      </div>
      <div class="filter__search filter__version form__field">
        <input type="search" name="expertise-version" placeholder="Бизнес-процесс">
      </div>
    </form>

    <table class="table table_expertise">
        <thead>
        <tr>
            <th>Государственный орган</th>
            <th>Стратегическое направление</th>
            <th>Группа функций</th>
            <th>Функция</th>
            <th>Бизнес-процесс</th>
            <th>AS IS</th>
            <th>TO BE</th>
            <th>ПЛАН</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>

          <tr>
            <td class="table__status">МНВО РК</td>
            <td class="table__name">Подготовка конкурентноспособных кадров для экономики</td>
            <td class="table__status">Регулирование</td>
            <td class="table__name">Разработка и утверждение правил размещения государственного заказа на обеспечение студентов</td>
            <td class="table__status"><a href="#">Формирование государственного заказа</a></td>
            <td class="table__status">
              <a class="feather-green">
                <svg>
                  <use href="/assets/images/feather-sprite.svg#check-circle"/>
                </svg>
              </a>
            </td>
            <td class="table__status">
              <a class="feather-green">
                <svg>
                  <use href="/assets/images/feather-sprite.svg#check-circle"/>
                </svg>
              </a>
            </td>
            <td class="table__status">
              <a class="feather-green">
                <svg>
                  <use href="/assets/images/feather-sprite.svg#check-circle"/>
                </svg>
              </a>
            </td>
            <td class="table__status">
              <a href="" class="feather-grey" title="Добавить бизнес-процесс">
                <svg>
                  <use href="/assets/images/feather-sprite.svg#plus-circle"/>
                </svg>
              </a>
            </td>
          </tr>


          <tr>
            <td class="table__status">МНВО РК</td>
            <td class="table__name">Подготовка конкурентноспособных кадров для экономики</td>
            <td class="table__status">Регулирование</td>
            <td class="table__name">Разработка и утверждение правил размещения государственного заказа на обеспечение студентов</td>
            <td class="table__status"><a href="#">Распределение государственных грантов</a></td>
            <td class="table__status">
              <a class="feather-green">
                <svg>
                  <use href="/assets/images/feather-sprite.svg#check-circle"/>
                </svg>
              </a>
            </td>
            <td class="table__status"> </td>
            <td class="table__status"> </td>
            <td class="table__status">
              <a href="" class="feather-grey" title="Добавить бизнес-процесс">
                <svg>
                  <use href="/assets/images/feather-sprite.svg#plus-circle"/>
                </svg>
              </a>
            </td>
          </tr>

          <tr>
            <td class="table__status">МНВО РК</td>
            <td class="table__name">Подготовка конкурентноспособных кадров для экономики</td>
            <td class="table__status">Регулирование</td>
            <td class="table__name">Разработка и утверждение правил размещения государственного заказа на обеспечение студентов</td>
            <td class="table__status"><a href="#">Распределение мест в общежитии</a></td>
            <td class="table__status">
              <a class="feather-yellow">
                <svg>
                  <use href="/assets/images/feather-sprite.svg#check-circle"/>
                </svg>
              </a>
            </td>
            <td class="table__status"> </td>
            <td class="table__status"> </td>
            <td class="table__status">
              <a href="" class="feather-grey" title="Добавить бизнес-процесс">
                <svg>
                  <use href="/assets/images/feather-sprite.svg#plus-circle"/>
                </svg>
              </a>
            </td>
          </tr>

          <tr>
            <td class="table__status">МНВО РК</td>
            <td class="table__name">Подготовка конкурентноспособных кадров для экономики</td>
            <td class="table__status">Учет</td>
            <td class="table__name">формирование реестров признанных аккредитационных органов, аккредитованных организаций высшего и (или)</td>
            <td class="table__status"> </td>
            <td class="table__status"> </td>
            <td class="table__status"> </td>
            <td class="table__status"> </td>
            <td class="table__status">
              <a href="" class="feather-grey" title="Добавить бизнес-процесс">
                <svg>
                  <use href="/assets/images/feather-sprite.svg#plus-circle"/>
                </svg>
              </a>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/govarch.kz/docs/resources/views/businessprocess/index.blade.php ENDPATH**/ ?>