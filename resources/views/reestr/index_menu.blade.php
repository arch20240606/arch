<nav class="tabs">
  <a class="tabs__link @if( Route::is('datacatalog.index') ) tabs__link_active @endif" href="#">
    <span class="tabs__num">0</span>
    {{ trans('app.d_inbox') }}
  </a>
  <a class="tabs__link @if( Route::is('datacatalog.draft') ) tabs__link_active @endif" href="#">
    <span class="tabs__num">0</span>
    {{ trans('app.d_draft') }}
  </a>
  <a class="tabs__link @if( Route::is('datacatalog.outbox') ) tabs__link_active @endif" href="#">
    <span class="tabs__num">0</span>
    {{ trans('app.d_outbox') }}
  </a>
  <a class="tabs__link @if( Route::is('datacatalog.agreement') ) tabs__link_active @endif" href="#">
    <span class="tabs__num">0</span>
    {{ trans('app.d_agreement') }}
  </a>
  <a class="tabs__link @if( Route::is('datacatalog.signing') ) tabs__link_active @endif" href="#">
    <span class="tabs__num">0</span>
    {{ trans('app.d_signing') }}
  </a>
  <a class="tabs__button btn btn_icon" href="{{ route('reestr.create') }}">
    <svg>
      <use xlink:href="/assets/images/sprite.svg#plus"></use>
    </svg>
    Включение в Реестр
  </a>
</nav>

