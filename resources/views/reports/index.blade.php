{{-- @extends('layouts.app')

@section('title'){{ trans('app.m_otchet') }} - {{ trans('app.site_title') }}@endsection

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
      <a href="{{ route('reports.index') }}">{{ trans('app.m_otchet') }}</a>
      <!--
      /
      <span>{{ trans('app.d_catalog') }}</span>
      -->
    </div>

    <h1 class="page-title">{{ trans('app.m_otchet') }}</h1>







    <form class="filter form" method="GET" action="{{ route('reports.search') }}" style="justify-content: normal; margin: 0; margin-top: 25px;">

      <div class="form__field" style="width: 100%">
        <input type="text" name="q" style="width: 100%" placeholder="Поиск" @if (isset($search_text)) value="{{ $search_text }}" @endif>
      </div>
      <div class="form__field  buttons-wrapper">
        <button class="tabs__button btn" style="font-size: 14px; background: #727FA2; width: 120px;" type="submit">Поиск</button>
      </div>

    </form>




    <form class="filter form" method="GET" action="{{ route('reports.search') }}" style="justify-content: end; margin: 0; margin-bottom: 25px;">

      <div class="filter__type form__field">
        <select name="report_type" required>
          <option value="1" selected>Информационнные системы</option>
        </select>
      </div>
    
      <div class="form__field">
        <select name="report_go">
          <option value="" selected>Выберите государственный орган</option>
          @foreach ($govs as $gov)
            @if ( isset($_GET['report_go']) )
              <option value="{{ $gov->id }}" @if( $gov->id == $_GET['report_go'] ) selected @endif>{{ $gov->$names }}</option>
            @else
              <option value="{{ $gov->id }}">{{ $gov->$names }}</option>
            @endif
          @endforeach
        </select>
      </div>

      <div class="filter__status form__field" style="min-width: 170px;">
        <select name="report_status">
          <option value="1" selected>Действующий</option>
        </select>
      </div>

      <div class="form__field buttons-wrapper">
        <button class="tabs__button btn" name="show_report" id="show_report" type="submit" style="width: 120px; font-size: 14px;">Показать</button>
      </div>

      <div class="form__field buttons-wrapper">
        <button class="tabs__button btn" name="export_report" id="export_report" type="submit" style="width: 120px; font-size: 14px; background: #00317B;">Экспорт</button>
      </div>

    </form>




    <table class="table table_requests">
      <thead>
        <tr>
          <th>Наименование</th>
          <th style="text-align: left;">Государственный орган</th>
          <th>Аббревиатура</th>
          <th>Статус</th>
          <th>ЦГО/МИО</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($ios as $io)
          <tr>
            <td class="table__name"><a href="#">{{ $io->$names }}</a></td>
            <td class="table__name">{{ $io->government->$names }}</td>
            <td class="table__status">{{ $io->abbreviation }}</td>
            <td class="table__status"><span class="status status_yes">Действующий</span></td>
            <td class="table__status">{{ $io->cgo_mio }}</td>
          </tr>
        @endforeach
        
      </tbody>
    </table>

    
    <br>
    <div style="font-size: 14px;"><b>Всего:</b> {{ $ios->total() }}</div>
    {{ $ios->withQueryString()->links('layouts.pagination.softdeco') }}
    












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

@endsection --}}






@extends('layouts.app')

@section('title'){{ trans('app.m_otchet') }} - {{ trans('app.site_title') }}@endsection

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
      <a href="{{ route('reports.index') }}">{{ trans('app.m_otchet') }}</a>
    </div>

    <h1 class="page-title">{{ trans('app.m_otchet') }}</h1>

    <form class="filter form" method="GET" action="{{ route('reports.search') }}" style="justify-content: normal; margin: 0; margin-top: 25px;">

      <div class="form__field" style="width: 100%">
        <input type="text" name="q" style="width: 100%" placeholder="Поиск" @if (isset($search_text)) value="{{ $search_text }}" @endif>
      </div>
      <div class="form__field  buttons-wrapper">
        <button class="tabs__button btn" style="font-size: 14px; background: #727FA2; width: 120px;" type="submit">Поиск</button>
      </div>

    </form>

    <form class="filter form" method="GET" action="{{ route('reports.search') }}" style="justify-content: end; margin: 0; margin-bottom: 25px;">

      <div class="filter__type form__field">
        <select name="report_type" required>
          <option value="1" selected>Информационнные системы</option>
        </select>
      </div>
    
      <div class="form__field">
        <select name="report_go">
          <option value="" selected>Выберите государственный орган</option>
          @foreach ($govs as $gov)
            @if ( isset($_GET['report_go']) )
              <option value="{{ $gov->id }}" @if( $gov->id == $_GET['report_go'] ) selected @endif>{{ $gov->$names }}</option>
            @else
              <option value="{{ $gov->id }}">{{ $gov->$names }}</option>
            @endif
          @endforeach
        </select>
      </div>

      <div class="filter__status form__field" style="min-width: 170px;">
        <select name="report_status">
          <option value="1" selected>Действующий</option>
        </select>
      </div>

      <div class="form__field buttons-wrapper">
        <button class="tabs__button btn" name="show_report" id="show_report" type="submit" style="width: 120px; font-size: 14px;">Показать</button>
      </div>

      <div class="form__field buttons-wrapper">
        <button class="tabs__button btn" name="export_report" id="export_report" type="submit" style="width: 120px; font-size: 14px; background: #00317B;">Экспорт</button>
      </div>

    </form>

    <table class="table table_requests">
      <thead>
        <tr>
          <th>Наименование</th>
          <th style="text-align: left;">Государственный орган</th>
          <th>Аббревиатура</th>
          <th>Статус</th>
          <th>ЦГО/МИО</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($ios as $io)
    <tr>
        {{-- <td class="table__name"><a href="{{ route ('accounting.show', ['accounting' => $io->first()->idis]) }}">{{ $io->$names }}</a></td> --}}
        <td class="table__name"><a href="#">{{ $io->$names }}</a></td>
        <td class="table__name">{{ $io->government->$names }}</td>
        <td class="table__status">{{ $io->abbreviation }}</td>
        <td class="table__status"><span class="status status_yes">Действующий</span></td>
        <td class="table__status">{{ $io->cgo_mio }}</td>
    </tr>
@endforeach

      </tbody>
    </table>
    
    <br>
    <div style="font-size: 14px;"><b>Всего:</b> {{ $ios->total() }}</div>
    {{ $ios->withQueryString()->links('layouts.pagination.softdeco') }}
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
