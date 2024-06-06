@extends('layouts.app')

@section('title'){{ trans('app.expert') }} - {{ trans('app.site_title') }}@endsection

<?php
if (app()->getLocale() == "ru") {
  $name_go = 'name_ru';
} elseif (app()->getLocale() == "en") {
  $name_go = 'name_en';
} else {
  $name_go = 'name_kz';
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
      <a href="{{ route('expertise.index') }}">{{ trans('app.m_expert') }}</a>
      /
      <a href="{{ route('expertise.create') }}">Создание запроса на экспертизу</a>
      /
      <span>Создание нового IT-проекта</span>
    </div>

    <h1 class="page-title">Создание нового IT-проекта</h1>


    @include ('expertise.menu')

    @if(!empty($successMsg))
    <div class="success-info">{!! $successMsg !!}</div>
    @endif

    @if(!empty($errorMsg))
    <div class="info-box-error"><b>{{ trans('app.reg_error') }}:</b> {!! $errorMsg !!}</div>
    @endif





    <div class="is-info">

      <form class="form" enctype="multipart/form-data" method="POST" action="{{ route('expertise.store') }}">
        @csrf

        <div class="is-info__header">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title">Укажите название IT-проекта на трех языках</span></h2>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th style="width: 20%; border: 0px;"></th>
              <th style="width: 80%; border: 0px;"></th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td>На государственном</td>
              <td><input class="form__field" id="name_kz" name="name_kz" type="text" minlength="5" maxlength="600" required tabindex="1" autofocus></td>
            </tr>

            <tr>
              <td>На русском</td>
              <td><input class="form__field" id="name_ru" name="name_ru" type="text" minlength="5" maxlength="600" required tabindex="2"></td>
            </tr>

            <tr>
              <td>На английском</td>
              <td><input class="form__field" id="name_en" name="name_en" type="text" minlength="5" maxlength="600" required tabindex="3"></td>
            </tr>


          </tbody>
        </table>
        
          <div class="buttons-wrapper" style="border-top: 1px solid #e3e5ec; padding-top: 25px; margin-top: 50px;">
            <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← {{ trans('app.but_cancel') }}</a>
            <button class="btn" type="submit" id="create_it" name="create_it" style="font-size: 14px; background: #00317B;">Создать</button>
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
