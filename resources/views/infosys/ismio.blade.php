@extends('layouts.app')

@section('title'){{ trans('app.is_mio') }} - {{ trans('app.site_title') }}@endsection


@section('header')
@include ('layouts.header')
@endsection

@section('content')
<main class="content">
  
  <section class="geo" style="height: 170px;">
    <div class="geo__bg">
      <picture>
        <source srcset="/assets/images/questions-bg.avif" type="image/avif">
        <source srcset="/assets/images/questions-bg.webp" type="image/webp">
        <img src="/assets/images/questions-bg.jpg" alt="Background">
      </picture>
    </div>

    <div class="container">
      <div class="breadcrumbs breadcrumbs_white">
        <a class="breadcrumbs__home" href="/">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#house"></use>
          </svg>
        </a>
        /
        <span>{{ trans('app.is_mio') }}</span>
      </div>

      <h1 class="page-title">{{ trans('app.is_mio') }}</h1>
    </div>

  </section>

  <div class="container" style="margin-top: 50px;">

    <form method="GET" action="{{ route('infosys.search') }}" class="filter filter_expertise form">
      <div class="filter__search form__field" style="width: 100% !important;">
        <input type="search" name="q" id="q" @if (isset($search_text)) value="{{ $search_text }}" @endif placeholder="Введите любое значение">
      </div>
      <div class="filter__version form__field">
        <button type="submit" class="tabs__button" href="{{ route('expertise.create') }}">Искать</button>
        <input type="hidden" name="search_type" id="search_type" value="ismio">
      </div>
    </form>


    <table class="table">
      <thead>
        <tr>
          <th>Наименование</th>
          <th>Аббревиатура</th>
          <th>Владелец</th>
          <th>Регистрационный номер</th>
          <th>Версия</th>
          <th>Статус эксплуатации</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($infosys as $info)
        <tr>
          <td class="table__name"><a href="{{ route('infosys.info', ['id'=>$info->idis]) }}">{{ $info->name }}</a></td>
          <td class="table__status">{{ $info->AppShortName }}</td>
          <td class="table__status">
            <?php
             if ( isset( $info->getGO($info->ownerId)->name ) ) {
              echo $info->getGO($info->ownerId)->name;
             } else {
              echo "Нет информации";
             }
            ?>
          </td>
          <td class="table__status">{{ $info->regNumber }}</td>
          <td class="table__status">{{ $info->version }}</td>
          <td class="table__status">
            @if ($info->status == "5cf4c17ce8912824cdc2cb70") 
              Не функционирует
            @elseif ($info->status == "5cf4c175e8912824cdc2cb6f") 
              Функционирует
            @else
              Нет информации по эксплуатации
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <br><br>
    Всего: {{ $infosys->total()}}
    {{ $infosys->withQueryString()->links('layouts.pagination.softdeco') }}

  </div> 

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')

  @include ('layouts.ask_question')
  <div id="chat" class="chat"></div>
  @include ('layouts.login_popup')
  @include ('layouts.search_form')

@endsection