@extends('layouts.app')

@section('title')Создание бизнес-процесса@endsection


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
      <a href="{{ route('businessprocess.index') }}">Реестр бизнес-процессов</a>
      /
      <span>Создание бизнес-процесса</span>
    </div>

    <h1 class="page-title">Создание бизнес-процесса</h1>



    <div class="is-info">

    <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('businessprocess.store') }}">
      @csrf

      <div class="is-info__header">
        <div class="is-info__header-logo">
          <img src="/assets/images/coordinate-system 1.svg" alt="">
        </div>
        <h2 class="is-info__header-title">Форма создания бизнес-процесса</h2>
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
            <td class="table__name">Кейс</td>
            <td><input type="hidden" id="businesscase_id" name="businesscase_id" value="{{ $b_case->id }}"></td>
            <td>{{ $b_case->name }}</td>
          </tr>

          <tr>
            <td class="table__name">Выберите функцию</td>
            <td><span data-hint="Выберите функцию"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
            <td>
              <select class="js-select" id="bp_function" name="bp_function" require>
                @foreach ($b_functions as $b_function)
                <option value="{{ $b_function->id }}">{{ $b_function->name }}</option>
                @endforeach
              </select>
            </td>
          </tr>

          <tr>
            <td class="table__name">Укажите наименование бизнес-процесса</td>
            <td><span data-hint="Здесь надо указать название бизнес-процесса"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
            <td class="table__status"><input class="form__field" id="bp_name" name="bp_name" type="text" required></td>
          </tr>


          <tr>
              <td class="table__name">Файл диаграммы AS IS</td>
              <td><span data-hint="*"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <input name="file_bpm_asis" style="cursor: pointer;" accept=".bpmn" id="file_bpm_asis" type="file">
              </td>
            </tr>

            <tr>
              <td class="table__name">Файл диаграммы TO BE</td>
              <td><span data-hint="*"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <input name="file_bpm_tobe" style="cursor: pointer;" accept=".bpmn" id="file_bpm_tobe" type="file">
              </td>
            </tr>

            <tr>
              <td class="table__name">Файл плана мероприятий</td>
              <td><span data-hint="*"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <input name="file_bpm_program" style="cursor: pointer;" accept=".doc, .docx, .pdf" id="file_bpm_program" type="file">
              </td>
            </tr>


        </tbody>
      </table>


      <div class="buttons-wrapper" style="border-top: 1px solid #e3e5ec; padding-top: 25px; margin-top: 50px;">
        <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← Отменить и назад</a>
        <button class="btn" type="submit" id="save_send" name="save_send" style="font-size: 14px; background: #0178BC;">Сохранить</button>
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


@section('scripts')


<script type="text/javascript">
$(document).ready(function() {
  $('.js-select').select2();
});
</script>



@endsection