@extends('admin')

@section('default_admin')
    <div id="wrapper">
        <div class="overlay"></div>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                            <span class="hamb-top"></span>
                            <span class="hamb-middle"></span>
                            <span class="hamb-bottom"></span>
                        </button>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::check())
                            @if(Auth::user()->is_admin)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Юзер панель <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Админ панель</a></li>
                                        <li><a class="dropdown-item" href="/user-panel">Личный кабинет</a></li>
                                    </ul>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="{{ route('admin.dashboard') }}">
                        {{ config('app.name') }} admin
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.courses.index') }}">Курсы</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ученики <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-header">Подробности</li>
                        <li><a href="#">Курсы ученика</a></li>
                        <li><a href="#">Редактировать данные</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}">Юзеры</a>
                </li>
                <li>
                    <a href="{{ route('admin.posts.index') }}">Блог</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Настройки сайта<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-header">Настройки сайта</li>
                        <li><a href="{{ route('admin.site.index') }}">Данные сайта</a></li>
                    </ul>
                    <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-header">Редактируемые страницы</li>
                        <li><a href="#">Главная</a></li>
                        <li><a href="#">Редактор контента</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
