<nav class="tabs">
  <a class="tabs__link @if( Route::is('datacatalog.index') ) tabs__link_active @endif" href="{{ route('datacatalog.index') }}">
    <span class="tabs__num">0</span>
    {{ trans('app.d_catalog') }}
  </a>
  <a class="tabs__link @if( Route::is('datacatalog.draft') ) tabs__link_active @endif" href="{{ route('datacatalog.draft') }}">
    <span class="tabs__num">0</span>
    {{ trans('app.d_draft') }}
  </a>
  <a class="tabs__link @if( Route::is('datacatalog.outbox') ) tabs__link_active @endif" href="{{ route('datacatalog.outbox') }}">
    <span class="tabs__num">0</span>
    {{ trans('app.d_outbox') }}
  </a>
  <a class="tabs__link @if( request()->is('*agreement*') ) tabs__link_active @endif" href="{{ route('datacatalog.agreement') }}">
    <span class="tabs__num">0</span>
    На утверждении
  </a>
  <a class="tabs__link @if( request()->is('*signing*') ) tabs__link_active @endif" href="{{ route('datacatalog.signing') }}">
    <span class="tabs__num">0</span>
    {{ trans('app.d_agreement') }}
  </a>
  <a class="tabs__button btn btn_icon" href="{{ route('datacatalog.create') }}">
    <svg>
      <use xlink:href="/assets/images/sprite.svg#plus"></use>
    </svg>
    {{ trans('app.d_create') }}
  </a>
</nav>

