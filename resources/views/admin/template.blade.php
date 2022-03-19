<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FunLVL</title>
    <meta property="og:site_name" content="FunLVL"/>
    <meta property="og:description" content="FunLVL"/>
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
</head>
<body>
<header>
    <div class="container">
        <div class="logo-and-nav">
            <div class="logo">
                <h1>Админка</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}">Домашняя страница</a></li>
                    <li><a href="{{ route('admin.dashboard') }}"></a>Панель</li>
                    <li><a href="{{ route('admin.servers.index') }}">Серверы</a></li>
                    <li><a href="{{ route('admin.categories.index') }}">Категории</a></li>
                    <li><a href="{{ route('admin.games.index') }}">Игры</a></li>
                    <li><a href="{{ route('admin.products') }}">Товары</a></li>
                    <li><a href="{{ route('admin.ticket-categories.index') }}">Темы тикетов</a></li>
                    <li><a href="{{ route('admin.tickets') }}">Тикеты</a></li>
                    <li><a href="{{ route('admin.settings.index') }}">Настройки</a></li>
                    <li><a href="{{ route('logout') }}">Выйти</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
@yield('main')
<script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
