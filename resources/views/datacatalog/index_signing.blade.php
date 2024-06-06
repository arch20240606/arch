@extends('layouts.app')

@section('title'){{ trans('app.d_signing') }}: {{ trans('app.catalog') }} - {{ trans('app.site_title') }}@endsection

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
      <span>{{ trans('app.d_signing') }}</span>
    </div>

    <h1 class="page-title">{{ trans('app.catalog') }}</h1>

    @include ('datacatalog.index_menu')

    @if ( $passports->isEmpty() )
      <div class="notice">В разделе <b>{{ trans('app.d_signing') }}</b> отсутствуют данные</div>
    @else

    <table class="table table_expertise">
      <thead>
      <tr>
        <th>IDP</th>
        <th>{{ trans('app.tab_go') }}</th>
        <th>{{ trans('app.tab_is') }}</th>
        <th>{{ trans('app.tab_autor') }}</th>
        <th>{{ trans('app.tab_status') }}</th>
        <th>{{ trans('app.tab_date_application') }}</th>
        <th>{{ trans('app.tab_action') }}</th>
      </tr>
      </thead>
      <tbody>

        @foreach ($passports as $passport)

        <tr>
          <td class="table__status" style="text-align: center;">{{ $passport->id }}</td>
          <td class="table__status" style="text-align: left;">{{ $passport->government->$name_go }}</td>
          <td class="table__status"><a href="{{ route ('datacatalog.show', ['datacatalog' => $passport->id]) }}">{{ $passport->information_system->name_ru }}</a></td>
          <td class="table__status">{{ $passport->user->surname }} {{ $passport->user->name }} {{ $passport->user->middlename }}</td>

          <td class="table__status">
            @if ($passport->accepted_go == 1)
              <span style="width: 100%;" class="status status_yes">Согласовано</span>
            @elseif ($passport->discarted_go == 1)
              <span style="width: 100%;" class="status status_no">Возвращено ГО</span>
            @else
              <span style="width: 100%;" class="status status_wait">Ожидание согласования</span>
            @endif
          </td>
          <td class="table__status">{{ date('d.m.Y H:i:s', strtotime( $passport->accepted_at )) }}</td>
          <td class="table__status">

            @if ($passport->accepted_go != 1)
              <div style="display: flex; position: center;">

                <a href="{{ route('datacatalog.signingedit', ['id' => $passport->id]) }}" class="feather" title="{{ trans('app.edit') }}">
                  <svg>
                    <use href="/assets/images/feather-sprite.svg#edit"/>
                  </svg>
                </a>

                &nbsp;&nbsp;&nbsp;

                <a href="" class="feather" title="{{ trans('app.delete') }}">
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