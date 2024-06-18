





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
      <a href="<?php echo e(route('budget.index')); ?>">Бюджетные процессы</a>
      /
      <span><?php echo e(trans('app.m_budget')); ?></span>
    </div>

    <h1 class="page-title">Бюджетные процессы</h1>
    
    <form class="filter filter_budget form" action="<?php echo e(route('budget.index')); ?>" method="GET">
      <div class="filter__search form__field">
          <input type="search" name="budget-search" placeholder="<?php echo e(trans('app.search')); ?>">
      </div>
      <div class="filter__year form__field">
          <select name="search-year">
              <option value="" selected>Год</option>
              <option value="2024">2024</option>
              <option value="2023">2023</option>
              <option value="2022">2022</option>
              <option value="2021">2021</option>
              <option value="2020">2020</option>
          </select>
      </div>
      <div class="filter__type form__field">
          <select name="search-type">
              <option value="" selected>Тип процесса</option>
              <option value="applying">Начало нового бюджетного цикла</option>
              <option value="adjustment">Корректировка</option>
              <option value="actualisation">Уточнение</option>
          </select>
      </div>
      <button style="height: 60px" type="submit">Применить</button>
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
        <?php $__currentLoopData = $budgetProcesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $budgetProcess): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td class="table__name">
            <a href="<?php echo e(route('budget.show', $budgetProcess->_id)); ?>"><?php echo e($budgetProcess->name); ?></a>
        </td>        
          <td class="table__year"><?php echo e($budgetProcess->year); ?></td>
          <td class="table__status"><span class="status <?php echo e($budgetProcess->isActual ? 'status_yes' : 'status_no'); ?>"><?php echo e($budgetProcess->isActual ? 'Да' : 'Нет'); ?></span></td>
          
          <td class="table__type">
            <?php
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
            ?>
        </td>
        
          <td class="table__date"><?php echo e($budgetProcess->createDateTime); ?></td>
          <td class="table__date"><?php echo e($budgetProcess->finishDateTime); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    
    
    <br><br>
      Всего: <?php echo e($budgetProcesses->total()); ?>

      <?php echo e($budgetProcesses->links('layouts.pagination.softdeco')); ?>

  
  
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/budget/index.blade.php ENDPATH**/ ?>