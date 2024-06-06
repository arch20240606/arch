

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
      <span>На подписи</span>
    </div>

    <h1 class="page-title">Запросы на подписание</h1>



    <?php echo $__env->make('expertise.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <?php if(!empty($successMsg)): ?>
    <div class="success-info" style="margin-bottom: 5px;"><?php echo $successMsg; ?></div>
    <?php endif; ?>
  
    <?php if(!empty($errorMsg)): ?>
    <div class="info-box-error" style="margin-bottom: 5px;"><?php echo $errorMsg; ?></div>
    <?php endif; ?>



    <div class="filter-title">Запросы на экспертизу: На подписании</div>



    <table class="table table_expertise">
        <thead>
        <tr>
            <th>IDE</th>
            <th style="text-align: left;">Тип</th>
            <th style="text-align: left;">Наименование</th>
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

          <?php $__currentLoopData = $expertises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expertise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
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

            <tr>
                <td class="table__status"><?php echo e($expertise->id); ?></td>
                <td class="table__type"><?php echo e($type_project_name); ?></td>
                <td class="table__name"><a href="<?php echo e(route ('expertise.signing.info', ['id' => $expertise->id])); ?>"><?php echo e($expertise->it_project->$names); ?></a></td>
                <td class="table__author" style="text-align: center;"><?php echo e($expertise->users->surname); ?> <?php echo e($expertise->users->name); ?> <?php echo e($expertise->users->middle); ?></td>
                <td class="table__status">
                  <?php if($expertise->accept_go == 1): ?>
                    <span class="status status_yes">Да</span>
                  <?php else: ?>
                    <span class="status status_no">Нет</span>
                  <?php endif; ?>
                </td>
                <td class="table__date"><?php echo e(date('d.m.Y H:i:s', strtotime( $expertise->created_at ))); ?></td>
                <td class="table__status">
                  <?php if($expertise->accept_cpcp == 1): ?>
                    <span class="status status_yes">Да</span>
                  <?php else: ?>
                    <span class="status status_no">Нет</span>
                  <?php endif; ?>
                </td>
                <td class="table__status">
                  <?php if($expertise->send_to_gts == 1): ?>
                    <?php if($expertise->accept_gts == 1): ?>
                      <span class="status status_yes">Да</span>
                    <?php else: ?>
                      <span class="status status_no">Нет</span>
                    <?php endif; ?>
                  <?php endif; ?>
                </td>
                <td class="table__status">
                  <?php if($expertise->accept_mcriap == 1): ?>
                    <span class="status status_yes">Да</span>
                  <?php else: ?>
                    <span class="status status_no">Нет</span>
                  <?php endif; ?>
                </td>

                <td class="table__version">

                  <?php if($expertise->send_to_gts == 1): ?> 
                  
                    <?php if($expertise->accept_go == 1 && $expertise->accept_gts == 1 && $expertise->accept_cpcp == 1 && $expertise->accept_mcriap == 1): ?>
                      <a style="cursor: pointer;" onclick="exportPassport(<?php echo e($expertise->id); ?>)">Скачать</a>
                    <?php else: ?>
                      Отсутствует
                    <?php endif; ?>

                  <?php else: ?>

                    <?php if($expertise->accept_go == 1 && $expertise->accept_cpcp == 1 && $expertise->accept_mcriap == 1): ?>
                      <a style="cursor: pointer;" onclick="exportPassport(<?php echo e($expertise->id); ?>)">Скачать</a>
                    <?php else: ?>
                      Отсутствует
                    <?php endif; ?>

                  <?php endif; ?>

                </td>

                <td class="table__version">
                  <?php if($expertise->accept_go == 1 && $expertise->accept_gts == 1 && $expertise->accept_cpcp == 1 && $expertise->accept_mcriap == 1): ?>
                    <?php echo e($expertise->ecp_name_mcriap); ?>

                  <?php else: ?>
                    Отсутствует
                  <?php endif; ?>
                </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        

        </tbody>
    </table>

    <?php echo e($expertises->links('layouts.pagination.softdeco')); ?>











    






  </div>

</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('other_divs'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script src="/js/ckeditor.js"></script>
<script>
	ClassicEditor
		.create( document.querySelector( '#comm_1' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>


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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\НОВЫЙ ПОРТАЛ\www\resources\views/expertise/signing/index.blade.php ENDPATH**/ ?>