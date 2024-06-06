@extends('layouts.app')

@section('title')Включение в реестр бизнес-процессов@endsection


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
      <span>Включение в реестр</span>
    </div>

    <h1 class="page-title">Включение в реестр</h1>





    <div class="is-info">

      <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('businessprocess.store') }}">
        @csrf

        <div class="is-info__header">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title">Форма создания кейса с функциями</h2>
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
              <td class="table__name">Выберите дорожную карту</td>
              <td><span data-hint="Выберите дорожную карту из списка"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td>
                <select class="js-select" id="bp_roadmap" name="bp_roadmap" require>
                  @foreach ($b_roadmaps as $b_roadmap)
                  <option value="{{ $b_roadmap->id }}">{{ $b_roadmap->$names }}</option>
                  @endforeach
                </select>
              </td>
            </tr>

            <tr>
              <td class="table__name">Укажите наименование кейса</td>
              <td><span data-hint="Укажите название кейса"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status"><input class="form__field" id="bp_name" name="bp_name" type="text" maxlength="255" required></td>
            </tr>


            <tr>
              <td class="table__name">Выберите связанные функции</td>
              <td><span data-hint="Выбираются связанные функции из списка"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td>
                <select class="js-select" id="bp_functions" name="bp_functions[]" multiple="multiple" require>
                  @foreach ($b_functions as $b_function)
                  <option value="{{ $b_function->id }}">{{ $b_function->name }}</option>
                  @endforeach
                </select>
              </td>
            </tr>

            <tr>
              <td class="table__name">Укажите срок</td>
              <td><span data-hint=""><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <select class="select" id="bp_date" name="bp_date" require>
                  <option value="3-2023">3 квартал 2023 года</option>
                  <option value="4-2023">4 квартал 2023 года</option>
                  <option value="1-2024">1 квартал 2024 года</option>
                  <option value="2-2024">2 квартал 2024 года</option>
                  <option value="3-2024">3 квартал 2024 года</option>
                  <option value="4-2024">4 квартал 2024 года</option>
                  <option value="1-2025">1 квартал 2025 года</option>
                  <option value="2-2025">2 квартал 2025 года</option>
                  <option value="3-2025">3 квартал 2025 года</option>
                  <option value="4-2025">4 квартал 2025 года</option>
                  <option value="1-2026">1 квартал 2026 года</option>
                  <option value="2-2026">2 квартал 2026 года</option>
                  <option value="3-2026">3 квартал 2026 года</option>
                  <option value="4-2026">4 квартал 2026 года</option>
                  <option value="1-2027">1 квартал 2027 года</option>
                  <option value="2-2027">2 квартал 2027 года</option>
                  <option value="3-2027">3 квартал 2027 года</option>
                  <option value="4-2027">4 квартал 2027 года</option>
                </select>
              </td>
            </tr>


          </tbody>
        </table>


        <div class="buttons-wrapper" style="border-top: 1px solid #e3e5ec; padding-top: 25px; margin-top: 50px;">
          <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← Отменить и назад</a>
          <button class="btn" type="submit" id="save_case" name="save_case" style="font-size: 14px; background: #0178BC;">Сохранить</button>
        </div>

      </form>



    </div>









<!--
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
                <input name="file_bpm_asis" style="cursor: pointer;" accept=".bpm" id="file_bpm_asis" type="file">
              </td>
            </tr>

            <tr>
              <td class="table__name">Файл диаграммы TO BE</td>
              <td><span data-hint="*"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <input name="file_bpm_tobe" style="cursor: pointer;" accept=".bpm" id="file_bpm_tobe" type="file">
              </td>
            </tr>

            <tr>
              <td class="table__name">Файл программы мероприятий</td>
              <td><span data-hint="*"><img style="width: 25px;" src="/assets/images/question.png"></span></td>
              <td class="table__status">
                <input name="file_bpm_program" style="cursor: pointer;" accept=".bpm" id="file_bpm_program" type="file">
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
-->

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