@extends('layouts.app')

@section('title')Редактирование бизнес-процесса@endsection


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
      <a href="{{ route('businessprocess.reestr') }}">Реестр бизнес-процессов</a>
      /
      <span>Утверждение бизнес-процесса</span>
    </div>

    <h1 class="page-title">{{ $b_process->name }}</h1>



    <div class="is-info">

    <form class="form" method="POST" action="{{ route('businessprocess.reestr.approve', ['id' => $b_process->id]) }}">
      @csrf


      <div class="is-info__header">
        <div class="is-info__header-logo">
          <img src="/assets/images/coordinate-system 1.svg" alt="">
        </div>
        <h2 class="is-info__header-title">Форма утверждения бизнес-процесса</h2>
      </div>


      <table class="table">
        <thead>
          <tr>
            <th style="width: 20%; border: 0px;"></th>
            <th style="width: 65%; border: 0px;"></th>
            <th style="width: 15%; border: 0px;"></th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td class="table__name">Наименование функции</td>
            <td style="color: #007aff;">{{ $b_process->b_functions->name }}</td>
            <td></td>
          </tr>

          <tr>
            <td class="table__name">Наименование бизнес-процесса</td>
            <td style="color: #007aff;">{{ $b_process->name }}</td>
            <td></td>
          </tr>


          <tr>
              <td class="table__name">Файл диаграммы AS IS</td>
              <td style="display: flex; flex-direction: row; align-items: center;">
                @if ($b_process->file_as_is)
                  @if ($b_process->file_as_is_accept == "on")
                    <a class="feather-green" target="_blank" href="/storage/{{ $b_process->file_as_upload }}">
                      <svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg>
                    </a>
                  @else
                    <a class="feather-yellow" target="_blank" href="/storage/{{ $b_process->file_as_upload }}">
                      <svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg>
                    </a>
                  @endif
                  <span style="padding-left: 20px;">{{ $b_process->file_as_is }}</span>
                @else
                  Файл отсутствует
                @endif
              </td>
              <td>
                @if ($b_process->file_as_is)
                  <label class="toggle-checkbox">
                    <input type="checkbox" name="file_as_is_accept" id="file_as_is_accept" @if ($b_process->file_as_is_accept == "on") checked @endif>
                    <span></span>
                    <p>Утвердить</p>
                  </label>
                @endif
              </td>
            </tr>


            <tr>
              <td class="table__name">Файл диаграммы TO BE</td>
              <td style="display: flex; flex-direction: row; align-items: center;">
                @if ($b_process->file_to_be)
                  @if ($b_process->file_to_be_accept == "on")
                    <a class="feather-green" target="_blank" href="/storage/{{ $b_process->file_to_be_upload }}">
                      <svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg>
                    </a>
                  @else
                    <a class="feather-yellow" target="_blank" href="/storage/{{ $b_process->file_to_be_upload }}">
                      <svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg>
                    </a>
                  @endif
                  <span style="padding-left: 20px;">{{ $b_process->file_to_be }}</span>
                @else
                  Файл отсутствует
                @endif
              </td>
              <td>
                @if ($b_process->file_to_be)
                  <label class="toggle-checkbox">
                    <input type="checkbox" name="file_to_be_accept" id="file_to_be_accept" @if ($b_process->file_to_be_accept == "on") checked @endif>
                    <span></span>
                    <p>Утвердить</p>
                  </label>
                @endif
              </td>
            </tr>


            <tr>
              <td class="table__name">Файл плана мероприятий</td>
              <td style="display: flex; flex-direction: row; align-items: center;">
                @if ($b_process->file_program)
                  @if ($b_process->file_program_accept == "on")
                    <a class="feather-green" target="_blank" href="/storage/{{ $b_process->file_program_upload }}">
                      <svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg>
                    </a>
                  @else
                    <a class="feather-yellow" target="_blank" href="/storage/{{ $b_process->file_program_upload }}">
                      <svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg>
                    </a>
                  @endif
                  <span style="padding-left: 20px;">{{ $b_process->file_program }}</span>
                @else
                  Файл отсутствует
                @endif
              </td>
              <td>
                @if ($b_process->file_program)
                  <label class="toggle-checkbox">
                    <input type="checkbox" name="file_program_accept" id="file_program_accept" @if ($b_process->file_program_accept == "on") checked @endif>
                    <span></span>
                    <p>Утвердить</p>
                  </label>
                @endif
              </td>
            </tr>


        </tbody>
      </table>

      <div style="border-top: 1px solid #e3e5ec; padding-top: 0px; margin-top: 50px;">
        <div style="margin-left: 15px;">
          <div><p><b>Комментарий к бизнес-процессу</b></p></div>
          <div class="form__field">
            <textarea name="comment" id="comment" placeholder="Напишите комментарий о причине отклонения">{{ $b_process->comment }}</textarea>
          </div>
        </div> 
      </div>

      <div class="buttons-wrapper" style="border-top: 1px solid #e3e5ec; padding-top: 25px; margin-top: 50px;">
        <div style="margin-left: 15px;">
          <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← Назад</a>
          <button class="btn" type="submit" id="accept_bp" name="accept_bp" style="font-size: 14px; background: #0178BC;">Принять</button>
          <button class="btn" type="submit" id="discard_bp" name="discard_bp" style="font-size: 14px; background: #FF6A97;">Отклонить</button>
        </div>
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