<nav class="tabs">
  <a class="tabs__link @if( Route::is('accounting.index') ) tabs__link_active @endif" href="{{ route('accounting.index') }}">
    <span class="tabs__num">0</span>
    {{ trans('app.myreqests') }}
  </a>
  <a class="tabs__link @if( Route::is('accounting.inbox') ) tabs__link_active @endif" href="{{ route('accounting.inbox') }}">
    <span class="tabs__num">0</span>
    Входящие
  </a>
  <a class="tabs__link @if( Route::is('accounting.outbox') ) tabs__link_active @endif" href="{{ route('accounting.outbox') }}">
    <span class="tabs__num">0</span>
    Исходящие
  </a>
  <a class="tabs__link @if( Route::is('accounting.draft') ) tabs__link_active @endif" href="{{ route('accounting.draft') }}">
    <span class="tabs__num">0</span>
    Черновики
  </a>
  <a class="tabs__button btn btn_icon" href="{{ route('accounting.create') }}">
    <svg>
      <use xlink:href="/assets/images/sprite.svg#plus"></use>
    </svg>
    Создать
  </a>
</nav>
