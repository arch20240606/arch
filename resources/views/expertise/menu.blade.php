{{-- <nav class="tabs">
@if (auth()->check() && (auth()->user()->hasRole('ROLE_UO_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_KIB_EXPERTISE_EXECUTOR') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_UO_EXPERTISE_DANA') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_CONFIRMER')))
    <a class="tabs__link @if(Route::is('expertise.in_work')) tabs__link_active @endif" href="{{ route('expertise.in_work') }}">
        <span class="tabs__num" style="background: #39C07F;">0</span>
        В работе 
    </a>
@elseif (auth()->check() && (auth()->user()->hasRole('ROLE_SI_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_REVIEWER')))
    <a class="tabs__link @if(Route::is('expertise.executor')) tabs__link_active @endif" href="{{ route('expertise.executor') }}">
        <span class="tabs__num" style="background: #39C07F;">0</span>
        В работе 
    </a>
@elseif (auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')))
    <a class="tabs__link @if(Route::is('expertise.draft')) tabs__link_active @endif" href="{{ route('expertise.draft') }}">
      <span class="tabs__num" style="background: #EEC609;">{{ session('expertiseCount') }}</span>
      В работе
    </a>    
@else<a class="tabs__link @if(Route::is('expertise.draft')) tabs__link_active @endif" href="{{ route('expertise.draft') }}">
        <span class="tabs__num" style="background: #EEC609;">0</span>
        В работе
    </a>
@endif

  @if (auth()->check() && (auth()->user()->hasRole('ROLE_SI_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_KIB_EXPERTISE_CONFIRMER')))
  <a class="tabs__link @if(Route::is('expertise.approve_confirmers')) tabs__link_active @endif" href="{{ route('expertise.approve_confirmers') }}">
      <span class="tabs__num" style="background: #39C07F;">0</span>
      На согласовании
  </a>
  @else
  <a class="tabs__link @if( Route::is('expertise.approve') ) tabs__link_active @endif" href="{{ route('expertise.approve') }}">
    <span class="tabs__num">0</span>
    На согласовании
  </a>
  @endif
  @if (auth()->check() && (auth()->user()->hasRole('ROLE_SI_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_SIGNER')))
  <a class="tabs__link @if( Route::is('expertise.signer_outbox') ) tabs__link_active @endif" href="{{ route('expertise.signer_outbox') }}">
    <span class="tabs__num">0</span>
    На подписи
  </a>
  @else
  <a class="tabs__link @if( Route::is('expertise.outbox') ) tabs__link_active @endif" href="{{ route('expertise.outbox') }}">
    <span class="tabs__num" style="background: #0178BC;">0</span>
    На подписи
  </a>
  @endif
  @if (auth()->check() && (auth()->user()->hasRole('ROLE_UO_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_STS_EXPERTISE_SIGNER')))
  <a class="tabs__link @if( Route::is('expertise.signing*') ) tabs__link_active @endif" href="{{ route('expertise.signing') }}">
    <span class="tabs__num" style="background: #39C07F;">0</span>
    Исходящие
  </a>
  @endif
  @if (auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')))
  <a class="tabs__link @if(Route::is('expertise.goExecutor')) tabs__link_active @endif" href="{{ route('expertise.goExecutor') }}">
        <span class="tabs__num" style="background: #39C07F;">0</span>
        Исходящие
    </a>
  @endif
@if(auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')))
    <a class="tabs__button btn btn_icon" href="{{ route('expertise.create') }}">
      <svg>
        <use xlink:href="/assets/images/sprite.svg#plus"></use>
      </svg>
      Создать
    </a>
  @endif
</nav> --}}


<nav class="tabs">
  @if (auth()->check() && (auth()->user()->hasRole('ROLE_UO_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_KIB_EXPERTISE_EXECUTOR') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_UO_EXPERTISE_DANA') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_REVIEWER')))
      <a class="tabs__link @if(Route::is('expertise.in_work')) tabs__link_active @endif" href="{{ route('expertise.in_work') }}">
          <span class="tabs__num" style="background: #39C07F;">{{session('expertiseInWorkCounts', 0)}}</span>
          В работе 
      </a>
  {{-- @elseif (auth()->check() && (auth()->user()->hasRole('ROLE_SI_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_REVIEWER')))
      <a class="tabs__link @if(Route::is('expertise.executor')) tabs__link_active @endif" href="{{ route('expertise.executor') }}">
          <span class="tabs__num" style="background: #39C07F;">{{session('executorCount', 0)}}</span>
          В работе 
      </a> --}}
  @elseif (auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')))
      <a class="tabs__link @if(Route::is('expertise.draft')) tabs__link_active @endif" href="{{ route('expertise.draft') }}">
          <span class="tabs__num" style="background: #EEC609;">{{session('expertiseInWorkCount', 0)}}</span>
          В работе
      </a>    
  @else
      <a class="tabs__link @if(Route::is('expertise.draft')) tabs__link_active @endif" href="{{ route('expertise.draft') }}">
          <span class="tabs__num" style="background: #EEC609;">{{session('expertiseInWorkCount', 0)}}</span>
          В работе
      </a>
  @endif

  @if (auth()->check() && (auth()->user()->hasRole('ROLE_SI_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_KIB_EXPERTISE_CONFIRMER')))
      <a class="tabs__link @if(Route::is('expertise.approve_confirmers')) tabs__link_active @endif" href="{{ route('expertise.approve_confirmers') }}">
          <span class="tabs__num" style="background: #39C07F;">{{session('approveConfirmersCount', 0)}}</span>
          На согласовании
      </a>
  @else
      <a class="tabs__link @if(Route::is('expertise.approve')) tabs__link_active @endif" href="{{ route('expertise.approve') }}">
          <span class="tabs__num">{{session('expertisesAppCount', 0)}}</span>
          На согласовании
      </a>
  @endif

  @if (auth()->check() && (auth()->user()->hasRole('ROLE_SI_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_SIGNER')))
      <a class="tabs__link @if(Route::is('expertise.signer_outbox')) tabs__link_active @endif" href="{{ route('expertise.signer_outbox') }}">
          <span class="tabs__num">{{session('signerOutboxCount', 0)}}</span>
          На подписи
      </a>
  @else
      <a class="tabs__link @if(Route::is('expertise.outbox')) tabs__link_active @endif" href="{{ route('expertise.outbox') }}">
          <span class="tabs__num" style="background: #0178BC;">{{session('outboxCount', 0)}}</span>
          На подписи
      </a>
  @endif

  {{-- @if (auth()->check() && (auth()->user()->hasRole('ROLE_UO_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_STS_EXPERTISE_SIGNER')))
      <a class="tabs__link @if(Route::is('expertise.signing*')) tabs__link_active @endif" href="{{ route('expertise.signing') }}">
          <span class="tabs__num" style="background: #39C07F;">0</span>
          Исходящие
      </a>
  @endif --}}

  @if (auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR') || auth()->user()->hasRole('ROLE_GO_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_GO_EXPERTISE_SIGNER')))
      <a class="tabs__link @if(Route::is('expertise.goExecutor')) tabs__link_active @endif" href="{{ route('expertise.goExecutor') }}">
          <span class="tabs__num" style="background: #39C07F;">{{ session('expertiseGoExecutorCount', 0) }}</span>
          Исходящие
      </a>
  @endif

  @if(auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')))
      <a class="tabs__button btn btn_icon" href="{{ route('expertise.create') }}">
          <svg>
              <use xlink:href="/assets/images/sprite.svg#plus"></use>
          </svg>
          Создать
      </a>
  @endif
</nav>


  
  
