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
      <span>Редактирование запроса на экспертизу</span>
    </div>

    <h1 class="page-title">Редактирование запроса на экспертизу</h1>


    @include ('expertise.menu')

    @if(!empty($successMsg))
    <div class="success-info">{!! $successMsg !!}</div>
    @endif

    @if(!empty($errorMsg))
    <div class="info-box-error"><b>{{ trans('app.reg_error') }}:</b> {!! $errorMsg !!}</div>
    @endif





    <div class="is-info">

      <form class="form" enctype="multipart/form-data" method="POST" action="{{ route('expertise.store') }}">
        @csrf

        <div class="is-info__header">
          <div class="is-info__header-logo">
            <img src="/assets/images/coordinate-system 1.svg" alt="">
          </div>
          <h2 class="is-info__header-title"><span style="font-weight: normal;">{{ $type_project_name }}</span> «{{ $expertise->it_project->$names }}»</h2>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: flex-start; padding: 15px; box-sizing: border-box;">
          <div style="border: 1px solid #d7d2d2; width: 48%; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); overflow: hidden;">
              <div style="background-color: #05adea; padding: 15px; color: #fff; text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                  Последние действия
              </div>
              <div style="padding: 15px;">
                  <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #d7d2d2; padding-bottom: 10px; margin-bottom: 10px;">
                      <span style="display: flex; align-items: center;">
                          <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px; margin-right: 5px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 2a10 10 0 100 20 10 10 0 000-20zM12 11a3 3 0 110-6 3 3 0 010 6zM12 12c-2.667 0-5 1.333-5 4v1h10v-1c0-2.667-2.333-4-5-4z"/>
                          </svg>
                          <strong style="padding-right: 10px;">{{$expertise->users->surname}} {{$expertise->users->name}}</strong> Создание
                      </span>
                      <span>{{ \Carbon\Carbon::parse($expertise->created_at)->format('d/m/Y H:i:s') }}</span>
                  </div>
              </div>
          </div>
      
          <div style="border: 1px solid #d7d2d2; padding: 5px 10px; border-radius: 5px; display: flex; align-items: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); background-color: #fff;">
              {{-- <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px; margin-right: 5px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 2a10 10 0 100 20 10 10 0 000-20zM12 11a3 3 0 110-6 3 3 0 010 6zM12 12c-2.667 0-5 1.333-5 4v1h10v-1c0-2.667-2.333-4-5-4z"/>
              </svg> --}}
              Кому отписано  <strong style="padding-left: 10px;">{{$expertise->users->surname}} {{$expertise->users->name}}</strong>
          </div>
      </div>
      
      
      
      
      
      
      
      

        @include('expertise.tabs_for_data_edit')

        <!-- это важные переменные -->
        <input type="hidden" id="it_project_id" name="it_project_id" value="{{ $expertise->it_project_id }}">
        <input type="hidden" id="type_project" name="type_project" value="{{ $expertise->type_project }}">
        <input type="hidden" id="expertise_id" name="expertise_id" value="{{ $expertise->id }}">        
        <!--// это важные переменные -->

      
            <input type="hidden" id="approver_id1" name="approver_id1">
            <input type="hidden" id="signer_id" name="signer_id">
          <h2>Отправка заявки</h2>
          
          <label for="signer">Подписывающие:</label>
          <td><span style="font-size: 20px; color: #FF6A97">*</span></td>
          <select id="signer" name="signer_id" style="width: 100%; padding: 8px 12px; margin-bottom: 15px;">
              <option value="" selected disabled>Выберите Подписывающего</option>
              @foreach($users as $user)
              @if($user->hasRole('ROLE_GO_EXPERTISE_SIGNER') && $user->government_id == $currentGovernmentId)
              <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }} {{ $user->middlename }}</option>
              @endif
              @endforeach
          </select>
          
          
          <label for="approver1">Согласующие:</label>
          <select id="approver1" name="approver_id1" style="width: 100%; padding: 8px 12px; margin-bottom: 15px;">
          <option value="" selected disabled>Выберите Согласующего</option>
            @foreach($users as $user)
              @if($user->hasRole('ROLE_GO_EXPERTISE_CONFIRMER') && $user->government_id == $currentGovernmentId)
                <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }} {{ $user->middlename }}</option>
              @endif
            @endforeach
          </select>

      


        <div class="buttons-wrapper" style="border-top: 1px solid #e3e5ec; padding-top: 25px; margin-top: 50px;">
          <a class="btn btn_white" style="font-size: 14px;" onclick="history.back()">← {{ trans('app.but_cancel') }}</a>
          <button class="btn" type="submit" id="save_draft_tab" name="save_draft_tab" style="font-size: 14px; background: #00317B;">{{ trans('app.but_save') }}</button>
          <button class="btn" type="submit" id="create_and_send_tab" name="create_and_send_tab" style="font-size: 14px; background: #0178BC;">Сформировать и отправить</button>
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

  var projectType = document.getElementById("project_type");
  var projectTypeSpan = document.getElementById("full_project_type");

  var itProject = document.getElementById("it_project");
  var itProjectSpan = document.getElementById("full_it_project");

  projectType.addEventListener('change', function() {
    var selectedType = projectType.value;
    switch (selectedType) {
        case '1':
          projectTypeSpan.innerHTML = 'Запрос государственного органа на автоматизацию деятельности государственного органа в уполномоченный орган и сервисному интегратору (СМИ)';
          break;
        case '2':
          projectTypeSpan.innerHTML = 'Инвестиционное предложение';
          break;
        case '3':
          projectTypeSpan.innerHTML = 'Технико-экономическое обоснование';
          break;
        case '4':
          projectTypeSpan.innerHTML = 'Техническое задание';
          break;
        default:
          projectTypeSpan.innerHTML = '';
    }
  });


  itProject.addEventListener('change', function() {
    if(itProject.value > 0) {
      var selectedIT = itProject.options[itProject.selectedIndex];
      itProjectSpan.textContent = "«" + selectedIT.innerHTML + "»";
    } else {
      itProjectSpan.textContent = '';
    }
  });


</script>




<script src="/js/ckeditor.js"></script>
<script>
	ClassicEditor
		.create( document.querySelector( '#editor_1' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

  ClassicEditor
    .create( document.querySelector( '#editor_2' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

  ClassicEditor
    .create( document.querySelector( '#editor_3' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

  ClassicEditor
    .create( document.querySelector( '#editor_4' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
  ClassicEditor
    .create( document.querySelector( '#editor_5' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );    
  ClassicEditor
    .create( document.querySelector( '#editor_6' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
  ClassicEditor
    .create( document.querySelector( '#editor_7' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
  ClassicEditor
    .create( document.querySelector( '#editor_8' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
  ClassicEditor
    .create( document.querySelector( '#editor_9' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
  ClassicEditor
    .create( document.querySelector( '#editor_10' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
  ClassicEditor
    .create( document.querySelector( '#editor_11' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );    
  ClassicEditor
    .create( document.querySelector( '#editor_12' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>
@endsection