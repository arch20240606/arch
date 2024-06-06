@extends('layouts.app')

@section('title')Редактирование данных пользователя - {{ trans('app.site_title') }}@endsection

<?php
if ( app()->getLocale() == "ru" ) {
  $names = 'name_ru';
} elseif ( app()->getLocale() == "en" ) {
  $names = 'name_en';
} else {
  $names = 'name_kz';
}
?>

@section('header')
@include ('layouts.header')
@endsection

@section('content')
<main class="content">

  <div class="container">

    <div class="breadcrumbs">
      <a class="breadcrumbs__home" href="/">
        <svg>
          <use xlink:href="/assets/images/sprite.svg#house"></use>
        </svg>
      </a>
      /
      <a href="{{ route('administrator.index') }}">Административный раздел</a>
      /
      Редактирование данных пользователя
    </div>

    <h1 class="page-title" style="margin-bottom: 50px;">Данные пользователя</h1>

    @include ('administrator.menu')

    @if (Session::has('successMsg'))
      <div class="success-info">{!! Session::get('successMsg') !!}</div>
    @endif

    @if(!empty($errorMsg))
    <div class="info-box-error"><b>{{ trans('app.reg_error') }}:</b> {!! $errorMsg !!}</div>
    @endif



    <div class="is-info">

      <div class="is-info__header">
        <h2 class="is-info__header-title"><span style="color: #0075ff">Пользователь:</span> {{ $user_data->surname }} {{ $user_data->name }} {{ $user_data->middlename }}</h2>
      </div>

      
      <div class="is-info__body">
        <form class="form" method="POST" action="{{ route('administrator.update', ['administrator' => $user_data->id]) }}">
          @csrf
          @method('PATCH')
          <div class="is-info__left is-info__col">
            <div class="is-info__right-header" style="background: #0075ff; color:">Учетные данные пользователя</div>
            <div class="is-info__row" style="margin-top: 13px;">
              <p><b>Фамилия</b></p>
              <input id="surname" name="surname" value="{{ $user_data->surname}}" type="text" minlength="2" maxlength="255" required>
            </div>
            <div class="is-info__row">
              <p><b>Имя</b></p>
              <input id="name" name="name" value="{{ $user_data->name}}" type="text" minlength="2" maxlength="255" required>
            </div>
            <div class="is-info__row">
              <p><b>Отчество</b></p>
              <input id="middlename" name="middlename" value="{{ $user_data->middlename}}" type="text" minlength="2" maxlength="255">
            </div>
            <div class="is-info__row">
              <p><b>E-mail (Логин)</b></p>
              <input id="email" name="email" value="{{ $user_data->email}}" type="text" minlength="2" maxlength="255">
            </div>
            <div class="is-info__row">
              <p><b @if ($user_data->government_id == '115') style="color: red" @endif>Государственный орган</b></p>
              <select id="go_select" name="go_select" required>
                @foreach ($governments as $government)
                <option value="{{ $government->id }}" @if ($user_data->government_id == $government->id) selected @endif>{{ $government->$names }}</option>
                @endforeach
              </select>
            </div>
            <div class="is-info__row">
              <p><b>Новый пароль</b><br>(при необходимости)</p>
              <input id="new_password" name="new_password" value="" type="text" minlength="8" maxlength="16">
            </div>
            <div class="is-info__row">
              <p><b>Статус</b></p>
              <label class="toggle-checkbox">
                <input type="checkbox" id="activity" name="activity" @if ($user_data->activity == '1') checked @endif>
                <span></span>
                <p>Пользователь активирован</p>
              </label>
            </div>
            <div class="is-info__row">
              <p><b>Дата регистрации</b></p>
              <div><p>{{ date('d.m.Y в H:i:s', strtotime( $user_data->created_at )) }}</p></div>
            </div>
            <div class="is-info__row">
              <p><b>Последний IP адрес</b></p>
              <div><p>{{ $user_data->ip_address }}</p></div>
            </div>
            <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
              <p></p>
              <button class="tabs__button btn" type="submit" id="update_account" name="update_account" style="margin-top: 20px; margin-bottom: 20px; width: 100%; font-size: 14px;">Сохранить изменения</button>
            </div>
          </div>
        </form>






        <div class="is-info__right is-info__col">
          <div class="is-info__right-header" style="background: #0075ff; color:">Права и уровни доступа</div>

           {{-- <div class="is-info__right-section">
            <div class="is-info__row">
              <p><b>Роли пользователя</b></p>
              <div>
                <form method="POST" action="{{ route('administrator.update', ['administrator' => $user_data->id]) }}">

                    @csrf
                    @method('PATCH')
                    @foreach ($roles as $role)
                        <label class="toggle-checkbox" style="margin-bottom: 5px;">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" @if ($user_data->roles->contains($role)) checked @endif>
                            <span></span>
                            <p>{{ $role->name }}</p>
                        </label>
                    @endforeach
                    <button class="tabs__button btn" type="submit" id="update_roles" name="update_roles" style="margin-top: 20px; margin-bottom: 20px; width: 100%; font-size: 14px;">Сохранить роли</button>
                </form>
              </div>

        </div>

      </div>  --}}
    

      <form method="POST" action="{{ route('administrator.update', ['administrator' => $user_data->id]) }}">
        @csrf
        @method('PATCH')    
        <div class="is-info__right-section">
            <div class="is-info__row">
                <p><b>Роли пользователя</b></p>
                <div>
                    @foreach ($roles as $role)
                    <label class="toggle-checkbox" style="margin-bottom: 5px;">
                        <input type="checkbox" name="roles[]" value="{{ $role->id }}" @if ($user_data->roles->contains($role)) checked @endif>
                        <span></span>
                        <p>{{ $role->name }}</p>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>
    
        <button class="tabs__button btn" type="submit" name="update_roles">Сохранить роли</button>
    </form>
    
    </div>













  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')

@endsection