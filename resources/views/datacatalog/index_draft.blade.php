@extends('layouts.app')

@section('title'){{ trans('app.d_draft') }}: {{ trans('app.catalog') }} - {{ trans('app.site_title') }}@endsection

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
      <span>{{ trans('app.d_draft') }}</span>
    </div>

    <h1 class="page-title">{{ trans('app.catalog') }}</h1>

    @include ('datacatalog.index_menu')

    
    

    @if ( $passports->isEmpty() )
      <div class="notice">В разделе <b>{{ trans('app.d_draft') }}</b> отсутствуют данные</div>
    @else

      <table class="table table_expertise">
        <thead>
        <tr>
          <th>IDP</th>
          <th>{{ trans('app.tab_go') }}</th>
          <th>{{ trans('app.tab_is') }}</th>
          <th>{{ trans('app.tab_autor') }}</th>
          <th>{{ trans('app.tab_level') }}</th>
          <th>{{ trans('app.tab_choise') }}</th>
          <th>{{ trans('app.tab_status') }}</th>
          <th>{{ trans('app.tab_date_application') }}</th>
          <th>{{ trans('app.tab_action') }}</th>
        </tr>
        </thead>
        <tbody>

          @foreach ($passports as $passport)

          <tr>
            <td class="table__status">{{ $passport->id }}</td>
            <td class="table__status" style="text-align: left;">{{ $passport->government->$name_go }}</td>
            <td class="table__status">{{ $passport->information_system->name_ru }}</td>
            <td class="table__status">{{ $passport->user->surname }} {{ $passport->user->name }} {{ $passport->user->middlename }}</td>
            <td class="table__status">
              @if ( $passport->data_used == 1)
                {{ trans('app.dc_republic') }}
              @elseif ( $passport->data_used == 2)
                {{ trans('app.dc_local') }}
              @else
              {{ trans('app.no') }}
              @endif
            </td>
            <td class="table__status">
              @if ( $passport->data_enter == 1)
                {{ trans('app.dc_data_enter_letter') }}
              @elseif ( $passport->data_enter == 2)
                {{ trans('app.dc_data_enter_electro') }}
              @elseif ( $passport->data_enter == 3)
                {{ trans('app.dc_data_enter_combo') }}
              @else
                {{ trans('app.no') }}
              @endif
            </td>
            
            <td class="table__status">
              @if ( $passport->discarted == 1)
                <span style="width: 100%" class="status status_no">Отклонено ГО</span>
              @else
                @if ( $passport->discarted_go == 1)
                  <span style="width: 100%" class="status status_no">На доработке</span>
                @else
                  <span style="width: 100%" class="status status_edit">{{ trans('app.tab_onwork') }}</span>
                @endif
              @endif
            </td>

            <td class="table__status">{{ date('d.m.Y H:i:s', strtotime( $passport->created_at )) }}</td>
            
            <td class="table__status">
              @if($passport->user_id == Auth::user()->id )
                <div style="display: flex; position: center;">
                  <a href="{{ route('datacatalog.edit', ['datacatalog' => $passport->id]) }}" class="feather" title="{{ trans('app.edit') }}">
                    <svg>
                      <use href="/assets/images/feather-sprite.svg#edit"/>
                    </svg>
                  </a>

                  &nbsp;&nbsp;&nbsp;

                  <a href="{{ route('datacatalog.destroy', ['datacatalog' => $passport->id]) }}" class="feather" title="{{ trans('app.delete') }}">
                    <svg style="stroke: #b1073a">
                      <use href="/assets/images/feather-sprite.svg#trash"/>
                    </svg>
                  </a>
                </div>
              @endif
            </td>
          </tr>

          @endforeach



        </tbody>
      </table>

      {{ $passports->links('layouts.pagination.softdeco') }}


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
@include ('layouts.search_form')

@endsection