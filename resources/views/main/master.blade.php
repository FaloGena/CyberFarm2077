<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('main.header')
@stack('styles')

<body>
@yield('content')
</body>

@include('main.footer')
@stack('scripts')
</html>
