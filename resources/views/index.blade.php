@extends('layouts.front.template')

@section('content')
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
@endsection
