<nav class="is-tabs tabs">
  <a style="width: 25%; font-size: 16px;" class="tabs__link tabs__link_active" href="#" data-id="1">Паспорт</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="2">Функциональная часть</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="3">Техническое задание</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="4">Документы</a>
  {{-- @if (auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR') || auth()->user()->hasRole('ROLE_GO_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_GO_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_KIB_EXPERTISE_EXECUTOR')))
    <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="5">Комментарии</a> --}}
  @if(auth()->check() && (auth()->user()->hasRole('ROLE_UO_EXPERTISE_DANA') || auth()->user()->hasRole('ROLE_UO_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_UO_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_SIGNER') || (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')) || auth()->user()->hasRole('ROLE_GO_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_GO_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_KIB_EXPERTISE_EXECUTOR') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_SIGNER')|| auth()->user()->hasRole('ROLE_UO_EXPERTISE_CONFIRMER')))
    <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="5">Комментарии/Заключение</a>
  @endif
</nav>




<div class="is-tab-content" data-id="1" style="display: block;">
  @include('expertise.info.passport')
</div>

<div class="is-tab-content" data-id="2">
  @include('expertise.info.function')
</div>

<div class="is-tab-content" data-id="3">
  @include('expertise.info.tz')
</div>

<div class="is-tab-content" data-id="4">
  @include('expertise.info.documents')
</div>

{{-- <div class="is-tab-content" data-id="5">
  @include('expertise.tabs_data.comments')
</div> --}}

<div class="is-tab-content" data-id="5">
  @include('expertise.info.comments')
</div>

{{-- <div class="is-tab-content" data-id="6">
  @include('expertise.signing.comments')
</div> --}}

<div class="is-tab-content" data-id="7">
  @include('expertise.signing.comments_show')
</div>