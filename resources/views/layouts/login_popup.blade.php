<div id="login-popup" class="popup">
  <div class="popup__block">
    <div class="popup__col popup__col_left">
      <div class="popup__caption">{!! trans('app.welcome') !!}</div>
    </div>
    <div class="popup__col popup__col_right">
      <button class="popup__close"></button>

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
          <input type="password" name="password" id="password" required>
        </div>
        <a class="form__forgot-password" href="#">{{ trans('app.forgot') }}</a>
        <button class="form__submit" type="submit">{{ trans('app.login') }}</button>
      </form>

      <div class="popup__warning warning_success warning">
        <div class="warning__title"></div>
        <div class="warning__text">{!! trans('app.allquestions') !!}</div>
      </div>
    </div>
  </div>
</div>