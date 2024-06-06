@extends('layouts.app')

@section('title'){{ trans('app.myreqests') }}@endsection

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
      <a href="{{ route('accounting.information') }}">{{ trans('app.m_uchet') }}</a>
      /
      <a href="{{ route('integration.index') }}">Интеграции ИС</a>
    </div>

    <h1>Интеграции ИС</h1>

    
  
   

<form class="filter filter_expertise form" method="GET" action="{{ route('integration.search') }}">
  <div class="filter__search form__field">
    <input type="text" name="query" placeholder="Поиск...">
  </div>
  <div class="filter__type form__field">
  <button class="tabs__button btn" style="border-radius: 8px 8px 8px 8px;" type="submit">Найти</button>
  </div>
</form>

  
  
  
  
  
    
  


    @if ($iss->count() > 0 )

      <table class="table table_expertise" style="font-weight: normal; color: #000000;">
        <thead>
          <tr>
            <th style="text-align: center;">IDIN</th>
            <th style="text-align: center;">Цель</th>
            <th style="text-align: center;">Организация, отправляющая данные</th>
            <th style="text-align: left;">Программный продукт, отправляющий данные</th>
            <th>Организация, принимающая данные</th>
            <th>Программный продукт, принимающий данные</th>
            {{-- <th>Дата создания</th>
            <th>Дата обновления</th>
            <th>Текущий статус</th> --}}
          </tr>
        </thead>
        <tbody>

        @foreach ($iss as $is)
          <tr>
            <td class="table__status">{{ $is->idIn }}</td>
            <td class="table__status"><a href="#">{{ $is->purpose }}</a></td>
            <td class="table__status">{{ isset($is->receivingOrg->name) ? $is->receivingOrg->name : '' }}</td>
            <td class="table__status">{{ isset($is->dataReceivingSoftware->name) ? $is->dataReceivingSoftware->name : '' }}</td>
            <td class="table__status">{{ isset($is->gosorg->name) ? $is->gosorg->name : '' }}</td>
            <td class="table__status">{{ isset($is->dataSendingSoftware->name) ? $is->dataSendingSoftware->name : '' }}</td>
            {{-- <td class="table__status" style="text-align: left;"><a href="{{ route('integration.show', ['integration' => $is->idit]) }}">{{ $is->name }}</a> --}}
              <td class="table__status" style="text-align: left;"><a href="#">{{ $is->name }}</a>
            </td>
            <td class="table__status">{{ $is->app_software_type}}</td>
            <td class="table__status">{{ $is->AppShortName }}</td>
          </tr>
        @endforeach

        </tbody>
      </table>

      <br><br>
      Всего: {{ $iss->total()}}
      {{ $iss->links('layouts.pagination.softdeco') }}

    @else
      <div class="info-box-error" style="margin-bottom: 5px;">В разделе <b>Интеграции ИС</b> данные отсутствуют</div>
    @endif




  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')


@endsection