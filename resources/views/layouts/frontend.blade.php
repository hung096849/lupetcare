<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lupet Spa</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('backend.frontend.style')
</head>
<body>
    @include('backend.frontend.header')

    @yield('content')
    
    @include('backend.frontend.footer')


    @include('backend.frontend.script')
    
    @yield('js')
</body>
</html>