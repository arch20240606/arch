

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
      /
      <span>Редактирование запроса на экспертизу</span>
    </div>

    <h1 class="page-title">Редактирование запроса на экспертизу</h1>


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
          <h2 class="is-info__header-title"><span style="font-weight: normal;"><?php echo e($type_project_name); ?></span> «<?php echo e($expertise->it_project->$names); ?>»</h2>
        </div>

        <?php echo $__env->make('expertise.tabs_for_data_edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- это важные переменные -->
        <input type="hidden" id="it_project_id" name="it_project_id" value="<?php echo e($expertise->it_project_id); ?>">
        <input type="hidden" id="type_project" name="type_project" value="<?php echo e($expertise->type_project); ?>">
        <input type="hidden" id="expertise_id" name="expertise_id" value="<?php echo e($expertise->id); ?>">        
        <!--// это важные переменные -->

      
            <input type="hidden" id="approver_id1" name="approver_id1">
            <input type="hidden" id="signer_id" name="signer_id">
          <h2>Отправка заявки</h2>
          
          <label for="signer">Подписывающие:</label>
          <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
          <select id="signer" name="signer_id" style="width: 100%; padding: 8px 12px; margin-bottom: 15px;">
              <option value="" selected disabled>Выберите Подписывающего</option>
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($user->hasRole('ROLE_GO_EXPERTISE_SIGNER')): ?>
              <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> <?php echo e($user->surname); ?> <?php echo e($user->middlename); ?></option>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          
          
          <label for="approver1">Согласующие:</label>
          <select id="approver1" name="approver_id1" style="width: 100%; padding: 8px 12px; margin-bottom: 15px;">
              <option value="" selected disabled>Выберите Согласующего</option>
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($user->hasRole('ROLE_GO_EXPERTISE_CONFIRMER')): ?>
              <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> <?php echo e($user->surname); ?> <?php echo e($user->middlename); ?></option>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
      


        <div class="buttons-wrapper" style="border-top: 1px solid #e3e5ec; padding-top: 25px; margin-top: 50px;">
          <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← <?php echo e(trans('app.but_cancel')); ?></a>
          <button class="btn" type="submit" id="save_draft_tab" name="save_draft_tab" style="font-size: 14px; background: #00317B;"><?php echo e(trans('app.but_save')); ?></button>
          <button class="btn" type="submit" id="create_and_send_tab" name="create_and_send_tab" style="font-size: 14px; background: #0178BC;">Сформировать и отправить</button>
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




<script src="/js/ckeditor.js"></script>
<script>
	ClassicEditor
		.create( document.querySelector( '#editor_1' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

  ClassicEditor
    .create( document.querySelector( '#editor_2' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

  ClassicEditor
    .create( document.querySelector( '#editor_3' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

  ClassicEditor
    .create( document.querySelector( '#editor_4' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
  ClassicEditor
    .create( document.querySelector( '#editor_5' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );    
  ClassicEditor
    .create( document.querySelector( '#editor_6' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
  ClassicEditor
    .create( document.querySelector( '#editor_7' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
  ClassicEditor
    .create( document.querySelector( '#editor_8' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
  ClassicEditor
    .create( document.querySelector( '#editor_9' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
  ClassicEditor
    .create( document.querySelector( '#editor_10' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
  ClassicEditor
    .create( document.querySelector( '#editor_11' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );    
  ClassicEditor
    .create( document.querySelector( '#editor_12' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/expertise/edit.blade.php ENDPATH**/ ?>