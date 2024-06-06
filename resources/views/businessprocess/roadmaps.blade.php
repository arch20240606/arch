@extends('layouts.app')

@section('title')Цифровые карты цифровой трансформации@endsection

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
      / Цифровая трансформация / Цифровые карты цифровой трансформации

    </div>

    <h1 class="page-title">Цифровые карты цифровой трансформации</h1>

    <br><br>

    <table class="table table_expertise">
        <thead>
          <tr>
            <th>Государственный орган</th>
            <th>Комитет</th>
            <th style="text-align: left;">Наименование</th>
            <th>Примечание</th>
            <th>Статус</th>
        </tr>
        </thead>


        <tbody>
          @foreach ($roadmaps as $roadmap)
          <tr>
            <td class="table__status" style="text-align: left;">{{ $roadmap->government->$names }}</td>
            <td class="table__status">{{ $roadmap->committee }}</td>
            <td class="table__status" style="text-align: left;"><a href="#">{{ $roadmap->$names }}</a></td>
            <td class="table__status">{{ $roadmap->comments }}</td>
            <td class="table__status">
              @if ($roadmap->status == 1)
                <span class="status status_yes" style="width: 100%">Утверждено</span>
              @else
                <span class="status status_no" style="width: 100%">Отклонено</span>
              @endif
            </td>
            
          </tr>
          @endforeach

        </tbody>
    </table>

    {{ $roadmaps->links('layouts.pagination.softdeco') }}





  </div>

</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')

@include ('layouts.ask_question')
<div id="chat" class="chat"></div>
@include ('layouts.search_form')

@endsection