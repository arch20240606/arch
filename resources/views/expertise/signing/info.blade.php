@extends('layouts.app')

@section('title'){{ trans('app.expert') }} - {{ trans('app.site_title') }}@endsection

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


@section('header')
@include ('layouts.header')
@endsection

@section('content')
<main class="content">

  <div class="container">

    <div class="breadcrumbs">
      <a class="breadcrumbs__home" href="/">
        <svg>
          <use xlink:href="/assets/images/sprite.svg#house"></use>
        </svg>
      </a>
      /
      <a href="{{ route('expertise.index') }}">{{ trans('app.m_expert') }}</a>
      /
      <span><a href="{{ route('expertise.signing') }}">На подписи</a></span>
      /
      <span>Информация о запросе</span>
    </div>

    <h1 class="page-title">Информация о запросе</h1>



    @include ('expertise.menu')

    @if(!empty($successMsg))
    <div class="success-info">{!! $successMsg !!}</div>
    @endif

    @if(!empty($errorMsg))
    <div class="info-box-error">{!! $errorMsg !!}</div>
    @endif

    @include('expertise.signing.tabs_for_data')


    






  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')



@endsection


@section('scripts')
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

  ClassicEditor
		.create( document.querySelector( '#comm_2' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

  ClassicEditor
		.create( document.querySelector( '#comm_3' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

  ClassicEditor
		.create( document.querySelector( '#comm_4' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

  ClassicEditor
		.create( document.querySelector( '#comm_5' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );   

  ClassicEditor
		.create( document.querySelector( '#comm_6' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

  ClassicEditor
		.create( document.querySelector( '#comm_7' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

  ClassicEditor
		.create( document.querySelector( '#comm_8' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

  ClassicEditor
		.create( document.querySelector( '#comm_9' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} ); 

  ClassicEditor
		.create( document.querySelector( '#comm_10' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} ); 

  ClassicEditor
		.create( document.querySelector( '#comm_11' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} ); 

  ClassicEditor
		.create( document.querySelector( '#comm_12' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );   
    
  ClassicEditor
		.create( document.querySelector( '#comm_13' ), {
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
    var expertise_id = document.getElementById("expertise_id").value;

    
    if(result.responseObject) {
      var dataecp = result.responseObject;

      console.log(dataecp);


      $.ajax({
        url: "{{ route('expertise.signing.signecp') }}",
        method: 'POST',
        dataType: "json",
        data: {
          _comment: comment,
          _verify: dataecp,
          _token: token,
          _expertise_id: expertise_id,
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


function acceptPassportCPCP() {

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
  var expertise_id = document.getElementById("expertise_id").value;
 

  
  if(result.responseObject) {
    var dataecp = result.responseObject;

    console.log(dataecp);


    $.ajax({
      url: "{{ route('expertise.signing.signecp') }}",
      method: 'POST',
      dataType: "json",
      data: {
        _comment: comment,
        _verify: dataecp,
        _token: token,
        _expertise_id: expertise_id,
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



function acceptPassportGO() {

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
  var expertise_id = document.getElementById("expertise_id").value;


  
  if(result.responseObject) {
    var dataecp = result.responseObject;

    console.log(dataecp);


    $.ajax({
      url: "{{ route('expertise.signing.signecp') }}",
      method: 'POST',
      dataType: "json",
      data: {
        _comment: comment,
        _verify: dataecp,
        _token: token,
        _expertise_id: expertise_id,
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
  xhr.open('POST', '{{ route('expertise.signing.export') }}', true);
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



<script src="/js/ckeditor.js"></script>
<script>
	ClassicEditor
		.create( document.querySelector( '#comments' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>

@endsection