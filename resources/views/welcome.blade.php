@extends('layouts.app')

@section('title'){{ trans('app.site_title') }}@endsection


@section('header')
  @include ('layouts.header')
@endsection

@section('content')
  @if ( Auth::user() )
    @include ('layouts.content_main_auth')
  @else
    @include ('layouts.content_main_without_auth')
  @endif
@endsection

@section('footer')
  @include ('layouts.footer')
@endsection



@section('other_divs')

  @include ('layouts.ask_question')
  <div id="chat" class="chat"></div>
  @include ('layouts.login_popup')
  @if ( Auth::user() )
    @include ('layouts.search_form')
  @endif
@endsection






