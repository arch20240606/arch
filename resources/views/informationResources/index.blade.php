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
      <span>Оборудования</span>
    </div>

    <h3>Перечень оборудования, имеющегося на балансе государственных органов</h3>

    
  
   
{{-- 
<form class="filter filter_expertise form" method="GET" action="{{ route('bussinessObject.search') }}">
  <div class="filter__search form__field">
    <input type="text" name="query" placeholder="Поиск...">
  </div>
  <div class="filter__type form__field">
  <button class="tabs__button btn" style="border-radius: 8px 8px 8px 8px;" type="submit">Найти</button>
  </div>
</form> --}}

  
  
  
  
  
    
  


    @if ($iss->count() > 0 )

      <table class="table table_expertise" style="font-weight: normal; color: #000000;">
        <thead>
          <tr>
            <th style="text-align: center;">IDIAS</th>
            {{-- <th style="text-align: center;">ID old</th> --}}
            <th style="text-align: left;">Наименование</th>
            <th>Владелец</th>
            <th>Заполнено</th>
            <th>Комментарий</th>
            <th>Дата изменения</th>
            <th>Согласовани</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($iss as $is)
          <tr>
            <td class="table__status">{{$is->idIas}}</td>
            {{-- <td class="table__status">{{ $is->_id }}</td> --}}
            <td class="table__status" style="text-align: left;">
              <a href="{{ route('informationResources.show', ['informationResource' => $is->idIas]) }}">{{ $is->name }}</a>
          </td>
          
            {{-- <td class="table__status" style="text-align: left;"><a href="#">{{ $is->name }}</a></td> --}}
            <td class="table__status">{{$is->gosorg->name}}</td>
            <td class="table__status">{{$is->filledPercentage}}%</td>
            <td class="table__status">{{$is->come }}</td>
            <td class="table__status">{{$is->editDate}}</td>
            <?php
            $date = new DateTime();
            $date->setTimestamp($is->objCreateDate);
            ?>
            {{-- <td class="table__status">{{ date('l dS \o\f F Y h:i:s A', $is->objCreateDate ) }} </td>
            <td class="table__status">{{ $is->objCreateDateString }}</td> --}}
            <td class="table__status">
              @if ($is->bpStatus == "published")
                <span style="width: 100%;" class="status status_yes">Опубликованные</span>
              @elseif ($is->bpStatus == "archive")
                <span style="width: 100%;" class="status status_no">Архивный</span>
              @elseif ($is->bpStatus == "review")
                <span style="width: 100%;" class="status status_wait">На рассмотрении</span>
              @else
                <span style="width: 100%;" class="status">Черновик</span>
              @endif
            </td>
          </tr>
        @endforeach

        </tbody>
      </table>

      <br><br>
      Всего: {{ $iss->total()}}
      {{ $iss->links('layouts.pagination.softdeco') }}

    @else
      <div class="info-box-error" style="margin-bottom: 5px;">В разделе <b>Информационные системы</b> данные отсутствуют</div>
    @endif




  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')


@endsection