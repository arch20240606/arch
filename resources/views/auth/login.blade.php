@extends('layouts.app')

@section('title'){{ trans('app.аuthorization') }} - {{ trans('app.site_title') }}@endsection

@section('content')
<main class="content">
  <section >

    <div class="intro__bg">
      <picture>
        <source srcset="/assets/images/intro-bg.avif" type="image/avif">
        <source srcset="/assets/images/intro-bg.webp" type="image/webp">
        <img src="/assets/images/intro-bg.jpg" alt="Background" style="height: 100vh">
      </picture>
    </div>
  </section>
</main>

<div id="login-popup">
  <div class="popup__block">
    <div class="popup__col popup__col_left">
      <div class="popup__caption">{!! trans('app.welcome') !!}</div>
    </div>
    <div class="popup__col popup__col_right">

      <div style="text-align: center;">
      <img src="/logos/logo_{{ app()->getLocale() }}.png" height="45" alt="{{ trans('app.site_title') }}" title="{{ trans('app.site_title') }}">
      </div>

      <div class="popup__title">{{ trans('app.login') }}</div>

      <form class="popup__form form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form__field">
          <label class="form__label" for="email">{{ trans('app.name_email') }}</label>
          <input type="text" name="email" id="email" placeholder="E-mail" required autofocus>
        </div>
        <div class="form__field">
          <label class="form__label" for="password">{{ trans('app.password') }}</label>
          <input type="password" name="password" id="password" placeholder="*************" required>
        </div>
        <a class="form__forgot-password" href="#">{{ trans('app.forgot') }}</a>
        <button class="form__submit" type="submit">{{ trans('app.login') }}</button>
      </form>

      @error('email')
        <div class="popup__warning warning">
          <div class="warning__text">Введенные данные некорректны. Проверьте e-mail и пароль</div>
        </div>
      @enderror

      @error('password')
        <div class="popup__warning warning">
          <div class="warning__text">Введенные данные некорректны. Проверьте e-mail и пароль</div>
        </div>
      @enderror

      <div class="popup__warning warning_success warning">
        <div class="warning__title"></div>
        <div class="warning__text">{!! trans('app.allquestions') !!}</div>
      </div>
    </div>
  </div>
</div>

@endsection
