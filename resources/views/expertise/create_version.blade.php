{{-- @extends('layouts.app')

@section('title'){{ trans('app.expert') }} - {{ trans('app.site_title') }}@endsection



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
    <div class="filter-title">Запросы на экспертизу / Техническое задание</div>


    {{-- @if ( $expertises->isEmpty() )
      <div class="notice">В разделе <b>На согласовании</b> отсутствуют данные</div>
    @else --}}

      {{-- <table class="table table_expertise">
        <thead>
        <tr>
          <th>Наименование</th>
          <th>Номер запроса</th>
          <th>Дата создания</th>
          <th>Статус</th>
        </tr>
        </thead>
        <tbody> --}}

          {{-- @foreach ($expertises as $expertise) --}}
            

            {{-- <tr>
              <td class="table__name"><a href="{{ route('expertise.edit', ['expertise' => $expertise->id]) }}">Версия {{ $expertise->version_expertise }}</a></td>
              <td class="table__status">{{$expertise->version}}</td>
              <td class="table__status">{{$expertise->created_at}}</td>
              <td class="table__status">Черновик</td>
            </tr> --}}
          {{-- @endforeach --}}



        {{-- </tbody>
      </table> --}}


    {{-- @endif --}}

  {{-- </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')



@endsection  --}}


{{-- @section('scripts')
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

</script>

@endsection --}}




{{-- @extends('layouts.app')

@section('title')
    {{ __('Выбор версии документа') }}
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
        </div>

        <h1 class="page-title">{{ trans('app.m_expert') }}</h1>

        @include('expertise.menu')
        <div class="filter-title">Запросы на экспертизу</div>

        <div class="actions">
          @if(auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')))
            <a style="padding-top: 10px; padding-bottom: 10px; font-size: 16px;" href="{{ route('expertise.create_new_version', ['expertise' => $expertise->id]) }}" class="btn btn-primary">
                Создать новую версию
            </a>
          @endif  
        </div>

        <table class="table table_expertise">
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Номер версии</th>
                    <th>Дата создания</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                @foreach($versions as $version)
                    <tr>
                        <td class="table__name">
                          @if(auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')))
                            <a href="{{ route('expertise.edit', ['expertise' => $expertise->id, 'version' => $version->id]) }}">
                                Версия {{ $version->version_number }}
                            </a>
                          @else
                            <a href="{{ route('expertise.approve.info', ['id' => $expertise->id, 'version_id' => $version->id]) }}">
                              Версия {{ $version->version_number }}
                            </a>
                          @endif
                        </td>
                        <td class="table__status">{{ $version->version_number }}</td>
                        <td class="table__status">{{ $version->created_at }}</td>
                        <td class="table__status">Черновик</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection --}}



{{-- @extends('layouts.app')

@section('title')
    {{ __('Выбор версии документа') }}
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
        </div>

        <h1 class="page-title">{{ trans('app.m_expert') }}</h1>

        @include('expertise.menu')
        <div class="filter-title">Запросы на экспертизу / Техническое задание</div>

        <div class="actions">
          @if(auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')))
            <a href="{{ route('expertise.create_new_version', ['expertise' => $expertise->id]) }}" class="btn btn-primary">
                Создать новую версию
            </a>
          @endif  
        </div>

        <table class="table table_expertise">
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Номер версии</th>
                    <th>Дата создания</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                @foreach($versions as $version)
                    <tr>
                        <td class="table__name">
                          @if(auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')))
                            <a href="{{ route('expertise.edit', ['expertise' => $expertise->id, 'version' => $version->id]) }}">
                              Версия {{ $version->version_expertise }}
                            </a>
                          @else
                            <a href="{{ route('expertise.approve.info', ['id' => $expertise->id, 'version_id' => $version->id]) }}">
                              Версия {{ $version->version_number }}
                          </a>
                          @endif
                        </td>
                        <td class="table__status">{{ $version->version_expertise }}</td>
                        <td class="table__status">{{ $version->created_at }}</td>
                        <td class="table__status">Черновик</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection --}}



{{-- @extends('layouts.app')

@section('title')
    {{ __('Выбор версии документа') }}
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
        </div>

        <h1 class="page-title">{{ trans('app.m_expert') }}</h1>

        @include('expertise.menu')
        <div class="filter-title">Запросы на экспертизу / Техническое задание</div>

        <div class="actions">
          @if(auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')))
            <a href="{{ route('expertise.create_new_version', ['expertise' => $expertise->id]) }}" class="btn btn-primary">
                Создать новую версию
            </a>
          @endif  
        </div>

        <table class="table table_expertise">
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Номер версии</th>
                    <th>Дата создания</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                <!-- Последующие версии из модели ExpertiseVersion -->
                @foreach($versions as $version)
                    <tr>
                        <td class="table__name">
                            @if(auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')))
                                <a href="{{ route('expertise.edit', ['expertise' => $expertise->id, 'version' => $version->version_number]) }}">
                                    Версия {{ $version->version_number }}
                                </a>
                            @else
                                <a href="{{ route('expertise.approve.info', ['id' => $expertise->id, 'version_id' => $version->version_number]) }}">
                                    Версия {{ $version->version_number }}
                                </a>
                            @endif
                        </td>
                        <td class="table__status">{{ $version->version_number }}</td>
                        <td class="table__status">{{ $version->created_at }}</td>
                        <td class="table__status">Черновик</td>
                    </tr>
                @endforeach
                @foreach($versions as $version)
                    <tr>
                        <td class="table__name">
                            @if(auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')))
                                <a href="{{ route('expertise.edit', ['expertise' => $expertise->id, 'version' => $version->version_expertise]) }}">
                                    Версия {{ $version->version_expertise }}
                                </a>
                            @else
                                <a href="{{ route('expertise.approve.info', ['id' => $expertise->id, 'version_id' => $version->version_expertise]) }}">
                                    Версия {{ $version->version_expertise }}
                                </a>
                            @endif
                        </td>
                        <td class="table__status">{{ $version->version_expertise }}</td>
                        <td class="table__status">{{ $version->created_at }}</td>
                        <td class="table__status">Черновик</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection --}}

@extends('layouts.app')

@section('title')
    {{ __('Выбор версии документа') }}
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
        </div>

        <h1 class="page-title">{{ trans('app.m_expert') }}</h1>

        @include('expertise.menu')
        <div class="filter-title">Запросы на экспертизу / Техническое задание</div>

        <div class="actions">
            @if(auth()->check() && auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR'))
                <a href="{{ route('expertise.create_new_version', ['expertise' => $expertise->id]) }}" class="btn btn-primary">
                    Создать новую версию
                </a>
            @endif  
        </div>

        <table class="table table_expertise">
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Номер версии</th>
                    <th>Дата создания</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($versionsTwo) && $versionsTwo->isNotEmpty())
                @foreach($versionsTwo as $versionTwo)
                <tr>
                    <td class="table__name">
                        @if(auth()->check() && auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR'))
                            <a href="{{ route('expertise.edit', ['expertise' => $expertise->expertise_id, 'version' => $versionTwo->version_number]) }}">
                                Версия {{ $versionTwo->version_number }}
                            </a>
                        @else
                            <a href="{{ route('expertise.approve.info', ['id' => $expertise->expertise_id, 'version_id' => $versionTwo->version_number]) }}">
                                Версия {{ $versionTwo->version_number }}
                            </a>
                        @endif
                    </td>
                    <td class="table__status">{{ $versionTwo->version_number }}</td>
                    <td class="table__status">{{ $versionTwo->created_at }}</td>
                    <td class="table__status">Черновик</td>
                </tr>
                @endforeach
            @else
            <p>Нет данных для отображения</p>
            @endif    
                @foreach($versions as $version)
                    <tr>
                        <td class="table__name">
                            @if(auth()->check() && auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR'))
                                <a href="{{ route('expertise.edit', ['expertise' => $expertise->id, 'version' => $version->version_expertise]) }}">
                                    Версия {{ $version->version_expertise }}
                                </a>
                            @else
                                <a href="{{ route('expertise.approve.info', ['id' => $expertise->id, 'version_id' => $version->version_expertise]) }}">
                                    Версия {{ $version->version_expertise }}
                                </a>
                            @endif
                        </td>
                        <td class="table__status">{{ $version->version_expertise }}</td>
                        <td class="table__status">{{ $version->updated_at }}</td>
                        <td class="table__status">Черновик</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection




