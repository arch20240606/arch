<div class="header__inner">
  <div class="header__column header__column_left"></div>
  <a class="header__logo logo" href="/{{ app()->getLocale() }}/">
    <img src="/logos/logo_{{ app()->getLocale() }}.png" height="45" alt="{{ trans('app.site_title') }}" title="{{ trans('app.site_title') }}">
    <!--
    <svg class="logo__icon">
      <use xlink:href="/assets/images/sprite.svg#logo"></use>
    </svg>
    <p class="logo__name">{!! trans('app.archportal') !!}</p>
    -->
  </a>
  <div class="header__column header__column_right">
    <a class="header__auth btn" style="margin-right: 15px;" href="{{ route('register') }}">{{ trans('app.registration') }}</a>
    <a class="header__auth btn" href="{{ route('login') }}">{{ trans('app.аuthorization') }}</a>

    <div class="header__lang lang">
      @include ('layouts.lang')
    </div>
    
  </div>
</div>