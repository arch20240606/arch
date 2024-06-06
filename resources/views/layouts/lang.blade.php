<div class="lang__current">{{ app()->getLocale() }}</div>
<div class="lang__list">
  @if ( app()->getLocale() == "ru")
  <a class="lang__item" href="{{ LaravelLocalization::getLocalizedURL('kz') }}">KZ</a>
  <a class="lang__item" href="{{ LaravelLocalization::getLocalizedURL('en') }}">EN</a>
  @elseif ( app()->getLocale() == "en")
  <a class="lang__item" href="{{ LaravelLocalization::getLocalizedURL('kz') }}">KZ</a>
  <a class="lang__item" href="{{ LaravelLocalization::getLocalizedURL('ru') }}">RU</a>
  @else
  <a class="lang__item" href="{{ LaravelLocalization::getLocalizedURL('ru') }}">RU</a>
  <a class="lang__item" href="{{ LaravelLocalization::getLocalizedURL('en') }}">EN</a>                
  @endif
</div>