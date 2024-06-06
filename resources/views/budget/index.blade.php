{{-- @extends('layouts.app')

@section('title'){{ trans('app.m_budget') }} - {{ trans('app.site_title') }}@endsection


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
      <a href="{{ route('budget.index') }}">Бюджетные процессы</a>
      /
      <span>{{ trans('app.m_budget') }}</span>
    </div>

    <h1 class="page-title">Бюджетные процессы</h1>
    
    <form class="filter filter_budget form">
      <div class="filter__search form__field">
        <input type="search" name="budget-search" placeholder="{{ trans('app.search') }}">
      </div>
      <div class="filter__year form__field">
        <select name="search-year">
          <option value="" selected>Год</option>
          <option value="2023">2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
        </select>
      </div>
      <div class="filter__type form__field">
        <select name="search-year">
          <option value="" selected>Тип процесса</option>
          <option value="Начало нового бюджетного цикла">Начало нового бюджетного цикла</option>
          <option value="Корректировка">Корректировка</option>
          <option value="Уточнение">Уточнение</option>
        </select>
      </div>
    </form>
    
    <table class="table">
      <thead>
        <tr>
          <th>Наименование</th>
          <th>Год</th>
          <th>Статус</th>
          <th>Тип процесса</th>
          <th>Дата создания</th>
          <th>Дата закрытия</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($budgetProcesses as $budgetProcess)
        <tr>
          <td class="table__name">
            <a href="#">{{ $budgetProcess->name }}</a>
        </td>
        <td class="table__year">{{ $budgetProcess->year }}</td>
        <td class="table__status"><span class="status {{ $budgetProcess->isActual ? 'status_yes' : 'status_no' }}">{{ $budgetProcess->isActual ? 'Да' : 'Нет' }}</span></td>
        <td class="table__type">{{ $budgetProcess->type }}</td>
        <td class="table__date">{{ $budgetProcess->createDateTime }}</td>
        <td class="table__date">{{ $budgetProcess->finishDateTime }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="pagination">
      <!--    <a class="pagination__item" href="#">←←</a>-->
      <!--    <a class="pagination__item" href="#">←</a>-->
      <a class="pagination__item" href="#">1</a>
      <a class="pagination__item" href="#">2</a>
      <a class="pagination__item" href="#">3</a>
      <a class="pagination__item" href="#">4</a>
      <a class="pagination__item" href="#">5</a>
      <a class="pagination__item" href="#">25</a>
      <a class="pagination__item" href="#">→</a>
      <a class="pagination__item" href="#">→→</a>
    </div>
  </div>
</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')

  @include ('layouts.ask_question')
  <div id="chat" class="chat"></div>
  @include ('layouts.login_popup')
  @include ('layouts.search_form')

@endsection --}}



@extends('layouts.app')

@section('title'){{ trans('app.m_budget') }} - {{ trans('app.site_title') }}@endsection

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
      <a href="{{ route('budget.index') }}">Бюджетные процессы</a>
      /
      <span>{{ trans('app.m_budget') }}</span>
    </div>

    <h1 class="page-title">Бюджетные процессы</h1>
    
    <form class="filter filter_budget form" action="{{ route('budget.index') }}" method="GET">
      <div class="filter__search form__field">
          <input type="search" name="budget-search" placeholder="{{ trans('app.search') }}">
      </div>
      <div class="filter__year form__field">
          <select name="search-year">
              <option value="" selected>Год</option>
              <option value="2024">2024</option>
              <option value="2023">2023</option>
              <option value="2022">2022</option>
              <option value="2021">2021</option>
              <option value="2020">2020</option>
          </select>
      </div>
      <div class="filter__type form__field">
          <select name="search-type">
              <option value="" selected>Тип процесса</option>
              <option value="applying">Начало нового бюджетного цикла</option>
              <option value="adjustment">Корректировка</option>
              <option value="actualisation">Уточнение</option>
          </select>
      </div>
      <button style="height: 60px" type="submit">Применить</button>
  </form>
    
    <table class="table">
      <thead>
        <tr>
          <th>Наименование</th>
          <th>Год</th>
          <th>Статус</th>
          <th>Тип процесса</th>
          <th>Дата создания</th>
          <th>Дата закрытия</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($budgetProcesses as $budgetProcess)
        <tr>
          <td class="table__name">
            <a href="{{ route('budget.show', $budgetProcess->_id) }}">{{ $budgetProcess->name }}</a>
        </td>        
          <td class="table__year">{{ $budgetProcess->year }}</td>
          <td class="table__status"><span class="status {{ $budgetProcess->isActual ? 'status_yes' : 'status_no' }}">{{ $budgetProcess->isActual ? 'Да' : 'Нет' }}</span></td>
          {{-- <td class="table__type">{{ $budgetProcess->type }}</td> --}}
          <td class="table__type">
            <?php
            switch ($budgetProcess->type) {
                case "actualisation":
                    echo "Уточнение";
                    break;
                case "adjustment":
                    echo "Корректировка";
                    break;
                case "applying":
                    echo "Начало нового бюджетного цикла";
                    break;
                default:
                    echo "Неизвестный тип";
                    break;
            }
            ?>
        </td>
        
          <td class="table__date">{{ $budgetProcess->createDateTime }}</td>
          <td class="table__date">{{ $budgetProcess->finishDateTime }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
    {{-- <div class="pagination">
      <a class="pagination__item" href="#">{{ $budgetProcesses->links() }}</a> 
    </div> --}}
    <br><br>
      Всего: {{ $budgetProcesses->total()}}
      {{ $budgetProcesses->links('layouts.pagination.softdeco') }}
  
  
  </div>
</main>
@endsection

@section('footer')
@include ('layouts.footer')
@endsection

@section('other_divs')
@include ('layouts.ask_question')
<div id="chat" class="chat"></div>
@include ('layouts.login_popup')
@include ('layouts.search_form')
@endsection
