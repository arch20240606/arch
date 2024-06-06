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

    <h1 class="page-title">{{ trans('app.catalog') }}</h1> Согласование паспорта данных

    @include ('datacatalog.index_menu')


    @if(!empty($successMsg))
      <div class="success-info">{!! $successMsg !!}</div>
    @endif

    @if(!empty($errorMsg))
      <div class="info-box-error"><b>{{ trans('app.reg_error') }}:</b> {!! $errorMsg !!}</div>
    @endif



    <div class="is-info">

      <form class="form" method="POST" action="{{ route('datacatalog.update', ['datacatalog' => $passport->id]) }}">
        @csrf
        @method('PATCH')

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
              <th style="width: 40%; border: 0px;"></th>
              <th style="width: 60%; border: 0px;"></th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td class="table__name">{{ trans('app.dc_name_go') }}</td>
              <td class="table__name">{{ $passport->government->$name_go }}</td>
            </tr>
            
            <tr>
              <td class="table__name">{{ trans('app.dc_name_is') }}</td>
              <td class="table__name">{{ $passport->information_system->$name_go }}</td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_data_used') }}</td>
              <td class="table__name">
                @if ( $passport->data_used == 1 )
                  {{ trans('app.dc_republic') }}
                @elseif ( $passport->data_used == 2 )
                  {{ trans('app.dc_local') }}
                @else
                  {{ trans('app.no') }}
                @endif
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_data_enter') }}</td>
              <td class="table__name">
                @if ( $passport->data_enter == 1 )
                  {{ trans('app.dc_data_enter_letter') }}
                @elseif ( $passport->data_enter == 2 )
                  {{ trans('app.dc_data_enter_electro') }}
                @elseif ( $passport->data_enter == 3 )
                  {{ trans('app.dc_data_enter_combo') }}
                @else
                  {{ trans('app.no') }}
                @endif
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_data_form') }}</td>
              <td class="table__status">
                <div class="is-checkboxes">
                  <label class="toggle-checkbox">
                    <input disabled type="checkbox" id="data_first" name="data_first" @if ($passport->data_first == "on") checked @endif>
                    <span></span>
                    <p>{{ trans('app.dc_data_first') }}</p>
                  </label>
                  <label class="toggle-checkbox">
                    <input disabled type="checkbox" id="data_agregate" name="data_agregate" @if ($passport->data_agregate == "on") checked @endif>
                    <span></span>
                    <p>{{ trans('app.dc_data_agregate') }}</p>
                  </label>
                </div>
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_data_access') }}</td>
              <td class="table__status">
                <div class="is-checkboxes">
                  <label class="toggle-checkbox">
                    <input disabled type="checkbox" name="data_access_only" @if ($passport->data_access_only == "on") checked @endif>
                    <span></span>
                    <p>{{ trans('app.dc_data_access_only') }}</p>
                  </label>
                  <label class="toggle-checkbox">
                    <input disabled type="checkbox" name="data_access_free" @if ($passport->data_access_free == "on") checked @endif>
                    <span></span>
                    <p>{{ trans('app.dc_data_access_free') }}</p>
                  </label>
                </div>
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_users_npa') }}</td>
              <td class="table__name">{{ $passport->users_npa }}</td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_data_source') }}</td>
              <td class="table__name">{{ $passport->data_source }}</td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_data_source_fact') }}</td>
              <td class="table__name">{{ $passport->data_source_fact }}</td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_object_description') }}</td>
              <td class="table__name">
                @if ( $passport->object_description == 1 )
                  {{ trans('app.dc_object_description_fiz') }}
                @elseif ( $passport->object_description == 2 )
                  {{ trans('app.dc_object_description_ur') }}
                @elseif ( $passport->object_description == 3 )
                  {{ trans('app.dc_object_description_imush') }}
                @elseif ( $passport->object_description == 4 )
                  {{ trans('app.dc_object_description_result') }}
                @elseif ( $passport->object_description == 5 )
                  {{ trans('app.dc_object_description_oxrana') }}
                @elseif ( $passport->object_description == 6 )
                  {{ trans('app.dc_object_description_blaga') }}
                @else
                  {{ trans('app.no') }}
                @endif
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_interval_update') }}</td>
              <td class="table__name">
                @if ( $passport->interval_update == 1 )
                  {{ trans('app.dc_interval_update_no') }}
                @elseif ( $passport->interval_update == 2 )
                  {{ trans('app.dc_interval_update_need') }}
                @elseif ( $passport->interval_update == 3 )
                  {{ trans('app.dc_interval_update_data') }}
                @elseif ( $passport->interval_update == 4 )
                  {{ trans('app.dc_interval_update_refresh') }}
                @elseif ( $passport->interval_update == 5 )
                  {{ trans('app.dc_interval_update_npa') }}
                @else
                  {{ trans('app.no') }}
                @endif
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_graphic_update') }}</td>
              <td class="table__name">
                @if ( $passport->graphic_update == 1 )
                  {{ trans('app.dc_graphic_update_time') }}
                @elseif ( $passport->graphic_update == 2 )
                  {{ trans('app.dc_graphic_update_data') }}
                @elseif ( $passport->graphic_update == 3 )
                  {{ trans('app.dc_graphic_update_npa') }}
                @elseif ( $passport->graphic_update == 4 )
                  {{ trans('app.dc_graphic_update_no') }}
                @else
                  {{ trans('app.no') }}
                @endif
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_update_rules') }}</td>
              <td class="table__name">{{ $passport->update_rules }}</td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_geo') }}</td>
              <td class="table__name">
                @if ( $passport->geo == 1 )
                  {{ trans('app.yes') }}
                @else
                  {{ trans('app.no') }}
                @endif
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_geo_type') }}</td>
              <td class="table__name">
                @if ( $passport->geo_type == 1 )
                  {{ trans('app.dc_geo_type_dot') }}
                @elseif ( $passport->geo_type == 2 )
                  {{ trans('app.dc_geo_type_line') }}
                @elseif ( $passport->geo_type == 3 )
                  {{ trans('app.dc_geo_type_poly') }}
                @else
                  {{ trans('app.no') }}
                @endif
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_npa_list') }}</td>
              <td class="table__name">{{ $passport->npa_list }}</td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_npa_list_reglament') }}</td>
              <td class="table__name">{{ $passport->npa_list_reglament }}</td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_npa_list_rules') }}</td>
              <td class="table__name">{{ $passport->npa_list_rules }}</td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_data_class') }}</td>
              <td class="table__name">
                @if ( $passport->data_class == 1 )
                  {{ trans('app.dc_data_class_1') }}
                @elseif ( $passport->data_class == 2 )
                  {{ trans('app.dc_data_class_2') }}
                @elseif ( $passport->data_class == 3 )
                  {{ trans('app.dc_data_class_3') }}
                @else
                  {{ trans('app.no') }}
                @endif
              </td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_date_publication') }}</td>
              <td class="table__name">{{ $passport->date_publication }}</td>
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
              <th style="width: 40%; border: 0px;"></th>
              <th style="width: 60%; border: 0px;"></th>
            </tr>
          </thead>

          <tbody>

            <tr>
              <td class="table__name">{{ trans('app.dc_info_object') }}</td>
              <td class="table__name">{{ $passport->info_object }}</td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_object_used') }}</td>
              <td class="table__name">{{ $passport->object_used }}</td>
            </tr>

            <tr>
              <td class="table__name">{{ trans('app.dc_object_change') }}</td>
              <td class="table__name">{{ $passport->object_change }}</td>
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
              <th style="width: 40%; border: 0px;"></th>
              <th style="width: 60%; border: 0px;"></th>
            </tr>
          </thead>

          <tbody>

            <tr>
              <td class="table__name">{!! trans('app.dc_structure_file') !!}</td>
              <td class="table__name"><a href="/storage/{{ $passport->file_excel_upload }}">{{ $passport->file_excel }}</a></td>
            </tr>

          </tbody>
        </table>


        <div class="is-info__header" style="margin-top: 50px; margin-bottom: 25px; background-color: #0178BC;">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title" style="color: #FFFFFF;">{{ trans('app.mes_comment_finalize') }}</h2>
        </div>

        <textarea id="comment" name="comment">{{ $passport->comment }}</textarea>



        <div class="buttons-wrapper" style="border-top: 1px solid #e3e5ec; padding-top: 25px; margin-top: 50px;">
          <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← {{ trans('app.but_cancel') }}</a>
          <button class="btn" type="submit" id="passport_accepted" name="passport_accepted" style="font-size: 14px; background: #00317B;">Утвердить паспорт</button>
          <button class="btn" type="submit" id="passport_discarted" name="passport_discarted" style="font-size: 14px; background: #bc2601;">{{ trans('app.tab_send_finalized') }}</button>
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


