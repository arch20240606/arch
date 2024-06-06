@extends('layouts.app')

@section('title'){{ trans('app.d_outbox') }}: {{ trans('app.catalog') }} - {{ trans('app.site_title') }}@endsection

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
      <span>{{ trans('app.d_outbox') }}</span>
    </div>

    <h1 class="page-title">{{ trans('app.catalog') }}</h1>

    @include ('datacatalog.index_menu')





    @if ( $passports->isEmpty() )
      <div class="notice">В разделе <b>{{ trans('app.d_outbox') }}</b> отсутствуют данные</div>
    @else

      <table class="table table_expertise">
        <thead>
        <tr>
          <th>IDP</th>
          <th>{{ trans('app.tab_go') }}</th>
          <th>{{ trans('app.tab_is') }}</th>
          <th>{{ trans('app.tab_level') }}</th>
          <th>{{ trans('app.tab_choise') }}</th>
          <th>{{ trans('app.dc_date_publication') }}</th>
          <th>{{ trans('app.tab_status') }}</th>
        </tr>
        </thead>
        <tbody>

          @foreach ($passports as $passport)

          <tr>
            <td class="table__status" style="text-align: center;">{{ $passport->id }}</td>
            <td class="table__status" style="text-align: left;">{{ $passport->government->$name_go }}</td>
            <td class="table__status">{{ $passport->information_system->name_ru }}</td>
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

            <td class="table__status">{{ date('d.m.Y H:i:s', strtotime( $passport->created_at )) }}</td>
            
            <td class="table__status">
              @if ($passport->accepted == 1)
                <span style="width: 100%;" class="status status_yes">Утверждено</span>
              @else

                <?php
                  $emps = json_decode($passport->approve_users);
                  $emps_list = "";

                  foreach ($emps as $emp) {
                    $emps_list .= $passport->getUser($emp)->surname.' '.$passport->getUser($emp)->name.' '.$passport->getUser($emp)->middlename.'&#013;';
                  }
                ?>
                
                <span style="width: 100%; cursor: pointer;" class="status status_wait" title="{!! $emps_list !!}">На утверждении</span>
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