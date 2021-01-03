<?php
    $isWhite = Request::is('/') || Request::is('login') || Request::is('registration');
    $link = $isWhite ? 'white-link' : 'black-text';
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="team" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../css/tooplate-style.css">
    <title>{{ config('app.name') }}</title>
    <style>

    </style>
</head>
<body>
<!-- PRE LOADER -->
<section class="preloader">
    <div class="spinner">

        <span class="spinner-rotate"></span>

    </div>
</section>


<!-- MENU -->
<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>

            <!-- lOGO TEXT HERE -->
            <a href="index.html" class="navbar-brand navbar-brand-white">{{ config('app.name') }}</a>
        </div>

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/" class="white-link">Главная</a></li>
                <li><a href="{{ Request::is('/') ? '#feature' : '/courses' }}" class="smoothScroll white-link">Курсы</a></li>
                <li><a href="/about" class="white-link">О нас</a></li>
                <li><a href="/blog-list" class="white-link">Блог</a></li>
                <li><a href="/contacts" class="white-link">Контакты</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    @if(Auth::user()->is_admin)
                        <li>
                            <div class="dropdown">
                                <button style="margin-right: 10px; width: 180px;" class="btn btn-warning dropdown-toggle margin-top-logout-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Юзер панель
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Админ панель</a>
                                    <a class="dropdown-item" href="/user-panel">Личный кабинет</a>
                                </div>
                            </div>
                        </li>
                    @else
                        <li>
                            <a href="/user-panel" class="white-link">Личный кабинет</a>
                        </li>
                    @endif
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary margin-top-logout-button">Log out</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ Request::is('login') ? '/registration' : '/login'}}" class="white-link">{{ Request::is('login') ? 'Registration' : 'Log in'}}</a></li>
                @endif
            </ul>
        </div>

    </div>
</section>

@yield('welcome')
@yield('default_user')
@yield('auth_user')

<footer id="footer" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">

            <div class="copyright-text col-md-12 col-sm-12">
                <div class="col-md-6 col-sm-6">
                    <p>Copyright &copy; 2020 Code-co</p>
                </div>

                <div class="col-md-6 col-sm-6">
                    <ul class="social-icon">
                        <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>


<!-- SCRIPTS -->
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.stellar.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/smoothscroll.js"></script>
<script src="/js/custom.js"></script>
</body>
</html>

