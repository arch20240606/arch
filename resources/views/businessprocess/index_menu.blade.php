<nav class="tabs">
  @if (Auth::user()->government_id == 108 )
    <a class="tabs__link @if( Route::is('businessprocess.reestr') ) tabs__link_active @endif" href="{{ route('businessprocess.reestr') }}">
      <span class="tabs__num">0</span>
      Реестр
    </a>
  @endif
  @if (Auth::user()->government_id != 108 )
  <a class="tabs__link @if( Route::is('businessprocess.index') ) tabs__link_active @endif" href="{{ route('businessprocess.index') }}">
    <span class="tabs__num">0</span>
    Мои кейсы
  </a>
  @endif
  <!--
  <a class="tabs__link @if( Route::is('datacatalog.outbox') ) tabs__link_active @endif" href="#">
    <span class="tabs__num">0</span>
    {{ trans('app.d_outbox') }}
  </a>
  <a class="tabs__link @if( Route::is('datacatalog.agreement') ) tabs__link_active @endif" href="#">
    <span class="tabs__num">0</span>
    {{ trans('app.d_agreement') }}
  </a>
  -->
  <a class="tabs__link @if( Route::is('datacatalog.signing') ) tabs__link_active @endif" href="#">
    <span class="tabs__num">0</span>
    {{ trans('app.d_signing') }}
  </a>
  <a class="tabs__button btn btn_icon" href="{{ route('businessprocess.create') }}">
    <svg>
      <use xlink:href="/assets/images/sprite.svg#plus"></use>
    </svg>
    Включение в Реестр
  </a>
</nav>

