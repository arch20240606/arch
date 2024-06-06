@extends('layouts.app')

@section('title'){{ trans('app.profile') }} - {{ trans('app.site_title') }}@endsection

<?php
if ( app()->getLocale() == "ru" ) {
  $name_go = 'name_ru';
} elseif ( app()->getLocale() == "en" ) {
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
      <span>{{ trans('app.profile') }}</span>
    </div>

    <h1 class="page-title">{{ trans('app.profile') }}</h1>
    
    <div style="margin-top: 50px;">
      <h2 style="color: #0075ff;">{{ Auth::user()->surname }} {{ Auth::user()->name }} {{ Auth::user()->middlename }}</h2>
      <p><b>Организация:</b> {{ Auth::user()->government->$name_go }}</p>
    </div>




  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')

@include ('layouts.ask_question')
<div id="chat" class="chat"></div>
@include ('layouts.search_form')

@endsection