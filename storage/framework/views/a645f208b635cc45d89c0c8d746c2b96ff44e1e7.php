

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
      <span><a href="<?php echo e(route('expertise.signing')); ?>">На согласовании</a></span>
      /
      <span>Информация о запросе</span>
    </div>

    <h1 class="page-title">Информация о запросе</h1>



    <?php echo $__env->make('expertise.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(!empty($successMsg)): ?>
    <div class="success-info"><?php echo $successMsg; ?></div>
    <?php endif; ?>

    <?php if(!empty($errorMsg)): ?>
    <div class="info-box-error"><?php echo $errorMsg; ?></div>
    <?php endif; ?>

    <?php echo $__env->make('expertise.info.tabs_for_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



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
		.create( document.querySelector( '#editor_1' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>

<style>
  .ck-editor__editable_inline {
      min-height: 300px;
  }
</style>




<script>


// function acceptPassport() {

//   var errorBox = document.getElementById("error_sign_box");
//   var successBox = document.getElementById("success_sign_box");

//   errorBox.style.display = "none";
//   successBox.style.display = "none";

//   console.log("Нажата кнопка подписания...");

//   var webSocket = new WebSocket('wss://127.0.0.1:13579/');
//   var callback = null;


//   webSocket.onopen = function (event) {
//     console.log("Соединение открыто...");
//     getKeyInfo("PKCS12", this);
//   };



//   webSocket.onclose = function (event) {
//     if (event.wasClean) {
//       console.log('Соединение было закрыто');
//     } else {
//       console.log('Ошибка соединения');
//       errorBox.innerHTML = '<p>Обнаружена ошибка подключения к NCALayer на вашем устройстве. Возможно, NCALayer у вас не запущен, либо блокируется сторонними программами. Пожалуйста, убедитесь, что приложение NCALayer работает и повторите попытку заново.</p>';
//       errorBox.style.display = "block";
//       successBox.style.display = "none";
//     }
//     console.log('Код: ' + event.code + ' Причина: ' + event.reason);
//   };






//   webSocket.onmessage = function (event) {
    
//     var result = JSON.parse(event.data);
//     var token = $("input[name='_token']").val();
//     var comment = document.getElementById("comment").value;
//     var expertise_id = document.getElementById("expertise_id").value;
//     var send_to_si = document.getElementById("send_to_si").checked;
//     var send_to_kib = document.getElementById("send_to_kib").checked;
//     var selectElement = document.getElementById("send_to_mcriap_executor");

//     if (send_to_si == true ) {
//       send_to_si = 1;
//     } else {
//       send_to_si = 0;
//     }

//     console.log(send_to_si);

//     if (send_to_kib == true ) {
//       send_to_kib = 1;
//     } else {
//       send_to_kib = 0;
//     }

//     console.log(send_to_kib);
    
//     // Проверяем, был ли выбран какой-либо пользователь
// if (selectElement.selectedIndex !== 0) { // Если индекс выбранного элемента не равен 0 (первый элемент)
//     var send_to_mcriap_executor = 1; // Если выбран пользователь, устанавливаем значение 1
// } else {
//     var send_to_mcriap_executor = 0; // Если пользователь не выбран, устанавливаем значение 0
// }
// console.log(send_to_mcriap_executor);
        
//     if(result.responseObject) {
//       var dataecp = result.responseObject;
//       //console.log(dataecp);
//       $.ajax({
//         url: "<?php echo e(route('expertise.approve.signecp')); ?>",
//         method: 'POST',
//         dataType: "json",
//         data: {
//           _comment: comment,
//           _verify: dataecp,
//           _token: token,
//           _expertise_id: expertise_id,
//           _send_to_si: send_to_si,
//           _send_to_kib: send_to_kib,
//           _send_to_mcriap_executor: send_to_mcriap_executor,
//         },
//         success: function(data) {
//           successBox.innerHTML = data.options;
//           successBox.style.display = "block";
//           errorBox.style.display = "none";
          
          
//         }
//       });
//     }

//   };





//   function getKeyInfo(storageName, callBack) {
//       var getKeyInfo = {
//       "module": "kz.gov.pki.knca.commonUtils",
//           "method": "getKeyInfo",
//           "args": [storageName]
//       };
//       callback = callBack;
//       webSocket.send(JSON.stringify(getKeyInfo));
//       console.log('Хранилище определено как ' + storageName);
//   }




// }





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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\новый портал\www\resources\views/expertise/info/index.blade.php ENDPATH**/ ?>