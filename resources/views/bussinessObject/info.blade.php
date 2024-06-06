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
      <span>Объекты данных</span>
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

  
  
  
  
  
    
  


<hr>
<h4>Просмотр сведений об объекте данных.</h4>


<div class="is-info__body">
  <form class="form" method="POST" action="asdas">
    <div class="is-info__left is-info__col" style="width:1300px ">
      <div class="is-info__right-header" style="background-color: rgb(45, 45, 239)">Детальная информация</div>
      <div class="is-info__row" style="margin-top: 13px;">
        <p><b>Наименование объекта данных</b></p>
        <input id="surname" name="surname" value="{{$is->name}}" type="text" minlength="2" maxlength="255" required>
      </div>
      <div class="is-info__row">
        <p><b>Владелец</b></p>
        <input id="name" name="name" value="{{$is->gosorg->name}}" type="text" minlength="2" maxlength="255" required>
      </div>
      <div class="is-info__row">
        <p><b>Описание объекта данных</b></p>
        <input id="middlename" name="middlename" value="{{$is->BusinessObjectDescription}}" type="text" minlength="2" maxlength="255">
      </div>
      <div class="is-info__row">
        <p><b>Синонимы объекта данных</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->BusinessObjectSynonyms);
        ?>
        <input id="middlename" name="middlename" value="{{$inputValue}}" type="text" minlength="2" maxlength="255">
      </div>
      <div class="is-info__row">
        <p><b>Вид объекта данных</b></p>
        <input id="new_password" name="new_password" value="{{$is->BusinessObjectType}}" type="text" minlength="8" maxlength="16">
      </div>
      <div class="is-info__row">
        <p><b>Разновидности объекта данных</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->BusinessObjectVariants);
        ?>
        <input id="new_password" name="new_password" value="{{$inputValue}}" type="text" minlength="8" maxlength="16">
      </div>
      <div class="is-info__row">
        <p><b>Нормативно-правовые акты</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->ngrs);
        ?>
        <a href="https://adilet.zan.kz/rus/docs/{{$inputValue}}">adilet.zan.kz/rus/docs/{{$inputValue}}</a>
      </div>
    </div>
  </form>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')


@endsection