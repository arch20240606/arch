<nav class="tabs">
  <a class="tabs__link @if( Route::is('etalondatas.index') ) tabs__link_active @endif" href="{{ route('etalondatas.index') }}" data-id="1">
    <span class="tabs__num">{{ $domainobjects->count() }}</span>
    Общий список
  </a>
  <!--
  <a class="tabs__link @if( Route::is('etalondatas.build') ) tabs__link_active @endif" href="{{ route('etalondatas.build') }}">
    Создание эталонных данных
  </a>
  <a class="tabs__link @if( Route::is('datacatalog.outbox') ) tabs__link_active @endif" href="#">
    <span class="tabs__num">0</span>
    Отправленные
  </a>
  -->
  <a class="tabs__link @if( Route::is('etalondatas.agreement') ) tabs__link_active @endif" href="{{ route('etalondatas.agreement') }}">
    <span class="tabs__num">0</span>
    {{ trans('app.d_agreement') }}
  </a>
  <a class="tabs__link @if( Route::is('etalondatas.signing') ) tabs__link_active @endif" href="{{ route('etalondatas.signing') }}">
    <span class="tabs__num">0</span>
    Утверждение
  </a>
</nav>

