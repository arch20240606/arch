@extends('layouts.app')

@section('title')Создание эталонных данных@endsection

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
      <a class="breadcrumbs__home" href="/{{ app()->getLocale() }}">
        <svg>
          <use xlink:href="/assets/images/sprite.svg#house"></use>
        </svg>
      </a>
      / 
      <a href="{{ route('etalondatas.index') }}">Эталонные данные</a>
      /
      <span>Создание эталонных данных</span>

    </div>

    <h1 class="page-title">Создание эталонных данных</h1>

    @include ('etalondata.menu')


    @if(!empty($successMsg))
      <div class="success-info">{!! $successMsg !!}</div>
    @endif

    @if(!empty($errorMsg))
      <div class="info-box-error"><b>{{ trans('app.reg_error') }}:</b> {!! $errorMsg !!}</div>
    @endif



    <div class="is-info">

      <form class="form" enctype="multipart/form-data" method="POST" action="#">
        @csrf

        <div class="is-info__header">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title">Формирование эталонных данных</h2>
        </div>


        <table class="table">
          <thead>
            <tr>
              <th style="width: 35%; border: 0px;"></th>
              <th style="width: 5%; border: 0px;"></th>
              <th style="width: 60%; border: 0px;"></th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td class="table__name">{{ trans('app.dc_name_go') }}</td>
              <td><span data-hint="{{ trans('app.dc_name_go_t') }}"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <select id="go_select" name="go_select" required>
                  <option value="0" selected>{{ trans('app.dc_name_go_select') }}</option>
                  @foreach ($governments as $government)
                  <option value="{{ $government->id }}">{{ $government->$names }}</option>
                  @endforeach
                </select>
              </td>
            </tr>

            <tr>
              <td class="table__name">Домен</td>
              <td><span data-hint="Указывается название домена: например - Бизнес"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <select id="go_select" name="go_select" required>
                  <option value="0" selected>Выберите домен из списка</option>
                  @foreach ($domains as $domain)
                  <option value="{{ $domain->id }}">{{ $domain->$names }}</option>
                  @endforeach
                </select>
              </td>
            </tr>

            <tr>
              <td class="table__name">Укажите тип данных</td>
              <td><span data-hint="Указывается тип данных: например - Физ.лицо, Документ, Объект и т.д."><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="users_npa" name="users_npa" type="text" maxlength="1500" required></td>
            </tr>

            <tr>
              <td class="table__name">Укажите уровень</td>
              <td><span data-hint="Указывается уровень: например - 1, 2, 3..."><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="data_source" name="data_source" type="text" maxlength="590" required></td>
            </tr>

            <tr>
              <td class="table__name">Наименование эталонных данных</td>
              <td><span data-hint="Указывается наименование эталонных данных"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="data_source_fact" name="data_source_fact" maxlength="590" type="text" required></td>
            </tr>

            <tr>
              <td class="table__name">Документация</td>
              <td><span data-hint="Указывается документация: например - ссылка на НПА или описание"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="data_source_fact" name="data_source_fact" maxlength="590" type="text" required></td>
            </tr>

            <tr>
              <td class="table__name">Атрибуты</td>
              <td><span data-hint="Указываются атрибуты: например - Наименование, министерство, номер договора и т.д."><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="data_source_fact" name="data_source_fact" maxlength="590" type="text" required></td>
            </tr>
          </tbody>
        </table>



        <div class="buttons-wrapper" style="border-top: 1px solid #e3e5ec; padding-top: 25px; margin-top: 50px;">
          <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← {{ trans('app.but_cancel') }}</a>
          <button class="btn" type="submit" id="save_draft" name="save_draft" style="font-size: 14px; background: #00317B;">{{ trans('app.but_save') }}</button>
          <button class="btn" type="submit" id="save_send" name="save_send" style="font-size: 14px; background: #0178BC;">{{ trans('app.but_send') }}</button>
        </div>

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