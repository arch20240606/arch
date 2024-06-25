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
      <!--
      /
      <span>{{ trans('app.d_catalog') }}</span>
      -->
    </div>

    <h1 class="page-title">{{ trans('app.m_expert') }}</h1>



    @include ('expertise.menu')
    <div class="filter-title">Запросы на экспертизу: На согласовании</div>


    @if ( $expertises->isEmpty() )
      <div class="notice">В разделе <b>На согласовании</b> отсутствуют данные</div>
    @else

      <table class="table table_expertise">
        <thead>
        <tr>
          <th>IDE</th>
          <th>Тип проекта</th>
          <th style="text-align: left;">Наименование</th>
          <th>Версия</th>
          {{-- <th>Шифр</th> --}}
          <th>Статус СИ</th>
          <th>Статус ГТС</th>
          <th>Статус</th>
        </tr>
        </thead>
        <tbody>

          @foreach ($expertises as $expertise)
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
              <td class="table__status">{{ $expertise->id }}</td>
              <td class="table__status">{{ $type_project_name }}</td>
              {{-- <td class="table__name"><a href="{{ route ('expertise.approve.info', ['id' => $expertise->id]) }}">{{ $expertise->it_project->$names }}</a></td> --}}
              <td class="table__name"><a href="{{ route('expertise.version', ['expertise' => $expertise->id]) }}">{{ $expertise->it_project->$names }}</a></td>
              <td class="table__status">{{ $expertise->version }}</td>
              {{-- <td class="table__status">{{ $expertise->num_poject }}</td>
              <td class="table__status">{{ $expertise->company }}</td> --}}
              <td class="table__status">На рассмотрении в СИ</td>
              <td class="table__status">На рассмотрении в ГТС</td>
              {{-- <td class="table__status">{{ date('d.m.Y H:i:s', strtotime( $expertise->updated_at )) }}</td> --}}
              <td class="table__status">
                {{-- @if ( $expertise->accept_go == 1 )
                  <span style="width: 100%; cursor: pointer;" class="status status_wait">На подписании</span>
                @else
                  <span style="width: 100%; cursor: pointer;" class="status status_wait">Ожидание рассмотрения</span>
                @endif --}}
                <span style="width: 100%; cursor: pointer;" class="status status_wait">Ожидание рассмотрения</span>
              </td>



            </tr>

          @endforeach



        </tbody>
      </table>

      {{ $expertises->links('layouts.pagination.softdeco') }}

    @endif




    <!-- Toast сообщение -->
    @if(session('successMsg'))
    <div class="toast" id="toast" style="position: fixed; top: 20px; right: 20px; background-color: #00f110; color: #fff; padding: 25px; border-radius: 5px; z-index: 1000;">
        {{ session('successMsg') }}
    </div>
    @endif

    @if(session('errorMsg'))
        <div class="toast" id="errorToast" style="position: fixed; top: 20px; right: 20px; background-color: #ff0000; color: #fff; padding: 25px; border-radius: 5px; z-index: 1000;">
            <b>{{ trans('app.reg_error') }}:</b> {{ session('errorMsg') }}
        </div>
    @endif



    






  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')



@endsection


@section('scripts')
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
          url: "{{ route('expertise.signing.signecp') }}",
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



// Функция для показа toast сообщения
function showToast(message, error = false) {
    var toastId = error ? 'errorToast' : 'toast';
    var toast = document.getElementById(toastId);
    toast.innerText = message;
    toast.style.display = 'block';
    setTimeout(function() {
        toast.style.display = 'none';
    }, 5000); // Скрыть toast сообщение через 5 секунд
}

// Вызов функции для показа toast сообщения об успехе
showToast('{{ session('successMsg') }}');

// Вызов функции для показа toast сообщения об ошибке
@if((session('errorMsg')))
    showToast('{{ session('errorMsg') }}', true);
@endif
</script>

@endsection