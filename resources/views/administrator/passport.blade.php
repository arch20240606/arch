@extends('layouts.app')

@section('title')Административный раздел - {{ trans('app.site_title') }}@endsection

<?php
if (app()->getLocale() == "ru") {
  $name_go = 'name_ru';
} elseif (app()->getLocale() == "en") {
  $name_go = 'name_en';
} else {
  $name_go = 'name_kz';
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
      <a href="{{ route('administrator.passport') }}">Список паспортов</a>
    </div>

    <h1 class="page-title" style="margin-bottom: 50px;">Административный раздел</h1>

    @include ('administrator.menu')

    <h3>Список паспортов Дата каталога ( всего {{ $passports->total()}} )</h3>

    <form class="filter filter_expertise form">
      <div class="filter__search form__field">
        <input type="search" name="budget-search" placeholder="Поиск">
      </div>
      <div class="filter__type form__field">
        <select name="search-year">
          <option value="" selected>Государственный орган</option>
        </select>
      </div>
      <div class="filter__version form__field">
        <select name="search-status">
          <option value="" selected>Статус</option>
          <option value="Черновик">Черновик </option>
          <option value="На утверждении">На утверждении</option>
          <option value="На согласовании">На согласовании</option>
          <option value="Согласовано">Согласовано</option>
        </select>
      </div>

    </form>


    <table class="table table_expertise" style="font-weight: normal; color: #000000;">
      <thead>
        <tr>
          <th style="text-align: center;">IDP</th>
          <th>{{ trans('app.tab_go') }}</th>
          <th>{{ trans('app.tab_is') }}</th>
          <th>{{ trans('app.tab_responsible') }}</th>
          <th>Дата создания</th>
          <th>Текущий статус</th>
          <th>Ответственные у ГО</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($passports as $passport)

        <tr>
          <td class="table__status">{{ $passport->id }}</td>
          <td class="table__status">{{ $passport->government->$name_go }}</td>
          <td class="table__status"><a href="#">{{ $passport->information_system->name_ru }}</a></td>
          <td class="table__status">{{ $passport->user->surname }} {{ $passport->user->name }} {{ $passport->user->middlename }}</td>
          <td class="table__status">{{ date('d.m.Y H:i:s', strtotime( $passport->created_at )) }}</td>




          <td class="table__status">

            @if ( $passport->accepted_go == 1 )
            <span style="width: 100%; cursor: default; padding-left: 10px; background-image: none;" class="status status_yes" title="Всё норм. Находится в Каталоге">
              Согласован ЦПЦП<br>
              {{ date('d.m.Y в H:i:s', strtotime( $passport->accepted_go_at )) }}
            </span>
            @elseif ( $passport->discarted_go == 1 )
            <span style="width: 100%; cursor: default; padding-left: 10px; background-image: none;" class="status status_no" title="Находится у ответственного лица в черновиках">
              Отклонен ЦПЦП<br>
              {{ date('d.m.Y в H:i:s', strtotime( $passport->discarted_go_at )) }}
            </span>
            @elseif ( $passport->accepted == 1 )
            <span style="width: 100%; cursor: default; padding-left: 10px; background-image: none;" class="status status_wait" title="Находится в ЦПЦП">
              На согласовании<br>
              {{ date('d.m.Y в H:i:s', strtotime( $passport->accepted_at )) }}
            </span>
            @elseif ( $passport->send == 1 )
            <span style="width: 100%; cursor: default; padding-left: 10px; background-image: none;" class="status status_wait" title="Находится в ГО. ФИО лиц справа">
              На утверждении<br>
              {{ date('d.m.Y в H:i:s', strtotime( $passport->updated_at )) }}
            </span>
            @elseif ( $passport->draft == 1 )
            <span style="width: 100%; cursor: default; padding-left: 10px; background-image: none;" class="status" title="Находится у ответственного лица">Черновик</span>
            @endif

          </td>

          <td class="table__status" style="font-size: 12px;">
            <?php
            if ($passport->approve_users !== 'null') {
              $emps = json_decode($passport->approve_users);
              $emps_list = "";

              foreach ($emps as $emp) {
                $emps_list .= '<p>' . $passport->getUser($emp)->surname . ' ' . $passport->getUser($emp)->name . ' ' . $passport->getUser($emp)->middlename . '</p>';
              }

              echo $emps_list;
            }
            ?>
          </td>

        </tr>

        @endforeach



      </tbody>
    </table>



    {{ $passports->links('layouts.pagination.softdeco') }}





  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')

@endsection