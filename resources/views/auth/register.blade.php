@extends('layouts.app')

@section('title'){{ trans('app.registration') }} - {{ trans('app.site_title') }}@endsection

<?php
if (app()->getLocale() == "ru") {
  $name_go = 'name_ru';
} elseif (app()->getLocale() == "en") {
  $name_go = 'name_en';
} else {
  $name_go = 'name_kz';
}
?>


@section('content')
<div>
  <a class="header__logo logo" href="/{{ app()->getLocale() }}/" style="top: 6%;">
    <p class="logo__name" style="color: #FFFFFF"><img src="/logos/logo_grey_{{ app()->getLocale() }}.png" height="45" alt="{{ trans('app.site_title') }}" title="{{ trans('app.site_title') }}"></p>
  </a>
</div>

<main class="content">
  <section>
    <div class="intro__bg">
      <picture>
        <source srcset="/assets/images/intro-bg.avif" type="image/avif">
        <source srcset="/assets/images/intro-bg.webp" type="image/webp">
        <img src="/assets/images/intro-bg.jpg" alt="Background" style="height: 100vh">
      </picture>
    </div>
  </section>
</main>



<div>
  
  <div class="registration__block">
    <div>
      <div class="popup__title" style="padding-top: 20px;">{{ trans('app.reg_new_user') }}</div>

      <form class="form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="registration__form">
          <div class="form__field" style="padding-right: 20px;">
            <label class="form__label" for="surname" style="color: #055698;">{{ trans('app.reg_surname') }}</label>
            <input type="text" name="surname" id="surname" pattern="[А-Яа-яЁёӘҒҚҢӨҰҮҺІәғқңөұүһі\s\-]+" placeholder="{{ trans('app.reg_enter_surname') }}" required autofocus @if(!empty($reg_surname)) value="{{ $reg_surname }}" @endif>
          </div>
          <div class="form__field" style="padding-left: 20px;">
            <label class="form__label" for="name" style="color: #055698;">{{ trans('app.reg_name') }}</label>
            <input type="text" name="name" id="name" pattern="[А-Яа-яЁёӘҒҚҢӨҰҮҺІәғқңөұүһі\s\-]+" placeholder="{{ trans('app.reg_enter_name') }}" required autofocus @if(!empty($reg_name)) value="{{ $reg_name }}" @endif>
          </div>
          <div class="form__field" style="padding-right: 20px;">
            <label class="form__label" for="middlename" style="color: #055698;">{{ trans('app.reg_middlename') }}</label>
            <input type="text" name="middlename" id="middlename" pattern="[А-Яа-яЁёӘҒҚҢӨҰҮҺІәғқңөұүһі\s\-]+" placeholder="{{ trans('app.reg_enter_middlename') }}" autofocus @if(!empty($reg_middlename)) value="{{ $reg_middlename }}" @endif>
          </div>
          <div class="form__field" style="padding-left: 20px;">
            <label class="form__label" for="email" style="color: #055698;">{{ trans('app.reg_email') }}</label>
            <input type="text" name="email" id="email" placeholder="{{ trans('app.reg_enter_email') }}" required autofocus @if(!empty($reg_email)) value="{{ $reg_email }}" @endif>
          </div>
          <div class="form__field" style="padding-right: 20px;">
            <label class="form__label" for="password" style="color: #055698;">{{ trans('app.reg_password') }}</label>
            <input type="password" minlength="8" name="password" id="password" required autofocus>
          </div>
          <div class="form__field" style="padding-left: 20px;">
            <label class="form__label" for="password_confirmation" style="color: #055698;">{{ trans('app.reg_password_confirm') }}</label>
            <input type="password" minlength="8" name="password_confirmation" id="password_confirm" required autofocus>
          </div>
        </div>

        <div class="form__field">
          <label class="form__label" for="password" style="color: #055698;">{{ trans('app.reg_go') }}</label>
          <select id="government_id" name="government_id" required autofocus>
            <option value="0">{{ trans('app.reg_select_go') }}</option>
            @if (!empty($reg_government_id) )
              @foreach ($governments as $government)
                <option value="{{ $government->id }}" @if( $reg_government_id==$government->id ) selected @endif >{{ $government->$name_go }}</option>
              @endforeach
            @else
              @foreach ($governments as $government)
                <option value="{{ $government->id }}">{{ $government->$name_go }}</option>
              @endforeach
            @endif


          </select>
        </div>

        @if(!empty($errorMsg))
        <div class="info-box-error"><b>{{ trans('app.reg_error') }}:</b> {!! $errorMsg !!}</div>
        @elseif(!empty($successMsg))
        <div class="info-box-success">{!! $successMsg !!}</div>
        @else
        <div class="info-box">{{ trans('app.reg_need_fields') }}<br>{{ trans('app.reg_check_correct') }}</div>
        @endif



        <button class="form__submit" type="submit">{{ trans('app.registration') }}</button>

      </form>


    </div>
  </div>
</div>





@endsection

