

<?php $__env->startSection('title'); ?><?php echo e(trans('app.m_budget')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>


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
      <a href="<?php echo e(route('budget')); ?>">Бюджетные процессы</a>
      /
      <span><?php echo e(trans('app.m_budget')); ?></span>
    </div>

    <h1 class="page-title">Бюджетные процессы</h1>

    <form class="filter filter_budget form">
      <div class="filter__search form__field">
        <input type="search" name="budget-search" placeholder="<?php echo e(trans('app.search')); ?>">
      </div>
      <div class="filter__year form__field">
        <select name="search-year">
          <option value="" selected>Год</option>
          <option value="2023">2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
        </select>
      </div>
      <div class="filter__type form__field">
        <select name="search-year">
          <option value="" selected>Тип процесса</option>
          <option value="Начало нового бюджетного цикла">Начало нового бюджетного цикла</option>
          <option value="Корректировка">Корректировка</option>
          <option value="Уточнение">Уточнение</option>
        </select>
      </div>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th>Наименование</th>
          <th>Год</th>
          <th>Статус</th>
          <th>Тип процесса</th>
          <th>Дата создания</th>
          <th>Дата закрытия</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="table__name">
            <a href="#">Бюджетный процесс на подачу БЗ на плановый период на 2024-2026 годы</a>
          </td>
          <td class="table__year">2023</td>
          <td class="table__status"><span class="status status_yes">Да</span></td>
          <td class="table__type">Начало нового бюджетного цикла</td>
          <td class="table__date">20.02.2023 12:00:15</td>
          <td class="table__date">20.02.2023 12:00:15</td>
        </tr>
        <tr>
          <td class="table__name">
            <a href="#">Бюджетный процесс на корректировку на 2023 год</a>
          </td>
          <td class="table__year">2023</td>
          <td class="table__status"><span class="status status_yes">Да</span></td>
          <td class="table__type">Корректировка</td>
          <td class="table__date">20.02.2023 12:00:15</td>
          <td class="table__date">20.02.2023 12:00:15</td>
        </tr>
        <tr>
          <td class="table__name">
            <a href="#">Бюджетный процесс на корректировку на 2022 год (ЦГО)</a>
          </td>
          <td class="table__year">2023</td>
          <td class="table__status"><span class="status status_no">Нет</span></td>
          <td class="table__type">Уточнение</td>
          <td class="table__date">20.02.2023 12:00:15</td>
          <td class="table__date">20.02.2023 12:00:15</td>
        </tr>
        <tr>
          <td class="table__name">
            <a href="#">Бюджетный процесс на подачу БЗ на плановый период на 2024-2026 годы</a>
          </td>
          <td class="table__year">2023</td>
          <td class="table__status"><span class="status status_wait">В процессе</span></td>
          <td class="table__type">Начало нового бюджетного цикла</td>
          <td class="table__date">20.02.2023 12:00:15</td>
          <td class="table__date">20.02.2023 12:00:15</td>
        </tr>
        <tr>
          <td class="table__name">
            <a href="#">Бюджетный процесс на корректировку на 2023 год</a>
          </td>
          <td class="table__year">2023</td>
          <td class="table__status"><span class="status status_edit">На редактировании</span></td>
          <td class="table__type">Корректировка</td>
          <td class="table__date">20.02.2023 12:00:15</td>
          <td class="table__date">20.02.2023 12:00:15</td>
        </tr>
        <tr>
          <td class="table__name">
            <a href="#">Бюджетный процесс на корректировку на 2022 год (ЦГО)</a>
          </td>
          <td class="table__year">2023</td>
          <td class="table__status"><span class="status status_no">Нет</span></td>
          <td class="table__type">Уточнение</td>
          <td class="table__date">20.02.2023 12:00:15</td>
          <td class="table__date">20.02.2023 12:00:15</td>
        </tr>
        <tr>
          <td class="table__name">
            <a href="#">Бюджетный процесс на подачу БЗ на плановый период на 2024-2026 годы</a>
          </td>
          <td class="table__year">2023</td>
          <td class="table__status"><span class="status status_yes">Да</span></td>
          <td class="table__type">Начало нового бюджетного цикла</td>
          <td class="table__date">20.02.2023 12:00:15</td>
          <td class="table__date">20.02.2023 12:00:15</td>
        </tr>
        <tr>
          <td class="table__name">
            <a href="#">Бюджетный процесс на корректировку на 2023 год</a>
          </td>
          <td class="table__year">2023</td>
          <td class="table__status"><span class="status status_yes">Да</span></td>
          <td class="table__type">Корректировка</td>
          <td class="table__date">20.02.2023 12:00:15</td>
          <td class="table__date">20.02.2023 12:00:15</td>
        </tr>
        <tr>
          <td class="table__name">
            <a href="#">Бюджетный процесс на корректировку на 2022 год (ЦГО)</a>
          </td>
          <td class="table__year">2023</td>
          <td class="table__status"><span class="status status_no">Нет</span></td>
          <td class="table__type">Уточнение</td>
          <td class="table__date">20.02.2023 12:00:15</td>
          <td class="table__date">20.02.2023 12:00:15</td>
        </tr>
      </tbody>
    </table>
    <div class="pagination">
      <!--    <a class="pagination__item" href="#">←←</a>-->
      <!--    <a class="pagination__item" href="#">←</a>-->
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
  <?php echo $__env->make('layouts.login_popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('layouts.search_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/govarch.kz/docs/resources/views/budget/index.blade.php ENDPATH**/ ?>