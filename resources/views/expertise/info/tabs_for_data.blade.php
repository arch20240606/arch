<div style="display: flex; justify-content: space-between; align-items: flex-start; padding: 15px; box-sizing: border-box;">
  <div style="border: 1px solid #d7d2d2; width: 48%; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); overflow: hidden;">
      <div style="background-color: #05adea; padding: 15px; color: #fff; text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px;">
          Последние действия
      </div>
      <div style="padding: 15px;">
          <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #d7d2d2; padding-bottom: 10px; margin-bottom: 10px;">
              <span style="display: flex; align-items: center;">
                  <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px; margin-right: 5px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 2a10 10 0 100 20 10 10 0 000-20zM12 11a3 3 0 110-6 3 3 0 010 6zM12 12c-2.667 0-5 1.333-5 4v1h10v-1c0-2.667-2.333-4-5-4z"/>
                  </svg>
                  <strong style="padding-right: 10px;">{{$expertise->users->surname}} {{$expertise->users->name}}</strong> Создание
              </span>
              <span>{{ \Carbon\Carbon::parse($expertise->created_at)->format('d/m/Y H:i:s') }}</span>
          </div>
      </div>
  </div>

  <div style="border: 1px solid #d7d2d2; padding: 5px 10px; border-radius: 5px; display: flex; align-items: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); background-color: #fff;">
      {{-- <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px; margin-right: 5px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 2a10 10 0 100 20 10 10 0 000-20zM12 11a3 3 0 110-6 3 3 0 010 6zM12 12c-2.667 0-5 1.333-5 4v1h10v-1c0-2.667-2.333-4-5-4z"/>
      </svg> --}}
      Кому отписано  <strong style="padding-left: 10px;">{{$expertise->users->surname}} {{$expertise->users->name}}</strong>
  </div>
</div>
<nav class="is-tabs tabs">
  <a style="width: 25%; font-size: 16px;" class="tabs__link tabs__link_active" href="#" data-id="1">Паспорт</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="2">Функциональная часть</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="3">Техническое задание</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="4">Документы</a>
  {{-- @if (auth()->check() && (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR') || auth()->user()->hasRole('ROLE_GO_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_GO_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_KIB_EXPERTISE_EXECUTOR')))
    <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="5">Комментарии</a> --}}
  @if(auth()->check() && (auth()->user()->hasRole('ROLE_UO_EXPERTISE_DANA') || auth()->user()->hasRole('ROLE_UO_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_UO_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_GTS_EXPERTISE_SIGNER') || (auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')) || auth()->user()->hasRole('ROLE_GO_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_GO_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_KIB_EXPERTISE_EXECUTOR') || auth()->user()->hasRole('ROLE_KIB_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_SIGNER') || auth()->user()->hasRole('ROLE_UO_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_GO_EXPERTISE_EDITOR')))
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