<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="The room booking solution for event organizers">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} · RoomBooker</title>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
    @include('layouts.front.nav')
    <main class="main-body">
        @yield('content')
    </main>
    @include('layouts.front.footer')
    <script src="{{ mix('js/app.js' )}}"></script>
    @yield('custom-script')
</body>
</html>
