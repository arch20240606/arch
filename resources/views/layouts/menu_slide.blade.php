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
      <li class="sidebar__item @if( Route::is('home') ) sidebar__item_active @endif">
        <a class="sidebar__link" href="{{ route('home') }}" title="{{ trans('app.main') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#house"></use>
          </svg>
          <span>{{ trans('app.main') }}</span>
        </a>
      </li>
      <li class="sidebar__item sidebar__item_has-submenu @if( Route::is('accounting.*') OR Route::is('accounting') ) sidebar__item_active @endif">
        <a class="sidebar__link" href="#" title="{{ trans('app.m_uchet') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#folder"></use>
          </svg>
          <span>{{ trans('app.m_uchet') }}</span>
        </a>
        <ul class="sidebar__submenu">
          
          <li class="sidebar__submenu-item @if( Route::is('accounting.information') ) sidebar__submenu-item_active @endif"><a class="sidebar__submenu-link" href="{{ route('accounting.information') }}">Учёт сведений</a></li>
          <li class="sidebar__submenu-item @if( Route::is('accounting.iss') ) sidebar__submenu-item_active @endif"><a class="sidebar__submenu-link" href="{{ route('accounting.iss') }}">Информационные системы</a></li>
          <li class="sidebar__submenu-item @if( Route::is('archiveIss.index') ) sidebar__submenu-item_active @endif"><a class="sidebar__submenu-link" href="{{ route('archiveIss.index') }}">Архивные информационные системы</a></li>
          <li class="sidebar__submenu-item @if( Route::is('archiveOnlineResources.index') ) sidebar__submenu-item_active @endif"><a class="sidebar__submenu-link" href="{{ route('archiveOnlineResources.index') }}">Архивные интернет-ресурсы</a></li>
          <li class="sidebar__submenu-item @if( Route::is('onlineResources.index') ) sidebar__submenu-item_active @endif"><a class="sidebar__submenu-link" href="{{ route('onlineResources.index') }}">Интернет-ресурсы</a></li>
          <li class="sidebar__submenu-item @if( Route::is('icService.index') ) sidebar__submenu-item_active @endif"><a class="sidebar__submenu-link" href="{{ route('icService.index') }}">ИК-услуги</a></li>
          <li class="sidebar__submenu-item @if( Route::is('contract.index') ) sidebar__submenu-item_active @endif"><a class="sidebar__submenu-link" href="{{ route('contract.index') }}">Договора</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-item @if( Route::is('integration.index') ) sidebar__submenu-item_active @endif"><a class="sidebar__submenu-link" href="{{ route('integration.index') }}">Интеграции ИС</a></li>
          <li class="sidebar__submenu-item @if( Route::is('itProject.index') ) sidebar__submenu-item_active @endif"><a class="sidebar__submenu-link" href="{{ route('itProject.index') }}">ИКТ-проекты</a></li>
          <li class="sidebar__submenu-item @if( Route::is('equipment.index') ) sidebar__submenu-item_active @endif"><a class="sidebar__submenu-link" href="{{ route('equipment.index') }}">Оборудование</a></li> 
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link @if( Route::is('license.index') ) sidebar__submenu-item_active @endif" href="{{ route('license.index') }}">Программное обеспечение</a></li>
          <li class="sidebar__submenu-item @if( Route::is('informationResources.index') ) sidebar__submenu-item_active @endif"><a class="sidebar__submenu-link" href="{{ route('informationResources.index') }}">Информационные ресурсы</a></li> 

          {{-- <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Информационные ресурсы</a></li> --}}
          <li class="sidebar__submenu-item @if( Route::is('bussinessObject.index') ) sidebar__submenu-item_active @endif"><a class="sidebar__submenu-link" href="{{ route('bussinessObject.index') }}">Объекты данных</a></li> 
          <li class="sidebar__submenu-item @if( Route::is('accounting.index') ) sidebar__submenu-item_active @endif"><a class="sidebar__submenu-link" href="{{ route('accounting.index') }}">Запросы на добавление</a></li>
        </ul>
      </li>
      <li class="sidebar__item @if( Route::is('budget.index') ) sidebar__item_active @endif">
        <a class="sidebar__link" href="{{ route('budget.index') }}" title="{{ trans('app.m_budget') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#credit-card"></use>
          </svg>
          <span>{{ trans('app.m_budget') }}</span>
        </a>
      </li>
      <li class="sidebar__item @if( Route::is('expertise.*') ) sidebar__item_active @endif">
        {{-- <a class="sidebar__link" href="{{ route('expertise.index') }}" title="{{ trans('app.m_expert') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#check-square"></use>
          </svg>
          <span>{{ trans('app.m_expert') }}</span>
        </a> --}}
        @if (auth()->check() && (auth()->user()->hasRole('ROLE_UO_EXPERTISE_DANA') || auth()->user()->hasRole('ROLE_UO_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_KIB_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_SIGNER')))
          <a class="sidebar__link" href="{{ route('expertise.in_work') }}">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#credit-card"></use>
            </svg>
            {{ trans('app.expert') }}
          </a>
          @elseif (auth()->check() && auth()->user()->hasRole('ROLE_SI_EXPERTISE_REVIEWER'))
          <a class="sidebar__link" href="{{ route('expertise.executor') }}">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#credit-card"></use>
            </svg>
            {{ trans('app.expert') }}
          </a>
          @else
          <a class="sidebar__link" href="{{ route('expertise.draft') }}">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#credit-card"></use>
            </svg>
            {{ trans('app.expert') }}
          </a>
          @endif
      </li>

      <li class="sidebar__item sidebar__item_has-submenu @if( Route::is('businessprocess.*') OR Route::is('businessprocess') ) sidebar__item_active @endif">
        <a class="sidebar__link" href="#" title="Цифровая трансформация">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#calc"></use>
          </svg>
          <span>Цифровая трансформация</span>
        </a>
        <ul class="sidebar__submenu">
          <li class="sidebar__submenu-item @if( Route::is('businessprocess.index') ) sidebar__submenu-item_active @endif"><a class="sidebar__submenu-link" href="{{ route('businessprocess.index') }}">Единый реестр бизнес-процессов</a></li>
          <li class="sidebar__submenu-item @if( Route::is('businessprocess.roadmaps') ) sidebar__submenu-item_active @endif"><a class="sidebar__submenu-link" href="{{ route('businessprocess.roadmaps') }}">Размещение цифровой карты цифровой трансформации</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Размещение целевого варианта бизнес-процесса</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Публикация ГО сведений по планируемому бизнес-процессу</a></li>
        </ul>
      </li>

      <li class="sidebar__item @if( Route::is('etalondatas.*') ) sidebar__item_active @endif">
        <a class="sidebar__link" href="{{ route('etalondatas.index') }}" title="{{ trans('app.etalon') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#newspaper"></use>
          </svg>
          <span>{{ trans('app.etalon') }}</span>
        </a>
      </li>

      <li class="sidebar__item">
        <a class="sidebar__link" href="#" title="{{ trans('app.m_search') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#search"></use>
          </svg>
          <span>{{ trans('app.m_search') }}</span>
        </a>
      </li>
      <li class="sidebar__item">
        <a class="sidebar__link" href="#" title="{{ trans('app.m_class') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#calc"></use>
          </svg>
          <span>{{ trans('app.m_class') }}</span>
        </a>
        <ul class="sidebar__submenu">
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">{{ trans('app.m_class') }}</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Информационные системы</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Информационные ресурсы</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Общесистемное и обеспечивающее программное обеспечение</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Аппаратные средства обработки и хранения данных</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Средства печати и копирования документов</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Серверное помещение и его инженерная инфраструктура</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Каналы связи и телекоммуникационная инфраструктура</a></li>
        </ul>
      </li>
      <li class="sidebar__item">
        <a class="sidebar__link" href="#" title="{{ trans('app.m_stack') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#pazzle"></use>
          </svg>
          <span>{{ trans('app.m_stack') }}</span>
        </a>
      </li>
      <li class="sidebar__item">
        <a class="sidebar__link" href="#" title="{{ trans('app.m_gs') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#book-bookmark"></use>
          </svg>
          <span>{{ trans('app.m_gs') }}</span>
        </a>
        <ul class="sidebar__submenu">
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">{{ trans('app.m_gs') }}</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Модель деятельности Правительства Республики Казахстан</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Государственные функции</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Государственные услуги</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Государственные стратегические программы</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Реестр процессов</a></li>
        </ul>
      </li>
      <li class="sidebar__item">
        <a class="sidebar__link" href="#" title="{{ trans('app.m_arch_go') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#file"></use>
          </svg>
          <span>{{ trans('app.m_arch_go') }}</span>
        </a>
      </li>
      <li class="sidebar__item">
        <a class="sidebar__link" href="#" title="{{ trans('app.m_docs') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#archive"></use>
          </svg>
          <span>{{ trans('app.m_docs') }}</span>
        </a>
      </li>
      <li class="sidebar__item @if( Route::is('grades.*') ) sidebar__item_active @endif">
        <a class="sidebar__link" href="{{ route('grades.index') }}" title="{{ trans('app.m_ocenka') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#star"></use>
          </svg>
          <span>{{ trans('app.m_ocenka') }}</span>
        </a>
      </li>
      <li class="sidebar__item">
        <a class="sidebar__link" href="#" title="{{ trans('app.m_components') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#shuffle-angular"></use>
          </svg>
          <span>{{ trans('app.m_components') }}</span>
        </a>
        <ul class="sidebar__submenu">
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">{{ trans('app.m_components') }}</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Список компонентов деятельности</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Услуга</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Продукт</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Показания</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Противопоказания</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Процессы</a></li>
        </ul>
      </li>
      <li class="sidebar__item">
        <a class="sidebar__link" href="#" title="{{ trans('app.m_subinfo') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#bank"></use>
          </svg>
          <span>{{ trans('app.m_subinfo') }}</span>
        </a>
        <ul class="sidebar__submenu">
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">{{ trans('app.m_subinfo') }}</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Государственные органы</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Организации</a></li>
          <li class="sidebar__submenu-item"><a class="sidebar__submenu-link" href="#">Производители ПО/оборудования</a></li>
        </ul>
      </li>
      <li class="sidebar__item">
        <a class="sidebar__link" href="#" title="{{ trans('app.m_upravlenie') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#book-open"></use>
          </svg>
          <span>{{ trans('app.m_upravlenie') }}</span>
        </a>
      </li>
      <li class="sidebar__item @if( Route::is('reports.*') ) sidebar__item_active @endif">
        <a class="sidebar__link" href="{{ route('reports.index') }}" title="{{ trans('app.m_otchet') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#clipboard"></use>
          </svg>
          <span>{{ trans('app.m_otchet') }}</span>
        </a>
      </li>
      <li class="sidebar__item">
        <a class="sidebar__link" href="#" title="{{ trans('app.m_news') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#newspaper"></use>
          </svg>
          <span>{{ trans('app.m_news') }}</span>
        </a>
      </li>
      <li class="sidebar__item">
        <a class="sidebar__link" href="#" title="{{ trans('app.m_develop') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#git-branch"></use>
          </svg>
          <span>{{ trans('app.m_develop') }}</span>
        </a>
      </li>
      <li class="sidebar__item">
        <a class="sidebar__link" href="#" title="{{ trans('app.m_source') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#code"></use>
          </svg>
          <span>{{ trans('app.m_source') }}</span>
        </a>
      </li>
      <li class="sidebar__item">
        <a class="sidebar__link" href="#" title="{{ trans('app.m_users') }}">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#users"></use>
          </svg>
          <span>{{ trans('app.m_users') }}</span>
        </a>
      </li>
    </ul>
  </nav>
</aside>