@extends('layouts.app')

@section('title'){{ trans('app.myreqests') }}@endsection

<?php
if (app()->getLocale() == "ru") {
  $names = 'name_ru';
} elseif (app()->getLocale() == "en") {
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
      {{-- <a href="{{ route('accounting.information') }}">{{ trans('app.m_uchet') }}</a> --}}
      <a href="{{ route('accounting.information') }}">Режим редактирования бюджетных заявок</a>
      /
      <span>Режим редактирования бюджетных заявок</span>
    </div>

    <h3 >Режим редактирования бюджетных заявок</h3>
    <hr>
    <h4>Бюджетный процесс</h4>
    
    <div class="is-info__body">
      <form class="form" method="POST" action="asdas">
        {{-- @foreach ($budgetall as $budget) --}}
        <div class="is-info__left is-info__col" style="width:1300px ">
          <div class="is-info__right-header">Детальная информация</div>
          <div class="is-info__row" style="margin-top: 13px;">
            <p><b>Год заявки</b></p>
            <input id="surname" name="surname" value="{{ $budgetProcess->year }}" type="text" minlength="2" maxlength="255" required>
          </div>
          <div class="is-info__row">
            <p><b>Название</b></p>
            <input id="name" name="name" value="{{ $budgetProcess->name }}" type="text" minlength="2" maxlength="255" required>
          </div>
          <div class="is-info__row">
            <p><b>Актуальность</b></p>
            <input id="middlename" name="middlename" value="{{ $budgetProcess->isActual ? 'Да' : 'Нет' }}" type="text" minlength="2" maxlength="255">
          </div>
          <div class="is-info__row">
            <p><b>Тип бюджетного процесса</b></p>
            <input id="email" name="email" value="<?php
            switch ($budgetProcess->type) {
                case "actualisation":
                    echo "Уточнение";
                    break;
                case "adjustment":
                    echo "Корректировка";
                    break;
                case "applying":
                    echo "Начало нового бюджетного цикла";
                    break;
                default:
                    echo "Неизвестный тип";
                    break;
            }
            ?>" type="text" minlength="2" maxlength="255">
          </div>
          <div class="is-info__row">
            <p><b>Список бюджетных заявок</b></p>
            <input id="new_password" name="new_password" value="Список бюджетных заявок в данном бюджетном процессе" type="text" minlength="8" maxlength="16">
            <p>Ссылка на просмотр бюджетных заявок</p>
          </div>
          <div class="is-info__row">
            <p><b>Дата создания</b></p>
            <input id="new_password" name="new_password" value="{{ $budgetProcess->createDateTime }}" type="text" minlength="8" maxlength="16">
          </div>
          <div class="is-info__row">
            <p><b>Дата закрытия</b></p>
            <input id="new_password" name="new_password" value="{{ $budgetProcess->finishDateTime }}" type="text" minlength="8" maxlength="16">
          </div>
          {{-- @endforeach --}}
          {{-- <div class="is-info__row" style="background: rgba(243, 248, 250, 0.30);">
            <p></p>
            <button class="tabs__button btn" type="submit" id="update_account" name="update_account" style="margin-top: 20px; margin-bottom: 20px; width: 100%; font-size: 14px;">Сохранить изменения</button>
          </div> --}}
        </div>
      </form>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')


@endsection