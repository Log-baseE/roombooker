<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="The room booking solution for event organizers">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Welcome · RoomBooker</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
    <nav class="main-nav">
        <div class="container">
            <a href="#" class="logo">
                LOGO
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLinks" aria-controls="navbarLinks" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarLinks" class="navbar-links left-links">
                <ul>
                    <li><a href="about">About us</a></li>
                    <li class="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a href="#" class="dropdown-toggle" id="navbarDropdown" role="button">Support</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="faq">FAQ</a>
                            <a class="dropdown-item" href="contact">Contact us</a>
                        </div>
                    </li>
                    <li role="separator" class="divider"></li>
                </ul>
            </div>
            <div id="navbarLinks" class="navbar-links right-links">
                <ul>
                    <li>
                        <a class="login">Log in</a>
                    </li>
                    <li>
                        <a class="signup">Sign up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-body">
        <section class="landing">
            <div class="main">
                <header>
                    <h1 class="title">Room booking, <br>simpler</h1>
                    <p class="description">Morbi justo enim, viverra at tempor vel, tristique quis tortor. Quisque fringilla felis vitae ante tristique luctus.</p>
                </header>
                <div class="actions">
                    <a class="main-action" href="">Book a room!</a>
                    <a class="secondary-action" href="">Contact us</a>
                </div>
            </div>
            <div class="decor">
            </div>
        </section>
        <hr class="m-0">
        <section class="about">
            <div class="decor"></div>
            <div class="accent"></div>
            <div class="content">
                <h1>Title</h1>
                <p>Vestibulum non mauris sem. Aliquam erat volutpat. Nunc sed justo non nulla sodales iaculis at congue quam. Cras sed rhoncus augue, in auctor purus. Vestibulum ornare, nulla eget hendrerit ornare, justo justo posuere dui, sit amet lobortis nisi sapien a sapien.</p>
            </div>
        </section>
        <section class="admin">
            <div class="content">
                <header>
                    <h1>Working as an admin?</h1>
                    <p>No worries! RoomBooker's dashboard contains an extensive amount of features, allowing you to easily view and manage booking requests</p>
                </header>
                <a href="" class="secondary-action">Learn more</a>
            </div>
            <div class="decor"></div>
        </section>
        <section class="last-action">
            <div class="container">
                <header>
                    <h1>Simplify room booking</h1>
                    <p>No more hassle</p>
                </header>
                <a class="main-action" href="">Sign up now</a>
            </div>
        </section>
    </div>
    <footer>

    </footer>
    <script src="{{ mix('js/app.js' )}}"></script>
</body>
</html>
