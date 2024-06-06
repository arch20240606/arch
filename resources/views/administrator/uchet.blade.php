@extends('layouts.app')

@section('title')Административный раздел - {{ trans('app.site_title') }}@endsection

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
      <a href="{{ route('administrator.index') }}">Административный раздел</a>
      /
      Список данных учета сведений
    </div>

    <h1 class="page-title" style="margin-bottom: 50px;">Административный раздел</h1>

    @include ('administrator.menu')

    <h3>Список данных учета сведений ( всего {{ $infosyses->total()}} )</h3>

    <!--
    <form class="filter filter_expertise form">
      <div class="filter__search form__field">
        <input type="search" name="budget-search" placeholder="Поиск">
      </div>
      <div class="filter__type form__field">
        <select name="search-year">
          <option value="" selected>Государственный орган</option>
        </select>
      </div>
      <div class="filter__version form__field">
        <select name="search-status">
          <option value="" selected>Статус</option>
          <option value="Черновик">Черновик </option>
          <option value="На утверждении">На утверждении</option>
          <option value="На согласовании">На согласовании</option>
          <option value="Согласовано">Согласовано</option>
        </select>
      </div>

    </form>
    -->

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
        </tr>
      </thead>
      <tbody>

        @foreach ($infosyses as $infosys)

        <tr>
          <td class="table__status">{{ $infosys->id }}</td>
          <td class="table__status" style="text-align: left;"><a href="{{ route('administrator.uchet_edit', ['id'=>$infosys->id]) }}">{{ $infosys->$names }}</a></td>
          <td class="table__status">{{ $infosys->typeis->$names }}</td>
          <td class="table__status">{{ $infosys->government->$names }}</td>
          <td class="table__status">{{ date('d.m.Y H:i:s', strtotime( $infosys->created_at )) }}</td>
          <td class="table__status">{{ date('d.m.Y H:i:s', strtotime( $infosys->updated_at )) }}</td>
          <td class="table__status">
            @if ($infosys->status == 1)
              <span style="width: 100%;" class="status status_yes">Утверждено</span>
            @elseif ($infosys->status == 2)
              <span style="width: 100%;" class="status status_no">Отклонено</span>
            @else
              <span style="width: 100%;" class="status status_wait">На рассмотрении</span>
            @endif
          </td>
        </tr>

        @endforeach



      </tbody>
    </table>



    {{ $infosyses->links('layouts.pagination.softdeco') }}





  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')

@endsection