@extends('layouts.app')

@section('title'){{ trans('app.expert') }} - {{ trans('app.site_title') }}@endsection

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
      <a href="{{ route('expertise.index') }}">{{ trans('app.m_expert') }}</a>
      <!--
      /
      <span>{{ trans('app.d_catalog') }}</span>
      -->
    </div>

    <h1 class="page-title">{{ trans('app.m_expert') }}</h1>

    @include ('expertise.menu')


    <div class="filter-title">Запросы на экспертизу: Подписи</div>

    @if ( $expertises->isEmpty() )
      <div class="notice">В разделе <b>Подписи</b> отсутствуют данные</div>
    @else

      <table class="table table_expertise">
        <thead>
        <tr>
          <th>IDE</th>
          <th>Тип проекта</th>
          <th style="text-align: left;">Наименование</th>
          <th>Версия</th>
          <th>Статус ГосСогласующего</th>
          <th>Статус ГосПодписывающего</th>
          {{-- <th>Статус</th> --}}
        </tr>
        </thead>
        <tbody>

          @foreach ($expertises as $expertise)
            <?php
            if ( $expertise->type_project == "1" ) {
              $type_project_name = "Запрос государственного органа на автоматизацию деятельности государственного органа в уполномоченный орган и сервисному интегратору (СМИ)";
            } elseif ( $expertise->type_project == "2" ) {
              $type_project_name = "Инвестиционное предложение";
            } elseif ( $expertise->type_project == "3" ) {
              $type_project_name = "Технико-экономическое обоснование";
            } elseif ( $expertise->type_project == "4" ) {
              $type_project_name = "Техническое задание";
            } else {
              $type_project_name = "Не определен";
            }
            ?>

            <tr>
              <td class="table__status">{{ $expertise->id }}</td>
              <td class="table__status">{{ $type_project_name }}</td>
              {{-- <td class="table__name"><a href="{{ route ('expertise.approve.info', ['id' => $expertise->id]) }}">{{ $expertise->it_project->$names }}</a></td> --}}
              <td class="table__name"><a href="{{ route('expertise.create_version', ['expertise' => $expertise->id]) }}">{{ $expertise->it_project->$names }}</a></td>
              <td class="table__status">{{ $expertise->version }}</td>
              {{-- <td class="table__status">{{ $expertise->num_poject }}</td>
              <td class="table__status">{{ $expertise->company }}</td>
              <td class="table__status">{{ date('d.m.Y H:i:s', strtotime( $expertise->created_at )) }}</td>
              <td class="table__status">{{ date('d.m.Y H:i:s', strtotime( $expertise->updated_at )) }}</td> --}}
              <td class="table__status">
                @if ( $expertise->go_approve == 1 )
                  <span style="width: 100%; cursor: pointer;" class="status status_yes">Согласовал</span>
                @else
                  <span style="width: 100%; cursor: pointer;" class="status status_wait">Ожидание рассмотрения</span>
                @endif
              </td>
              <td class="table__status">
                @if ( $expertise->send_to_go_signer == 1 )
                  <span style="width: 100%; cursor: pointer;" class="status status_wait">На подписании</span>
                @else
                  <span style="width: 100%; cursor: pointer;" class="status status_wait">Ожидание рассмотрения</span>
                @endif
              </td>


            </tr>

          @endforeach



        </tbody>
      </table>

      {{ $expertises->links('layouts.pagination.softdeco') }}

    @endif



    <!-- Toast сообщение -->
    @if(session('successMsg'))
    <div class="toast" id="toast" style="position: fixed; top: 20px; right: 20px; background-color: #00f110; color: #fff; padding: 25px; border-radius: 5px; z-index: 1000;">
        {{ session('successMsg') }}
    </div>
    @endif

    @if(session('errorMsg'))
        <div class="toast" id="errorToast" style="position: fixed; top: 20px; right: 20px; background-color: #ff0000; color: #fff; padding: 25px; border-radius: 5px; z-index: 1000;">
            <b>{{ trans('app.reg_error') }}:</b> {{ session('errorMsg') }}
        </div>
    @endif



    


  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')



@endsection

@section('scripts')
<script>
// Функция для показа toast сообщения
function showToast(message, error = false) {
    var toastId = error ? 'errorToast' : 'toast';
    var toast = document.getElementById(toastId);
    toast.innerText = message;
    toast.style.display = 'block';
    setTimeout(function() {
        toast.style.display = 'none';
    }, 5000); // Скрыть toast сообщение через 5 секунд
}

// Вызов функции для показа toast сообщения об успехе
showToast('{{ session('successMsg') }}');

// Вызов функции для показа toast сообщения об ошибке
@if((session('errorMsg')))
    showToast('{{ session('errorMsg') }}', true);
@endif
</script>
@endsection