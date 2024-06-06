@extends('layouts.app')

@section('title'){{ trans('app.main') }} - {{ trans('app.site_title') }}@endsection


@section('header')
  @include ('layouts.header')
@endsection

@section('content')
  @include ('layouts.content_main_auth')
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







