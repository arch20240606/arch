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
      <span>Программное обеспечение</span>
    </div>

    {{-- <h3 class="page-title">Просмотр сведений об объекте данных.</h3> --}}

    
  
   
{{-- 
<form class="filter filter_expertise form" method="GET" action="{{ route('bussinessObject.search') }}">
  <div class="filter__search form__field">
    <input type="text" name="query" placeholder="Поиск...">
  </div>
  <div class="filter__type form__field">
  <button class="tabs__button btn" style="border-radius: 8px 8px 8px 8px;" type="submit">Найти</button>
  </div>
</form> --}}

  
  
  
  
  
    
  


<div class="is-info__header">
  <div class="is-info__header-logo">
    <img src="/assets/images/coordinate-system 1.svg" alt="">
  </div>
  <h2 class="is-info__header-title">
    Текущий статус 
    <span style="font-weight: normal;">
    <?php
    if ($is->bpStatus == 'published') {
        echo 'Зарегистрирован';
    } elseif ($it->bpStatus == 'archive') {
        echo 'Архивный';
    } elseif ($it->bpStatus == 'draft') {
        echo 'Черновик';
    } else {
        echo 'Неизвестный статус';
    }
    ?>
    </span>
  </h2>
</div>

<div style="display: block;"> 
    <div class="is-info__body">
      <form class="form" method="POST" action="asdas">
        <div class="is-info__left is-info__col" style="width:1300px ">
          <div class="is-info__right-header" style="background-color: rgb(9, 71, 242)">Детальная информация</div>
          <div class="is-info__row" style="margin-top: 13px;">
            <p><b>Тип ПО</b></p>
            <input value="{{$is->categoryType}}" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Продукт/версия ПО</b></p>
            <input value="{{$is->product_version}}" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Релиз ПО</b></p>
            <input value="{{$is->releases}}" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Название</b></p>
            <input value="{{$is->name}}" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Владелец</b></p>
            <input value="{{$is->gosorg->name}}" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Заметки</b></p>
            <input value="{{$is->notes}}" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Тип</b></p>
            <input value="{{$is->LicenseType}}" type="text" disabled>
          </div>
          <div class="is-info__row">
            <p><b>Количество</b></p>
            <input value="{{$is->LicenseAmount}}" type="text" disabled>
          </div>
        </div>
      </form>
    </div>

    </div>
</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')


@endsection