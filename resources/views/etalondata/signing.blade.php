@extends('layouts.app')

@section('title')Эталонные данные@endsection

<?php
if ( app()->getLocale() == "ru" ) {
  $names = 'name_ru';
} elseif ( app()->getLocale() == "en" ) {
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
      <a class="breadcrumbs__home" href="/{{ app()->getLocale() }}">
        <svg>
          <use xlink:href="/assets/images/sprite.svg#house"></use>
        </svg>
      </a>
      /
      <a href="{{ route('etalondatas.index') }}">Эталонные данные</a>

    </div>

    <h1 class="page-title">Эталонные данные</h1>

    @include ('etalondata.menu')

    @if( session()->has('successMsg') )
    <div class="success-info">{!! session()->get('successMsg') !!}</div>
    @endif

    <div class="info-box-error" id="error_sign_box" style="display: none; margin-bottom: 5px;"></div>
    <div class="success-info" id="success_sign_box" style="display: none; margin-bottom: 5px;"></div>


    @if (Auth::user()->government_id == 24)


      @if ( count($domainobjects) == 0 )

        <div class="info-box-error" id="error_sign_box" style="padding: 25px 20px 25px 20px;">В разделе <b>Утверждение</b> отсутствует доступная для вас информация</div>

      @else

        <div class="is-tab-content" data-id="1" style="display: block;">
          <div class="is-menu-navigation">


            <div class="is-menu">
              <div class="is-menu__title">
                Домены
                <span class="is-menu__toggle">
                  <svg>
                    <use xlink:href="/assets/images/sprite.svg#chevron-right-small"></use>
                  </svg>
                </span>
              </div>
              <ul class="is-menu__list">

                @foreach ($domainlists as $domain)

                  @if ( $domain->getObjectNotApprove($domain->id) == 0 )

                    <li class="is-menu__item @if($domain->id == 1) is-menu__item_active @endif" data-id="{{ $domain->id}}">
                      <span class="is-menu__item-title">{{ $domain->$names}}</span>
                    </li>
                  
                    @endif

                @endforeach

              </ul>
            </div>


            @foreach ($domainlists as $domain)
              
              @if ( $domain->getObjectNotApprove($domain->id) == 0 )

                <div class="is-menu-content" data-id="{{ $domain->id}}" @if($domain->id == 1) style="display: block;" @endif>


                  <form method="POST" action="{{ route('etalondatas.update', ['etalondata' => $domain->id]) }}">
                    @csrf
                    @method('PATCH')
                    <h2 class="is-content-title">
                      {{ $domain->$names }} →

                      @if ($domain->approve == 1)
                        <span class="btn btn_icon" style="background-color: #06610e; font-size: 14px; padding: 5px; min-width: 200px; margin-left: 50px;">Домен утвержден</span>
                      @else

                        @if ($domain->send == 1)
                        <a class="btn" onclick="acceptDomain('{{ $domain->id }}')" style="font-size: 14px; padding: 5px; min-width: 210px; margin-left: 50px;">
                          Утвердить домен
                        </a>
                        <button type="submit" class="btn btn_icon" name="discart_domain_mcriap" id="discart_domain_mcriap" style="font-size: 14px; padding: 5px; min-width: 210px; margin-left: 10px; background: #b90404;">
                          Отклонить домен
                        </button>
                        @endif
                      
                      @endif
                    </h2>
                  </form>


                  <div class="tab tabs">
                    <a class="tabs__link tablinks" onclick="openCity(event, 'f{{ $domain->id }}00')" style="cursor: pointer; padding-left: 20px; padding-right: 20px;">
                      {{ trans('app.fl') }}
                    </a>
                    <a class="tabs__link tablinks" onclick="openCity(event, 'u{{ $domain->id }}01')" style="cursor: pointer; padding-left: 20px; padding-right: 20px;">
                      {{ trans('app.ul') }}
                    </a>
                    <a class="tabs__link tablinks" onclick="openCity(event, 'o{{ $domain->id }}02')" style="cursor: pointer; padding-left: 20px; padding-right: 20px;">
                      {{ trans('app.obj') }}
                    </a>
                    <a class="tabs__link tablinks" onclick="openCity(event, 'd{{ $domain->id }}03')" style="cursor: pointer; padding-left: 20px; padding-right: 20px;">
                      {{ trans('app.docs') }}
                    </a>
                  </div>



                  <div class="tabcontent" id='f{{ $domain->id }}00'>

                    <div class="filter form form__field">
                      <select onchange="getDateObject(this, 'info_div_f{{ $domain->id }}00')" id="f{{ $domain->id }}00_o" name="f{{ $domain->id }}00_o" required>
                        <option value="">Выберите объект</option>
                        @foreach ( \App\Models\DomainObjectCollection::domainObjectsMCRIAP($domain->id, 'Физ.лицо') as $objects )
                        <option value="{{ $objects->id }}">{{ $objects->data_object }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div id="info_div_f{{ $domain->id }}00" name="info_div_f{{ $domain->id }}00" style="padding: 20px; border: 1px solid rgba(114,127,161,.2); border-radius: 8px; font-size: 14px;">
                      <b>Информация о данных:</b><br><br>
                    </div>

                  </div>


                  <div class="tabcontent" id='u{{ $domain->id }}01'>

                    <div class="filter form form__field">
                      <select onchange="getDateObject(this, 'info_div_u{{ $domain->id }}01')" id="u{{ $domain->id }}01_o" name="u{{ $domain->id }}01_o" required>
                        <option value="">Выберите объект</option>
                        @foreach ( \App\Models\DomainObjectCollection::domainObjectsMCRIAP($domain->id, 'Юр.лицо (организация)') as $objects )
                        <option value="{{ $objects->id }}">{{ $objects->data_object }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div id="info_div_u{{ $domain->id }}01" name="info_div_u{{ $domain->id }}01" style="padding: 20px; border: 1px solid rgba(114,127,161,.2); border-radius: 8px; font-size: 14px;">
                      <b>Информация о данных:</b><br><br>
                    </div>

                  </div>




                  <div class="tabcontent" id='o{{ $domain->id }}02'>

                    <div class="filter form form__field">
                      <select onchange="getDateObject(this, 'info_div_o{{ $domain->id }}02')" id="o{{ $domain->id }}02_o" name="o{{ $domain->id }}02_o" required>
                        <option value="">Выберите объект</option>
                        @foreach ( \App\Models\DomainObjectCollection::domainObjectsMCRIAP($domain->id, 'Объект') as $objects )
                        <option value="{{ $objects->id }}">{{ $objects->data_object }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div id="info_div_o{{ $domain->id }}02" name="info_div_o{{ $domain->id }}02" style="padding: 20px; border: 1px solid rgba(114,127,161,.2); border-radius: 8px; font-size: 14px;">
                      <b>Информация о данных:</b><br><br>
                    </div>

                  </div>




                  <div class="tabcontent" id='d{{ $domain->id }}03'>

                    <div class="filter form form__field">
                      <select onchange="getDateObject(this, 'info_div_d{{ $domain->id }}03')" id="d{{ $domain->id }}03_o" name="d{{ $domain->id }}03_o" required>
                        <option value="">Выберите объект</option>
                        @foreach ( \App\Models\DomainObjectCollection::domainObjectsMCRIAP($domain->id, 'Документ') as $objects )
                        <option value="{{ $objects->id }}">{{ $objects->data_object }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div id="info_div_d{{ $domain->id }}03" name="info_div_d{{ $domain->id }}03" style="padding: 20px; border: 1px solid rgba(114,127,161,.2); border-radius: 8px; font-size: 14px;">
                      <b>Информация о данных:</b><br><br>
                    </div>

                  </div>





                </div>

              @endif

            @endforeach

          </div>
        </div>

      @endif

    @else
      <div class="info-box-error" id="error_sign_box" style="padding: 25px 20px 25px 20px;">Недостаточно прав для доступа к разделу <b>Утверждение</b></div>
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
  function getDateObject(selectObject, div) {
    
    var id = selectObject.value;
    var token = $("input[name='_token']").val();
    var info_div = document.getElementById(div);
    info_div.innerHTML = '<b>Информация о данных:</b><br><br>';

    $.ajax({
      url: "{{ route('etalondatas.getinfo') }}",
      method: 'POST',
      data: {
        _id: id,
        _token: token
      },
      success: function(data) {
        info_div.innerHTML = '<p>'+ data.options +'</b></p>';
      }
    });

  }

</script>



<script>
  function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" tabs__link_active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " tabs__link_active";

  }
</script>

<style>
  .tabcontent {
    display: none;
  }
</style>



<script>
function acceptDomain(domain_id) {

  var errorBox = document.getElementById("error_sign_box");
  var successBox = document.getElementById("success_sign_box");

  errorBox.style.display = "none";
  successBox.style.display = "none";

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
 
    
    if(result.responseObject) {
      var dataecp = result.responseObject;

      console.log(dataecp);


      $.ajax({
        url: "{{ route('etalondatas.signing.signecp') }}",
        method: 'POST',
        dataType: "json",
        data: {
          _verify: dataecp,
          _token: token,
          _domain_id: domain_id,
        },
        success: function(data) {
          successBox.innerHTML = data.options;
          successBox.style.display = "block";
          errorBox.style.display = "none";
        }
      });

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
</script>
@endsection