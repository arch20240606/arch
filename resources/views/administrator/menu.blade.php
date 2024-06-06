<nav class="tabs">
  <a class="tabs__link @if( Route::is('administrator.index') || Route::is('administrator.edit') ) tabs__link_active @endif" href="{{ route('administrator.index') }}">
    <span class="tabs__num">{{ $users_count }}</span>
    Пользователи
  </a>
  <a class="tabs__link @if( Route::is('administrator.passport') ) tabs__link_active @endif" href="{{ route('administrator.passport') }}">
    <span class="tabs__num">{{ $passports_count }}</span>
    Паспорта
  </a>
  <a class="tabs__link @if( Route::is('administrator.uchet*') || Route::is('administrator.update')) tabs__link_active @endif" href="{{ route('administrator.uchet') }}">
    <span class="tabs__num">{{ $uchet_count }}</span>
    Учет сведений
  </a>

</nav>

