

<?php $__env->startSection('title'); ?><?php echo e(trans('app.expert')); ?> - <?php echo e(trans('app.site_title')); ?><?php $__env->stopSection(); ?>

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
      <a href="<?php echo e(route('expertise.index')); ?>"><?php echo e(trans('app.m_expert')); ?></a>
      /
      <span>Создание запроса на экспертизу</span>
    </div>

    <h1 class="page-title">Создание запроса на экспертизу</h1>


    <?php echo $__env->make('expertise.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(!empty($successMsg)): ?>
    <div class="success-info"><?php echo $successMsg; ?></div>
    <?php endif; ?>

    <?php if(!empty($errorMsg)): ?>
    <div class="info-box-error"><b><?php echo e(trans('app.reg_error')); ?>:</b> <?php echo $errorMsg; ?></div>
    <?php endif; ?>





    <div class="is-info">

      <form class="form" enctype="multipart/form-data" method="POST" action="<?php echo e(route('expertise.store')); ?>">
        <?php echo csrf_field(); ?>

        <div class="is-info__header">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title">Формирование наименования запроса <span style="font-weight: normal;">(автоматически из выбраных результатов)</span></h2>
        </div>

        <div style="padding: 16px; background: #fafafa;">
          <span style="color: #0075ff;">Наименование:</span> <span id="full_project_type" style="color: #00317B;"></span> <span id="full_it_project" style="font-weight: bold;"></span>
        </div>


        <table class="table">
          <thead>
            <tr>
              <th style="width: 20%; border: 0px;"></th>
              <th style="width: 80%; border: 0px;"></th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td class="table__name">Тип проекта</td>
              <td>
                <div>
                  <select id="project_type" name="project_type" class="form__field" required>
                    <option value="">Выберите тип проекта</option>
                    <!--
                    <option value="1">Запрос государственного органа на автоматизацию деятельности государственного органа в уполномоченный орган и сервисному интегратору (СМИ)</option>
                    <option value="2">Инвестиционное предложение</option>
                    <option value="3">Технико-экономическое обоснование</option>
                    -->
                    <option value="4">Техническое задание</option>
                  </select>
                </div>
              </td>
            </tr>

            <tr>
              <td class="table__name">IT-проект</td>
              <td>
                <div style="display: flex; flex-direction: row;">
                  <div style="width: 100%;">
                    <select id="it_project" name="it_project" required>
                      <option value="">Выберите или создайте IT-проект</option>
                      <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($project->id); ?>"><?php echo e($project->$names); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div>
                    <a class="tabs__button btn btn_icon" href="<?php echo e(route('expertise.create_it_project')); ?>" style="margin-left: 10px; min-width: 50px; max-width: 50px;">
                      <svg>
                        <use xlink:href="/assets/images/sprite.svg#plus"></use>
                      </svg>
                    </a>
                  </div>
                </div>
              </td>
            </tr>

          </tbody>
        </table>






        <div class="buttons-wrapper" style="border-top: 1px solid #e3e5ec; padding-top: 25px; margin-top: 50px;">
          <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← <?php echo e(trans('app.but_cancel')); ?></a>
          <button class="btn" type="submit" id="create_draft" name="create_draft" style="font-size: 14px; background: #00317B;">Сформировать запрос</button>
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
  <?php echo $__env->make('layouts.ask_question', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">

  var projectType = document.getElementById("project_type");
  var projectTypeSpan = document.getElementById("full_project_type");

  var itProject = document.getElementById("it_project");
  var itProjectSpan = document.getElementById("full_it_project");

  projectType.addEventListener('change', function() {
    var selectedType = projectType.value;
    switch (selectedType) {
        case '1':
          projectTypeSpan.innerHTML = 'Запрос государственного органа на автоматизацию деятельности государственного органа в уполномоченный орган и сервисному интегратору (СМИ)';
          break;
        case '2':
          projectTypeSpan.innerHTML = 'Инвестиционное предложение';
          break;
        case '3':
          projectTypeSpan.innerHTML = 'Технико-экономическое обоснование';
          break;
        case '4':
          projectTypeSpan.innerHTML = 'Техническое задание';
          break;
        default:
          projectTypeSpan.innerHTML = '';
    }
  });


  itProject.addEventListener('change', function() {
    if(itProject.value > 0) {
      var selectedIT = itProject.options[itProject.selectedIndex];
      itProjectSpan.textContent = "«" + selectedIT.innerHTML + "»";
    } else {
      itProjectSpan.textContent = '';
    }
  });


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/expertise/create.blade.php ENDPATH**/ ?>