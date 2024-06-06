<footer class="footer">
  <div class="container">
    <a class="footer__logo logo" href="/{{ app()->getLocale() }}/">
      <img src="/logos/logo_{{ app()->getLocale() }}.png" height="45" alt="{{ trans('app.site_title') }}" title="{{ trans('app.site_title') }}">
      <!--
      <svg class="logo__icon"><use xlink:href="/assets/images/sprite.svg#logo"></use></svg>
      <p class="logo__name">{!! trans('app.archportal') !!}</p>
      -->
    </a>
    <nav class="footer__menu">
      <ul class="footer__list">
        <li class="footer__item">
          <a class="footer__link" href="{{ route('accounting.information') }}">{{ trans('app.uchet') }}</a>
        </li>
        <li class="footer__item">
          <a class="footer__link" href="{{ route('budget.index') }}">{{ trans('app.budget') }}</a>
        </li>
        <li class="footer__item">
          <a class="footer__link" href="{{ route('expertise.index') }}">{{ trans('app.expert') }}</a>
        </li>
        <li class="footer__item">
          <a class="footer__link" href="#">{{ trans('app.public_discus') }}</a>
        </li>
        <li class="footer__item">
          <a class="footer__link" href="https://govarchi.kz/" target="_blank">{{ trans('app.architecture') }}</a>
        </li>
        <li class="footer__item">
          <a class="footer__link" href="{{ route('calculator') }}">{{ trans('app.calculator') }}</a>
        </li>
        <li class="footer__item">
          <a class="footer__link footer__link_download" href="{{ route('terms') }}">{{ trans('app.download_tz') }}</a>
        </li>
      </ul>
    </nav>
  </div>
</footer>