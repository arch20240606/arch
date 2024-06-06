@extends('layouts.app')

@section('title')Черновики - {{ trans('app.myreqests') }}@endsection

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
      <span>Запросы на добавление</span>
    </div>

    <h1 class="page-title">Черновики</h1>



    @include ('accounting.reqests.menu')

    @if(session('success'))
    <div class="success-info">
        {{ session('success') }}
    </div>
    @endif


    @if ($drafts->count() > 0 )

      <table class="table table_expertise" style="font-weight: normal; color: #000000;">
        <thead>
          <tr>
            <th style="text-align: center;">IDIS</th>
            <th style="text-align: left;">Наименование</th>
            <th>Тип</th>
            <th>{{ trans('app.tab_go') }}</th>
            <th>Дата создания</th>
            <th>Дата обновления</th>
            <th>Текущий статус</th>
            <th>Действия</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($drafts as $draft)
          <tr>
            <td class="table__status">{{ $draft->id }}</td>
            <td class="table__status" style="text-align: left;"><a href="#">{{ $draft->$names }}</a></td>
            <td class="table__status">{{ $draft->typeis->$names }}</td>
            <td class="table__status">{{ $draft->government->$names }}</td>
            <td class="table__status">{{ date('d.m.Y H:i:s', strtotime( $draft->created_at )) }}</td>
            <td class="table__status">{{ date('d.m.Y H:i:s', strtotime( $draft->updated_at )) }}</td>
            <td class="table__status">
              @if ($draft->status == 1)
                <span style="width: 100%;" class="status status_yes">Утверждено</span>
              @elseif ($draft->status == 2)
                <span style="width: 100%;" class="status status_no">Отклонено</span>
              @else
                @if ($draft->draft == 1)
                  <span style="width: 100%;" class="status">Черновик</span>
                @else
                  <span style="width: 100%;" class="status status_wait">На рассмотрении</span>
                @endif
              @endif
            </td>
          </tr>
        @endforeach

        </tbody>
      </table>

    @else
      <div class="info-box-error" style="margin-bottom: 5px;">В разделе <b>Черновики</b> данные отсутствуют</div>
    @endif




  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')


@endsection