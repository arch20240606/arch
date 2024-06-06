@extends('layouts.app')

@section('title'){{ trans('app.myreqests') }}@endsection

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
      <a href="{{ route('accounting.information') }}">{{ trans('app.m_uchet') }}</a>
      /
      <a href="{{ route('accounting.iss') }}">Информационные системы</a>
    </div>

    <h1>Информационные системы</h1>

    
  
   

    <div class="filter-container" style="display: flex; align-items: center; gap: 380px;">
      <form class="filter filter_expertise form" method="GET" action="{{ route('accounting.search') }}">
          <div class="filter__search form__field">
              <input type="text" name="query" placeholder="Поиск...">
          </div>
          <div class="filter__type form__field">
              <button class="tabs__button btn" style="border-radius: 8px 8px 8px 8px;" type="submit">Найти</button>
          </div>
      </form>
  
      <form class="form" method="GET" action="{{ route('accounting.iss') }}">
        <label for="status" style="margin-left: 200px">Фильтр по статусу:</label>
        <div style="margin-left: 200px; margin-top: 10px">
            <select name="status" id="status">
                <option value="all">Выберите статус</option>
                <option value="all">Все</option>
                <option value="published">Опубликованные</option>
                <option value="draft">Черновик</option>
                <option value="review">На рецензировании в УО</option>
            </select>
            {{-- <button class="tabs__button btn" style="border-radius: 8px 8px 8px 8px;" type="submit">Применить</button> --}}
        </div>
    </form>
  </div>
  

  
  
    
  


    @if ($iss->count() > 0 )

      <table class="table table_expertise" style="font-weight: normal; color: #000000;">
        <thead>
          <tr>
            <th style="text-align: center;">IDIS</th>
            {{-- <th style="text-align: center;">ID old</th> --}}
            <th style="text-align: left;">Наименование</th>
            <th>Аббревиатура</th>
            <th>Владелец</th>
            <th>Регистрационный номер</th>
            <th>Дата обновления</th>
            <th>Текущий статус</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($iss as $is)
          <tr>
            <td class="table__status">{{ $is->idis }}</td>
            {{-- <td class="table__status">{{ $is->_id }}</td> --}}
            <td class="table__status" style="text-align: left;"><a href="{{ route('accounting.show', ['accounting' => $is->idis]) }}">{{ $is->name }}</a>
            </td>
            <td class="table__status">{{ $is->AppShortName }}</td>
            <td class="table__status">{{ $is->gosorg->name}}</td>
            <?php
            $date = new DateTime();
            $date->setTimestamp($is->objCreateDate);
            ?>
            <td class="table__status">{{ $is->regNumber }}</td>
            <td class="table__status">{{ date('l dS \o\f F Y h:i:s A', $is->objCreateDate ) }} </td>
            <td class="table__status">
              @if ($is->bpStatus == "published")
                <span style="width: 100%;" class="status status_yes">Опубликованные</span>
              @elseif ($is->bpStatus == "draft")
                <span style="width: 100%;" class="status">Черновик</span>
              @elseif ($is->bpStatus == "review")
                <span style="width: 100%;" class="status status_wait">На рецензировании в УО</span>
              {{-- @else
                <span style="width: 100%;" class="status">Черновик</span> --}}
              @endif
            </td>
          </tr>
        @endforeach

        </tbody>
      </table>

      <br><br>
      Всего: {{ $iss->total()}}
      {{ $iss->links('layouts.pagination.softdeco') }}

    @else
      <div class="info-box-error" style="margin-bottom: 5px;">В разделе <b>Информационные системы</b> данные отсутствуют</div>
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
  document.getElementById('status').addEventListener('change', function() {
      this.form.submit();
  });
</script>
@endsection