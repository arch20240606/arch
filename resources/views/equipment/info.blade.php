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

  
  
  
  
  
    
  



<h4>Просмотр сведений об объекте данных</h4>
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


<div class="is-info__body">
  <form class="form" method="POST" action="asdas">
    <div class="is-info__left is-info__col" style="width:1300px ">
      <div class="is-info__right-header" style="background-color: rgb(45, 45, 239)">Детальная информация</div>
      <div class="is-info__row" style="margin-top: 13px;">
        <p><b>Тип оборудования</b></p>
        <input id="surname" name="surname" value="{{$is->type}}" type="text" disabled>
      </div>
      <div class="is-info__row">
        <p><b>Инвентарный номер актива</b></p>
        <input id="name" name="name" value="{{$is->assetInvNumber}}" type="text" disabled>
      </div>
      <div class="is-info__row">
        <p><b>Серийный номер аппаратного средства</b></p>
        <input id="middlename" name="middlename" value="{{$is->HardwareItemSerialNumber}}" type="text" disabled>
      </div>
      <div class="is-info__row">
        <p><b>Имя</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->name);
        ?>
        <input id="middlename" name="middlename" value="{{$inputValue}}" type="text" disabled>
      </div>
      <div class="is-info__row">
        <p><b>Производитель/линейка</b></p>
        <input id="new_password" name="new_password" value="{{$is->product}}" type="text" disabled>
      </div>
      <div class="is-info__row">
        <p><b>Модель оборудования</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->model);
        ?>
        <input id="new_password" name="new_password" value="{{$inputValue}}" type="text" disabled>
      </div>
      <div class="is-info__row">
        <p><b>Владелец объекта</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->ngrs);
        ?>
        <input id="new_password" name="new_password" value="{{$is->gosorg->name}}" type="text" disabled>
      </div>
      <div class="is-info__row">
        <p><b>Степень износа актива</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->ngrs);
        ?>
        <input id="new_password" name="new_password" value="{{$inputValue}}" type="text" disabled>
      </div>
      <div class="is-info__row">
        <p><b>Владелец актива</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->gosorg->name);
        ?>
        <input id="new_password" name="new_password" value="{{$inputValue}}" type="text" disabled>
      </div>
      <div class="is-info__row">
        <p><b>Модель процессора</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->serverCPUModel);
        ?>
        <input id="new_password" name="new_password" value="{{$inputValue}}" type="text" disabled>
      </div>
      <div class="is-info__row">
        <p><b>Количество процессоров</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->serverCPUAmount);
        ?>
        <input id="new_password" name="new_password" value="{{$inputValue}}" type="text" disabled>
      </div>
      <div class="is-info__row">
        <p><b>Тип используемых модулей ОЗУ</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->serverRAMType);
        ?>
        <input id="new_password" name="new_password" value="{{$inputValue}}" type="text" disabled>
      </div>
      <div class="is-info__row">
        <p><b>Объем ОЗУ</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->serverRAMAmount);
        ?>
        <input id="new_password" name="new_password" value="{{$inputValue}}" type="text" disabled>
      </div>
      <div class="is-info__row">
        <p><b>Тип используемых дисков</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->ngrs);
        ?>
        <input id="new_password" name="new_password" value="{{$is->BusinessObjectType}}" type="text" disabled>
      </div>
      <div class="is-info__row">
        <p><b>Объем хранилища</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->ngrs);
        ?>
        <input id="new_password" name="new_password" value="{{$is->serverStorageAmount}}" type="text" disabled>
      </div>
      <div class="is-info__row">
        <p><b>
          
          Срок гарантийного обслуживания, год</b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->ngrs);
        ?>
        <input id="new_password" name="new_password" value="{{$is->startVersionDateTime}}" type="text" disabled>
      </div>
      <div class="is-info__row">
        <p><b>Договор на приобретение </b></p>
        <?php
        // Удаление квадратных скобок и кавычек из строки
        $inputValue = str_replace(['[', ']', '"'], '', $is->ngrs);
        ?>
        <input id="new_password" name="new_password" value="{{$is->BusinessObjectType}}" type="text" disabled>
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