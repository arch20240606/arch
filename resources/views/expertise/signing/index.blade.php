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
      /
      <span>На подписи</span>
    </div>

    <h1 class="page-title">Запросы на подписание</h1>



    @include ('expertise.menu')



    @if(!empty($successMsg))
    <div class="success-info" style="margin-bottom: 5px;">{!! $successMsg !!}</div>
    @endif
  
    @if(!empty($errorMsg))
    <div class="info-box-error" style="margin-bottom: 5px;">{!! $errorMsg !!}</div>
    @endif



    <div class="filter-title">Запросы на экспертизу: На подписании</div>



    <table class="table table_expertise">
        <thead>
        <tr>
            <th>IDE</th>
            <th style="text-align: left;">Тип</th>
            <th style="text-align: left;">Наименование</th>
            <th>Владелец</th>
            <th>Статус ГО</th>
            <th>Дата взятия в работу в УО</th>
            <th>Статус СИ</th>
            <th>Статус ГТС</th>
            <th>Статус МЦРИАП</th>
            <th>Заключение</th>
            <th>Выдал</th>
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
                <td class="table__type">{{ $type_project_name }}</td>
                <td class="table__name"><a href="{{ route ('expertise.signing.info', ['id' => $expertise->id]) }}">{{ $expertise->it_project->$names }}</a></td>
                <td class="table__author" style="text-align: center;">{{ $expertise->users->surname }} {{ $expertise->users->name }} {{ $expertise->users->middle }}</td>
                <td class="table__status">
                  @if($expertise->accept_go == 1)
                    <span class="status status_yes">Да</span>
                  @else
                    <span class="status status_no">Нет</span>
                  @endif
                </td>
                <td class="table__date">{{ date('d.m.Y H:i:s', strtotime( $expertise->created_at )) }}</td>
                <td class="table__status">
                  @if($expertise->accept_cpcp == 1)
                    <span class="status status_yes">Да</span>
                  @else
                    <span class="status status_no">Нет</span>
                  @endif
                </td>
                <td class="table__status">
                  @if ($expertise->send_to_gts == 1)
                    @if($expertise->accept_gts == 1)
                      <span class="status status_yes">Да</span>
                    @else
                      <span class="status status_no">Нет</span>
                    @endif
                  @endif
                </td>
                <td class="table__status">
                  @if($expertise->accept_mcriap == 1)
                    <span class="status status_yes">Да</span>
                  @else
                    <span class="status status_no">Нет</span>
                  @endif
                </td>

                <td class="table__version">

                  @if ($expertise->send_to_gts == 1) 
                  
                    @if($expertise->accept_go == 1 && $expertise->accept_gts == 1 && $expertise->accept_cpcp == 1 && $expertise->accept_mcriap == 1)
                      <a style="cursor: pointer;" onclick="exportPassport({{ $expertise->id }})">Скачать</a>
                    @else
                      Отсутствует
                    @endif

                  @else

                    @if($expertise->accept_go == 1 && $expertise->accept_cpcp == 1 && $expertise->accept_mcriap == 1)
                      <a style="cursor: pointer;" onclick="exportPassport({{ $expertise->id }})">Скачать</a>
                    @else
                      Отсутствует
                    @endif

                  @endif

                </td>

                <td class="table__version">
                  @if($expertise->accept_go == 1 && $expertise->accept_gts == 1 && $expertise->accept_cpcp == 1 && $expertise->accept_mcriap == 1)
                    {{ $expertise->ecp_name_mcriap }}
                  @else
                    Отсутствует
                  @endif
                </td>
            </tr>
          @endforeach

        

        </tbody>
    </table>

    {{ $expertises->links('layouts.pagination.softdeco') }}










    






  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')
@endsection


@section('scripts')
<script src="/js/ckeditor.js"></script>
<script>
	ClassicEditor
		.create( document.querySelector( '#comm_1' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>


<script>
  function exportPassport(id) {

    var token = $("input[name='_token']").val();

  
    // Vanilla JavaScript
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '{{ route('expertise.signing.export') }}', true);
    xhr.responseType = 'arraybuffer';

    xhr.onload = function() {
        if (this.status === 200) {
            var blob = new Blob([this.response], { type: 'application/pdf' });
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'ExpertiseResult.pdf';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    };

    let formData = new FormData();
    formData.append('_token', token);
    formData.append('_id', id);

    xhr.send(formData);

  }

</script>




@endsection