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
    <div class="filter-title">Запросы на экспертизу: В работе</div>
    
  
    @if ( $expertises->isEmpty() )
      <div class="notice">В разделе <b>В работе</b> отсутствуют данные</div>
    @else

      <table class="table table_expertise">
        <thead>
        <tr>
          <th>IDE</th>
          <th>Тип проекта</th>
          <th style="text-align: left;">Наименование</th>
          <th>Версия</th>
          {{-- <th>Статус Согласующего</th> --}}
          {{-- <th>Статус Подписывающего</th>  --}}
          <th>Владелец</th> 
          <th>Статус</th>
          <th>Действие</th>
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
              @if($expertise->user_id == Auth::user()->id)
               {{-- <td class="table__name"><a href="{{ route('expertise.edit', ['expertise' => $expertise->id]) }}">{{ $expertise->it_project->$names }}</a></td> --}}
               <td class="table__name"><a href="{{ route('expertise.create_version', ['expertise' => $expertise->id]) }}">{{ $expertise->it_project->$names }}</a></td>
              @endif
              <td class="table__status">{{ $expertise->version }}</td>
              {{-- <td class="table__status">Черновик</td> --}}
              {{-- <td class="table__status">
                @if ($expertise->draft == 1 && $expertise->discart_go == 1 )
                  <span style="width: 100%; cursor: pointer;" class="status status_no">Вернул</span>
                @elseif( $expertise->discart_cpcp == 1 )
                  <span style="width: 100%; cursor: pointer;" class="status status_no">Отклонено CИ</span>
                @elseif( $expertise->discart_gts == 1 )
                  <span style="width: 100%; cursor: pointer;" class="status status_no">Отклонено ГТС</span>
                @elseif( $expertise->discart_mcriap == 1 )
                  <span style="width: 100%; cursor: pointer;" class="status status_no">Отклонено МЦРИАП</span>
                @endif
              </td> --}}
              <td class="table__status">{{$expertise->gosorg->name_ru}}</td>
              <td class="table__status">Черновик</td>
              {{-- <td class="table__status">{{ date('d.m.Y H:i:s', strtotime( $expertise->created_at )) }}</td> --}}

              <td class="table__status">
                @if($expertise->user_id == Auth::user()->id)
                    <div style="display: flex; align-items: center;">
                        {{-- <a href="{{ route('expertise.edit', ['expertise' => $expertise->id]) }}" class="feather" title="{{ trans('app.edit') }}">
                            <svg>
                                <use href="/assets/images/feather-sprite.svg#edit"/>
                            </svg>
                        </a> --}}
                        &nbsp;&nbsp;&nbsp;
                        <a href="#" class="feather" onclick="event.preventDefault(); document.getElementById('delete-expertise-{{ $expertise->id }}').submit();">
                            <svg style="stroke: #b1073a">
                                <use href="/assets/images/feather-sprite.svg#trash"/>
                            </svg>
                        </a>
                        <form id="delete-expertise-{{ $expertise->id }}" action="{{ route('expertise.destroy', ['expertise' => $expertise->id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
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