<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lupet Spa</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('backend.includes.style')
</head>
    <body>
        @include('backend.includes.navbar')

        @yield('content')

        @include('backend.includes.footer')


        @include('backend.includes.script')
        @yield('js')
    </body>


</html>