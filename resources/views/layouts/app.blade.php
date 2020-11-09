@include('layouts.includes.header')

@if(Auth::check())
    @include('layouts.includes.nav')
    @include('layouts.includes.breadcrumbs')
@endif

@yield('content')

@include('layouts.includes.footer')

@include('layouts.includes.bottom')



