@extends('layouts.app')

@section('title'){{ trans('app.d_passport') }}: {{ trans('app.catalog') }} - {{ trans('app.site_title') }}@endsection


<?php
if ( app()->getLocale() == "ru" ) {
  $name_go = 'name_ru';
} elseif ( app()->getLocale() == "en" ) {
  $name_go = 'name_en';
} else {
  $name_go = 'name_kz';
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
      <a href="{{ route('datacatalog.index') }}">{{ trans('app.catalog') }}</a>
      /
      <span>{{ trans('app.d_passport') }}</span>
    </div>

    <h1 class="page-title">{{ trans('app.catalog') }}</h1>

    @include ('datacatalog.index_menu')


    @if(!empty($successMsg))
      <div class="success-info">{!! $successMsg !!}</div>
    @endif

    @if(!empty($errorMsg))
      <div class="info-box-error"><b>{{ trans('app.reg_error') }}:</b> {!! $errorMsg !!}</div>
    @endif



    <div class="is-info">

      <form class="form" enctype="multipart/form-data" method="POST" action="{{ route('datacatalog.store') }}">
        @csrf

        <div class="is-info__header">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title">{{ trans('app.dc_obshaya') }}</h2>
          <span class="status"><b>{{ trans('app.dc_prilozhenie_1') }}</b></span>
        </div>


        <table class="table">
          <thead>
            <tr>
              <th style="width: 35%; border: 0px;"></th>
              <th style="width: 5%; border: 0px;"></th>
              <th style="width: 60%; border: 0px;"></th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td class="table__name">{{ trans('app.dc_name_go') }}</td>
              <td><span data-hint="{{ trans('app.dc_name_go_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <!--
                <input id="input" class="keyboard__key">
                -->
                <select id="go_select" name="go_select" required>
                  <option value="0" selected>{{ trans('app.dc_name_go_select') }}</option>
                  @foreach ($governments as $government)
                  <option value="{{ $government->id }}">{{ $government->$name_go }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
            
            <tr>
              <td class="table__name">{{ trans('app.dc_name_is') }}</td>
              <td><span data-hint="{{ trans('app.dc_name_is_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td >
                <div>
                  <select id="is_select" name="is_select" class="form__field" required>
                  </select>
                </div>
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_data_used') }}</td>
              <td><span data-hint="{{ trans('app.dc_data_used_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <select id="data_used" name="data_used" required>
                  <option value="0" selected="">{{ trans('app.dc_data_used_select') }}</option>
                  <option value="1">{{ trans('app.dc_republic') }}</option>
                  <option value="2">{{ trans('app.dc_local') }}</option>
                </select>
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_data_enter') }}</td>
              <td><span data-hint="{{ trans('app.dc_data_enter_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <select id="data_enter" name="data_enter" required>
                  <option value="0" selected="">{{ trans('app.dc_data_enter_select') }}</option>
                  <option value="1">{{ trans('app.dc_data_enter_letter') }}</option>
                  <option value="2">{{ trans('app.dc_data_enter_electro') }}</option>
                  <option value="3">{{ trans('app.dc_data_enter_combo') }}</option>
                </select>
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_data_form') }}</td>
              <td><span data-hint="{{ trans('app.dc_data_form_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <div class="is-checkboxes">
                  <label class="toggle-checkbox">
                    <input type="checkbox" id="data_first" name="data_first">
                    <span></span>
                    <p>{{ trans('app.dc_data_first') }}</p>
                  </label>
                  <label class="toggle-checkbox">
                    <input type="checkbox" id="data_agregate" name="data_agregate">
                    <span></span>
                    <p>{{ trans('app.dc_data_agregate') }}</p>
                  </label>
                </div>
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_data_access') }}</td>
              <td><span data-hint="{{ trans('app.dc_data_access_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <div class="is-checkboxes">
                  <label class="toggle-checkbox">
                    <input type="checkbox" name="data_access_only">
                    <span></span>
                    <p>{{ trans('app.dc_data_access_only') }}</p>
                  </label>
                  <label class="toggle-checkbox">
                    <input type="checkbox" name="data_access_free">
                    <span></span>
                    <p>{{ trans('app.dc_data_access_free') }}</p>
                  </label>
                </div>
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_users_npa') }}</td>
              <td><span data-hint="{{ trans('app.dc_users_npa_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="users_npa" name="users_npa" type="text" maxlength="1500" required></td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_data_source') }}</td>
              <td><span data-hint="{{ trans('app.dc_data_source_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="data_source" name="data_source" type="text" maxlength="590" required></td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_data_source_fact') }}</td>
              <td><span data-hint="{{ trans('app.dc_data_source_fact_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="data_source_fact" name="data_source_fact" maxlength="590" type="text" required></td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_object_description') }}</td>
              <td><span data-hint="{{ trans('app.dc_object_description_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <select id="object_description" name="object_description" required>
                  <option value="0" selected="">{{ trans('app.dc_object_description_select') }}</option>
                  <option value="1">{{ trans('app.dc_object_description_fiz') }}</option>
                  <option value="2">{{ trans('app.dc_object_description_ur') }}</option>
                  <option value="3">{{ trans('app.dc_object_description_imush') }}</option>
                  <option value="4">{{ trans('app.dc_object_description_result') }}</option>
                  <option value="5">{{ trans('app.dc_object_description_oxrana') }}</option>
                  <option value="6">{{ trans('app.dc_object_description_blaga') }}</option>
                </select>
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_interval_update') }}</td>
              <td><span data-hint="{{ trans('app.dc_interval_update_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <select id="interval_update" name="interval_update" required>
                  <option value="0" selected="">{{ trans('app.dc_interval_update_select') }}</option>
                  <option value="1">{{ trans('app.dc_interval_update_no') }}</option>
                  <option value="2">{{ trans('app.dc_interval_update_need') }}</option>
                  <option value="3">{{ trans('app.dc_interval_update_data') }}</option>
                  <option value="4">{{ trans('app.dc_interval_update_refresh') }}</option>
                  <option value="5">{{ trans('app.dc_interval_update_npa') }}</option>
                </select>
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_graphic_update') }}</td>
              <td><span data-hint="{{ trans('app.dc_graphic_update_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <select id="graphic_update" name="graphic_update" required>
                  <option value="0" selected="">{{ trans('app.dc_graphic_update_select') }}</option>
                  <option value="1">{{ trans('app.dc_graphic_update_time') }}</option>
                  <option value="2">{{ trans('app.dc_graphic_update_data') }}</option>
                  <option value="3">{{ trans('app.dc_graphic_update_npa') }}</option>
                  <option value="4">{{ trans('app.dc_graphic_update_no') }}</option>
                </select>
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_update_rules') }}</td>
              <td><span data-hint="{{ trans('app.dc_update_rules_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="update_rules" name="update_rules" maxlength="590" type="text" required></td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_geo') }}</td>
              <td><span data-hint="{{ trans('app.dc_geo_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <select id="geo" name="geo">
                  <option value="0" selected="">{{ trans('app.dc_geo_select') }}</option>
                  <option value="1">{{ trans('app.yes') }}</option>
                  <option value="2">{{ trans('app.no') }}</option>
                </select>
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_geo_type') }}</td>
              <td><span data-hint="{{ trans('app.dc_geo_type_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <select id="geo_type" name="geo_type" required disabled>
                  <option value="0" selected="">{{ trans('app.dc_geo_type_select') }}</option>
                  <option value="1">{{ trans('app.dc_geo_type_dot') }}</option>
                  <option value="2">{{ trans('app.dc_geo_type_line') }}</option>
                  <option value="3">{{ trans('app.dc_geo_type_poly') }}</option>
                  <option value="4">{{ trans('app.no') }}</option>
                </select>
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_npa_list') }}</td>
              <td><span data-hint="{{ trans('app.dc_npa_list_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="npa_list" name="npa_list" type="text" maxlength="590" required></td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_npa_list_reglament') }}</td>
              <td><span data-hint="{{ trans('app.dc_npa_list_reglament_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="npa_list_reglament" name="npa_list_reglament" type="text" maxlength="590" required></td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_npa_list_rules') }}</td>
              <td><span data-hint="{{ trans('app.dc_npa_list_rules_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="npa_list_rules" name="npa_list_rules" type="text" maxlength="1500" required></td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_data_class') }}</td>
              <td><span data-hint="{{ trans('app.dc_data_class_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <select id="data_class" name="data_class">
                  <option value="0" selected="">{{ trans('app.dc_data_class_select') }}</option>
                  <option value="1">{{ trans('app.dc_data_class_1') }}</option>
                  <option value="2">{{ trans('app.dc_data_class_2') }}</option>
                  <option value="3">{{ trans('app.dc_data_class_3') }}</option>
                </select>
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_date_publication') }}</td>
              <td><span data-hint="{{ trans('app.dc_date_publication') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input name="date_publication" id="date_publication" type="date"></td>
            </tr>


          </tbody>
        </table>



        <div class="is-info__header" style="margin-top: 50px;">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title">{{ trans('app.dc_life') }}</h2>
        </div>


        <table class="table">
          <thead>
            <tr>
              <th style="width: 35%; border: 0px;"></th>
              <th style="width: 5%; border: 0px;"></th>
              <th style="width: 60%; border: 0px;"></th>
            </tr>
          </thead>

          <tbody>

            <tr>
              <td class="table__name">{{ trans('app.dc_info_object') }}</td>
              <td><span data-hint="{{ trans('app.dc_info_object_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="info_object" name="info_object" type="text" maxlength="4000" required></td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_object_used') }}</td>
              <td><span data-hint="{{ trans('app.dc_object_used_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="object_used" name="object_used" type="text" maxlength="590" required></td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_object_change') }}</td>
              <td><span data-hint="{{ trans('app.dc_object_change_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="object_change" name="object_change" type="text" maxlength="590" required></td>
            </tr>

          </tbody>
        </table>


        <div class="is-info__header" style="margin-top: 50px;">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title">{{ trans('app.dc_structure') }}</h2>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th style="width: 35%; border: 0px;"></th>
              <th style="width: 5%; border: 0px;"></th>
              <th style="width: 60%; border: 0px;"></th>
            </tr>
          </thead>

          <tbody>

            <tr>
              <td class="table__name">{!! trans('app.dc_structure_file') !!}</td>
              <td><span data-hint="{!! trans('app.dc_structure_file_t') !!}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <input required name="file_excel"  id="file_excel" type="file" style="cursor: pointer;" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,text/comma-separated-values, text/csv, application/csv">
              </td>
            </tr>
          </tbody>
        </table>


        <!-- Список лиц для согласования -->
        <div class="is-info__header" style="margin-top: 100px; background-color: #0178BC;">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title" style="color: #FFFFFF;">{{ trans('app.mes_employees_list') }}</h2>
        </div>

        @if ( $approve_users->isEmpty() )
          <div class="notice">{{ trans('app.mes_employees_list_empty') }}</div>
        @else


          <table class="table">
            <thead>
              <tr>
                <th style="width: 100%; border: 0px;"></th>
              </tr>
            </thead>

            <tbody>

              <tr>
                <td class="table__status">
                  <div class="is-checkboxes-list">
                    @foreach ($approve_users as $approve_user)
                      <label class="toggle-checkbox">
                        <input type="checkbox" name="approve_users[]" value="{{ $approve_user->id }}">
                        <span></span>
                        <p>{{ $approve_user->surname }} {{ $approve_user->name }} {{ $approve_user->middlename }}</p>
                      </label>
                    @endforeach
                  </div>
                </td>
              </tr>

            </tbody>
          </table>
        
        @endif
        <!--// Список лиц для согласования -->



        <div class="buttons-wrapper" style="border-top: 1px solid #e3e5ec; padding-top: 25px; margin-top: 50px;">
          <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← {{ trans('app.but_cancel') }}</a>
          <button class="btn" type="submit" id="save_draft" name="save_draft" style="font-size: 14px; background: #00317B;">{{ trans('app.but_save') }}</button>
          <button class="btn" type="submit" id="save_send" name="save_send" style="font-size: 14px; background: #0178BC;">{{ trans('app.but_send') }}</button>
        </div>

      </form>

    </div>




  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')

@include ('layouts.ask_question')
<div id="chat" class="chat"></div>
@include ('layouts.search_form')

@endsection


@section('scripts')

<script type="text/javascript">
  $("#go_select").change(function() {
    var go_id = $(this).val();
    var token = $("input[name='_token']").val();

    $.ajax({
      url: "{{ route('datacatalog.getis') }}",
      method: 'POST',
      data: {
        goid: go_id,
        _token: token
      },
      success: function(data) {
        $("#is_select").html(data.options);
      }
    });
  });

  $("#geo").change(function() {
    var geos = $(this).val();

    if ( geos == 1) {
      document.getElementById("geo_type").disabled = false;
    } else {
      document.getElementById("geo_type").disabled = true;
      $("#geo_type").val(0);
    }
  });
</script>


<script type="text/javascript">

  const input = document.querySelector('#input');
  const searchItems = select.querySelectorAll('option');

  input.addEventListener('keypress', function(e) {
    const target = e.target;
    const val = target.value.trim().toUpperCase();
    const fragment = document.createDocumentFragment();

    if (!target.classList.contains('keyboard__key')) return;
    
    for (const elem of searchItems) {
      elem.remove();
      
      if (val === '' || elem.innerText.toUpperCase().includes(val)) {
        fragment.append(elem);
      }
    }

    select.append(fragment);
  })

</script>




<script>
    const datepickerKK = {
        closeText: 'Жабу',
        prevText: 'Алдыңғы',
        nextText: 'Келесі',
        currentText: 'Бүгін',
        monthNames: ['Қаңтар', 'Ақпан', 'Наурыз', 'Сәуір', 'Мамыр', 'Маусым',
            'Шілде', 'Тамыз', 'Қыркүйек', 'Қазан', 'Қараша', 'Желтоқсан'],
        monthNamesShort: ['Қаң', 'Ақп', 'Нау', 'Сәу', 'Мам', 'Мау',
            'Шіл', 'Там', 'Қыр', 'Қаз', 'Қар', 'Жел'],
        dayNames: ['Жексенбі', 'Дүйсенбі', 'Сейсенбі', 'Сәрсенбі', 'Бейсенбі', 'Жұма', 'Сенбі'],
        dayNamesShort: ['жкс', 'дсн', 'ссн', 'срс', 'бсн', 'жма', 'снб'],
        dayNamesMin: ['Жк', 'Дс', 'Сс', 'Ср', 'Бс', 'Жм', 'Сн'],
        weekHeader: 'Не',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    const datepickerRU = {
        closeText: 'Закрыть',
        prevText: 'Пред',
        nextText: 'След',
        currentText: 'Сегодня',
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
            'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн',
            'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
        dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
        dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
        dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        weekHeader: 'Нед',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    }

    // Set datepicker language. Default: en
    jQuery.datepicker.setDefaults( datepickerRU );
</script>

@endsection