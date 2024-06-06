@extends('layouts.app')

@section('title')Административный раздел - {{ trans('app.site_title') }}@endsection

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
      <a href="{{ route('administrator.index') }}">Административный раздел</a>
      /
      <a href="{{ route('administrator.uchet') }}">Список данных учета сведений</a>
      /
      Редактирование данных
    </div>

    <h1 class="page-title" style="margin-bottom: 50px;">Административный раздел</h1>

    @include ('administrator.menu')




    @if(!empty($successMsg))
    <div class="success-info">{!! $successMsg !!}</div>
    @endif

    @if(!empty($errorMsg))
    <div class="info-box-error"><b>{{ trans('app.reg_error') }}:</b> {!! $errorMsg !!}</div>
    @endif




    <div class="is-info">

      <form class="form" method="POST" action="{{ route('administrator.update', ['administrator' => $infosys->id]) }}">
        @csrf
        @method('PATCH')

        <div class="is-info__header">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title">Редактирование данных</span></h2>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th style="width: 20%; border: 0px;"></th>
              <th style="width: 80%; border: 0px;"></th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td>Наименование на государственном языке</td>
              <td><input class="form__field" id="name_kz" name="name_kz" value="{{ $infosys->name_kz }}" type="text" minlength="5" maxlength="500" required tabindex="1" autofocus></td>
            </tr>

            <tr>
              <td>Наименование на русском языке</td>
              <td><input class="form__field" id="name_ru" name="name_ru" value="{{ $infosys->name_ru }}" type="text" minlength="5" maxlength="500" required tabindex="2"></td>
            </tr>

            <tr>
              <td>Наименование на английском языке</td>
              <td><input class="form__field" id="name_en" name="name_en" value="{{ $infosys->name_en }}" type="text" minlength="5" maxlength="500" required tabindex="3"></td>
            </tr>

            <tr>
              <td>Аббревиатура</td>
              <td><input class="form__field" id="abbreviation" name="abbreviation" value="{{ $infosys->abbreviation }}" type="text" minlength="1" maxlength="500" required tabindex="3"></td>
            </tr>

            <tr>
              <td>ЦГО/МИО</td>
              <td><input class="form__field" id="cgo_mio" name="cgo_mio" value="{{ $infosys->cgo_mio }}" type="text" minlength="1" maxlength="500" required tabindex="3"></td>
            </tr>

            <tr>
              <td>Комментарий</td>
              <td>
                <textarea class="form__field" id="comment" name="comment">{{ $infosys->comment }}</textarea>
              </td>
            </tr>

            <tr>
              <td>Государственный орган</td>
              <td>
                <select id="go_select" name="go_select" required>
                  @foreach ($governments as $government)
                  <option value="{{ $government->id }}" @if ($infosys->goverment_id == $government->id) selected @endif>{{ $government->$names }}</option>
                  @endforeach
                </select>
              </td>
            </tr>

            <tr>
              <td>Тип</td>
              <td>
                <select id="type_select" name="type_select" required>
                  @foreach ($types as $type)
                  <option value="{{ $type->id }}" @if ($infosys->type_is == $type->id) selected @endif>{{ $type->$names }}</option>
                  @endforeach
                </select>
              </td>
            </tr>

            <tr>
              <td>Статус</td>
              <td>
                <select id="status_select" name="status_select" required>
                  <option value="0" @if ($infosys->status == 0) selected @endif>На рассмотрении</option>
                  <option value="1" @if ($infosys->status == 1) selected @endif>Утверждено</option>
                  <option value="2" @if ($infosys->status == 2) selected @endif>Отклонено</option>
                </select>
              </td>
            </tr>


          </tbody>
        </table>

        <div class="buttons-wrapper" style="border-top: 1px solid #e3e5ec; padding-top: 25px; margin-top: 50px;">
          <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← {{ trans('app.but_cancel') }}</a>
          <button class="btn" type="submit" id="update_infosys" name="update_infosys" style="font-size: 14px; background: #00317B;">Изменить</button>
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