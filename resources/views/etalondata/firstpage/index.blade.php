@extends('layouts.app')

@section('title'){{ trans('app.etalon') }} - {{ trans('app.site_title') }}@endsection

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
  <section class="geo" style="height: 170px;">

    <div class="geo__bg">
      <picture>
        <source srcset="/assets/images/questions-bg.avif" type="image/avif">
        <source srcset="/assets/images/questions-bg.webp" type="image/webp">
        <img src="/assets/images/questions-bg.jpg" alt="Background">
      </picture>
    </div>

    <div class="container">
      <div class="breadcrumbs breadcrumbs_white">
        <a class="breadcrumbs__home" href="/">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#house"></use>
          </svg>
        </a>
        /
        <span>{{ trans('app.etalon') }}</span>
      </div>

      <h1 class="page-title">{{ trans('app.etalon') }}</h1>
    </div>
  </section>

  <div class="container">
    <p><br></p>
    @if ( count($domainlists) == 0 )
      <div class="info-box-error" id="error_sign_box" style="padding: 25px 20px 25px 20px;">На текущий момент отсутствуют утвержденные эталонные данные</div>
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

              <li class="is-menu__item @if($domain->id == 1) is-menu__item_active @endif" data-id="{{ $domain->id}}">
                <span class="is-menu__item-title">{{ $domain->$names}}</span>
              </li>

              @endforeach

            </ul>
          </div>


          @foreach ($domainlists as $domain)


          <div class="is-menu-content" data-id="{{ $domain->id}}" @if($domain->id == 1) style="display: block;" @endif>
            
            <h2 class="is-content-title">{{ $domain->$names }} → <span style="font-size: 14px;">Версия: {{ $domain->version }}</span></h2>

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
                  @foreach ( \App\Models\DomainObjectCollection::domainObjects($domain->id, 'Физ.лицо') as $objects )
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
                  @foreach ( \App\Models\DomainObjectCollection::domainObjects($domain->id, 'Юр.лицо (организация)') as $objects )
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
                  @foreach ( \App\Models\DomainObjectCollection::domainObjects($domain->id, 'Объект') as $objects )
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
                  @foreach ( \App\Models\DomainObjectCollection::domainObjects($domain->id, 'Документ') as $objects )
                  <option value="{{ $objects->id }}">{{ $objects->data_object }}</option>
                  @endforeach
              </select>
              </div>
              
              <div id="info_div_d{{ $domain->id }}03" name="info_div_d{{ $domain->id }}03" style="padding: 20px; border: 1px solid rgba(114,127,161,.2); border-radius: 8px; font-size: 14px;">
                <b>Информация о данных:</b><br><br>
              </div>

            </div>



            

          </div>



          @endforeach




        </div>
      </div>




    @endif

  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')

  @include ('layouts.ask_question')
  <div id="chat" class="chat"></div>
  @include ('layouts.login_popup')
  @include ('layouts.search_form')

@endsection

@section('scripts')
<script>
  function getDateObject(selectObject, div) {
    
    var id = selectObject.value;
    var token = $("input[name='_token']").val();
    var info_div = document.getElementById(div);
    info_div.innerHTML = '<b>Информация о данных:</b><br><br>';

    $.ajax({
      url: "{{ route('etalon.getinfo') }}",
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
@endsection