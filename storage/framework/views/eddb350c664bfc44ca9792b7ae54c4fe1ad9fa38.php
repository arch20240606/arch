

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
      <!--
      /
      <span><?php echo e(trans('app.d_catalog')); ?></span>
      -->
    </div>

    <h1 class="page-title"><?php echo e(trans('app.m_expert')); ?></h1>



    <?php echo $__env->make('expertise.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="filter-title">Запросы на экспертизу: В работе</div>


    <?php if( $expertises->isEmpty() ): ?>
      <div class="notice">В разделе <b>На согласовании</b> отсутствуют данные</div>
    <?php else: ?>

      <table class="table table_expertise">
        <thead>
        <tr>
          <th>IDE</th>
          <th>Тип проекта</th>
          <th style="text-align: left;">Наименование</th>
          <th>Версия</th>
          
          <th>Статус СИ</th>
          <th>Статус ГТС</th>
          <th>Статус</th>
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
              <td class="table__status"><?php echo e($type_project_name); ?></td>
              <td class="table__name"><a href="<?php echo e(route ('expertise.approve.info', ['id' => $expertise->id])); ?>"><?php echo e($expertise->it_project->$names); ?></a></td>
              <td class="table__status"><?php echo e($expertise->version); ?></td>
              <td class="table__status">Не направлялась в СИ</td>
              
              <td class="table__status">Не направлялась в ГТС</td>
              
              
              <td class="table__status">
                <?php if( $expertise->accept_uo_reviewer == 1 ): ?>
                <span style="width: 100%; cursor: pointer;" class="status status_yes">Исполнитель принял</span>
                <?php else: ?>
                <span style="width: 100%; cursor: pointer;" class="status status_wait">Ожидание рассмотрения</span>
                <?php endif; ?>
              </td>



            </tr>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        </tbody>
      </table>

      <?php echo e($expertises->links('layouts.pagination.softdeco')); ?>


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
  function acceptPassport() {

    var errorBox = document.getElementById("error_sign_box");
    var successBox = document.getElementById("success_sign_box");

    errorBox.style.display = "none";
    successBox.style.display = "none";

    console.log("Нажата кнопка подписания...");

    var webSocket = new WebSocket('wss://127.0.0.1:13579/');
    var callback = null;


    webSocket.onopen = function (event) {
      console.log("Соединение открыто...");
      getKeyInfo("PKCS12", this);
    };



    webSocket.onclose = function (event) {
      if (event.wasClean) {
        console.log('Соединение было закрыто');
      } else {
        console.log('Ошибка соединения');
        errorBox.innerHTML = '<p>Обнаружена ошибка подключения к NCALayer на вашем устройстве. Возможно, NCALayer у вас не запущен, либо блокируется сторонними программами. Пожалуйста, убедитесь, что приложение NCALayer работает и повторите попытку заново.</p>';
        errorBox.style.display = "block";
        successBox.style.display = "none";
      }
      console.log('Код: ' + event.code + ' Причина: ' + event.reason);
    };


    webSocket.onmessage = function (event) {
      
      var result = JSON.parse(event.data);
      var token = $("input[name='_token']").val();
      var comment = document.getElementById("comment").value;
      var id = 1;
      

      
      if(result.responseObject) {
        var dataecp = result.responseObject;

        console.log(dataecp);


        $.ajax({
          url: "<?php echo e(route('expertise.signing.signecp')); ?>",
          method: 'POST',
          dataType: "json",
          data: {
            _comment: comment,
            _verify: dataecp,
            _token: token,
            _id: id
          },
          success: function(data) {
            successBox.innerHTML = data.options;
            successBox.style.display = "block";
            errorBox.style.display = "none";
            
          }
        });
        //$("#ncalayerMFInfo").modal();
      }

    };


    function getKeyInfo(storageName, callBack) {
        var getKeyInfo = {
        "module": "kz.gov.pki.knca.commonUtils",
            "method": "getKeyInfo",
            "args": [storageName]
        };
        callback = callBack;
        webSocket.send(JSON.stringify(getKeyInfo));
        console.log('Хранилище определено как ' + storageName);
    }




  }





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
            link.download = 'passport.pdf';
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/expertise/got_job.blade.php ENDPATH**/ ?>