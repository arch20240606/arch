<header class="header">
  <div class="container container_large">
    @if ( Auth::user() )
      @include ('layouts.header_auth')
    @else
      @include ('layouts.header_without_auth')
    @endif
  </div>
</header>