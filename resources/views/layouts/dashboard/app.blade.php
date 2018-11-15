<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} · RoomBooker</title>
    <link href="{{ mix('css/dashboard.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="app">
    <!-- @TOC -->
    <!-- =================================================== -->
    <!--
      + @Page Loader
      + @App Content
          - #Left Sidebar
              > $Sidebar Header
              > $Sidebar Menu

          - #Main
              > $Topbar
              > $App Screen Content
    -->

    <!-- @Page Loader -->
    <!-- =================================================== -->
    <div id='loader'>
        <div class="spinner"></div>
    </div>

    <script>
        window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
            setTimeout(() => {
                loader.classList.add('fadeOut');
            }, 300);
        });
    </script>

    <!-- @App Content -->
    <!-- =================================================== -->
    <div>
        @include('layouts.dashboard.sidebar')

        <!-- #Main ============================ -->
        <div class="page-container">
            @include('layouts.dashboard.nav')

            <!-- ### $App Screen Content ### -->
            <main class='main-content bgc-grey-100'>
                @yield('content')
            </main>

            <!-- ### $App Screen Footer ### -->
            @include('layouts.dashboard.footer')
        </div>
    </div>
    <script src="{{ mix('js/dashboard.js')}}"></script>
</body>

</html>
