@extends('layouts.app')

@section('title')Административный раздел - {{ trans('app.site_title') }}@endsection

<?php
if ( app()->getLocale() == "ru" ) {
  $names = 'name_ru';
} elseif ( app()->getLocale() == "en" ) {
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
    </div>

    <h1 class="page-title" style="margin-bottom: 50px;">Административный раздел</h1>

    @include ('administrator.menu')


    <h3>Список пользователей  ( всего {{ $users->total()}} )</h3>

    <form class="filter filter_expertise form" method="GET" action="{{ route('administrator.user.search') }}">
      <div class="filter__search form__field">
        <input type="search" @if (isset($search_text)) value="{{ $search_text }}" @endif name="q" id="q" placeholder="Поиск">
      </div>
      <div class="form__field" style="width: 100% !important;">
        <select id="go_select" name="go_select">
          <option value="" selected>Государственный орган</option>
          @foreach ($governments as $government)
          <option value="{{ $government->id }}">{{ $government->$names }}</option>
          @endforeach
        </select>
      </div>
      <div class="filter__type form__field">
      <button class="tabs__button btn" style="border-radius: 8px 8px 8px 8px;" type="submit">Найти</button>
      </div>
    </form>


    <table class="table table_expertise" style="font-weight: normal; color: #000000;">
      <thead>
      <tr>
        <th style="text-align: center;">ID</th>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>E-mail</th>
        <th>Государственный орган</th>
        <th>Дата регистрации</th>
        <th>Статус</th>
      </tr>
      </thead>
      <tbody>

        @foreach ($users as $user)

        <tr>
          <td class="table__status">{{ $user->id }}</td>
          <td class="table__status">{{ $user->surname }}</td>
          <td class="table__status">{{ $user->name }}</td>
          <td class="table__status">{{ $user->middlename }}</td>
          <td class="table__status"><a href="{{ route('administrator.edit', ['administrator' => $user->id]) }}">{{ $user->email }}</a></td>
          <td class="table__status">{{ $user->government->$names }}</td>
          <td class="table__status">{{ date('d.m.Y H:i:s', strtotime( $user->created_at )) }}</td>
          <td class="table__status">
            @if ($user->activity == 1 )
              <span style="width: 100%;" class="status status_yes">Активирован</span>
            @else
              <span style="width: 100%;" class="status status_no">Не активирован</span>
            @endif
          </td>
        </tr>

        @endforeach



      </tbody>
    </table>



    {{ $users->links('layouts.pagination.softdeco') }}




  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')

@endsection