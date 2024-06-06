<aside class="sidebar">
  <nav class="sidebar__menu">
    <ul class="sidebar__list">
      <li class="sidebar__item">
        <a class="sidebar__link sidebar__toggle" href="#" title="{{ trans('app.m_show') }}" data-title-alt="{{ trans('app.m_hide') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#caret-circle-right"></use>
          </svg>
          <span>{{ trans('app.m_hide') }}</span>
        </a>
      </li>
      <li class="sidebar__item @if( Route::is('datacatalog.create') ) sidebar__item_active @endif">
        <a class="sidebar__link" href="{{ route('datacatalog.create') }}" title="{{ trans('app.d_create') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#plus"></use>
          </svg>
          <span>{{ trans('app.d_create') }}</span>
        </a>
      </li>
      <li class="sidebar__item @if( Route::is('datacatalog.index') ) sidebar__item_active @endif">
        <a class="sidebar__link" href="{{ route('datacatalog.index') }}" title="{{ trans('app.d_catalog') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#folder"></use>
          </svg>
          <span>{{ trans('app.d_catalog') }}</span>
        </a>
      </li>
      <li class="sidebar__item @if( Route::is('datacatalog.draft') ) sidebar__item_active @endif">
        <a class="sidebar__link" href="{{ route('datacatalog.draft') }}" title="{{ trans('app.d_draft') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#archive"></use>
          </svg>
          <span>{{ trans('app.d_draft') }}</span>
        </a>
      </li>
      <li class="sidebar__item @if( Route::is('datacatalog.outbox') ) sidebar__item_active @endif">
        <a class="sidebar__link" href="{{ route('datacatalog.outbox') }}" title="{{ trans('app.d_outbox') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#file"></use>
          </svg>
          <span>{{ trans('app.d_outbox') }}</span>
        </a>
      </li>
      <li class="sidebar__item @if( request()->is('*agreement*') ) sidebar__item_active @endif">
        <a class="sidebar__link" href="{{ route('datacatalog.agreement') }}" title="{{ trans('app.d_agreement') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#check-fill"></use>
          </svg>
          <span>{{ trans('app.d_agreement') }}</span>
        </a>
      </li>
      <li class="sidebar__item @if( request()->is('*signing*') ) sidebar__item_active @endif">
        <a class="sidebar__link" href="{{ route('datacatalog.signing') }}" title="{{ trans('app.d_signing') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#check-square"></use>
          </svg>
          <span>{{ trans('app.d_signing') }}</span>
        </a>
      </li>
    </ul>
  </nav>
</aside>