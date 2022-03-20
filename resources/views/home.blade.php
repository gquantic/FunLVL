@extends('template')

@section('main')
    <main class="home">
        <div class="auth filter-modal">
            <div class="bg-blur"></div>
            <div class="auth-form">
                <div class="title-and-close">
                    <a href="{{ route('login') }}"><h2>Авторизация</h2></a>
                    <button class="close">
                        <img src="{{ asset('images/close.png') }}" alt="close">
                    </button>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="item">
                        <label for="login">Логин(e-mail)</label>
                        <input type="text" id="login" name="email">
                    </div>
                    <div class="item">
                        <label for="password">Пароль</label>
                        <input type="text" id="password">
                    </div>
                    <div class="forgot-and-log">
                        <a href="{{ route('password.request') }}" class="forgot">Забыли пароль?</a>
                        <button type="submit" class="apply">Войти</button>
                    </div>
                </form>
                <div class="socials">
                    <a href=""><img src="{{ asset('images/Rectangle 34.png') }}" alt=""></a>
                    <a href=""><img src="{{ asset('images/Rectangle 39.png') }}" alt=""></a>
                    <a href=""><img src="{{ asset('images/image%203.png') }}" alt=""></a>
                </div>
            </div>
        </div>
        <img src="{{ \App\Facades\Setting::asset('banner') }}" alt="banner image" class="banner-image">
        <div class="container home-page">
            <div class="cup-and-wins">
                <div class="wins-part">
                    <div class="win-item">
                        <p class="name">Гарантия</p>
                        <p class="desc">На сайте присутствует система
                            безопасной сделки. Уберегите себя
                            от обмана.</p>
                    </div>
                    <div class="win-item">
                        <p class="name">Партнерство</p>
                        <p class="desc">Приглашайте своих друзей и
                            получайте проценты с продаж и
                            покупок.</p>
                    </div>
                </div>
                <div class="cup-image">
                    <img src="{{ asset('images/cup.png') }}" alt="">
                </div>
                <div class="wins-part">
                    <div class="win-item">
                        <p class="name">Качество</p>
                        <p class="desc">Только качественный товар,
                            проверенный модераторами.</p>
                    </div>
                    <div class="win-item">
                        <p class="name">Быстрый поиск</p>
                        <p class="desc">Множество фильтров, а так же
                            возможность разместить предложение
                            о покупке товара.</p>
                    </div>
                </div>
            </div>
            <div class="games-and-services">
                <h1>Игры и услуги на Fan<span>Lvl</span></h1>
                <div class="items">
{{--                    @foreach($games as $game)--}}
{{--                    <div class="item" style="background-image: url('{{ asset($game->logo_path) }}')">--}}
{{--                        <a href="">{{ $game->name }}</a>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}


                </div>
                <a href="{{ route('shop.games') }}" class="see-all-review see-all">
                    <span>Все игры</span>
                    <img src="images/right-duble.png" alt="">
                </a>
            </div>
            <div class="best-offers">
                <h2>Лучшие предложения от продавцов</h2>
                <div class="items">
                    @foreach($products as $product)
                        <a href="{{ route('products.show',['product'=>$product->id]) }}">
                    <div class="item card-item">
                        <div class="name-and-price">
                            <p class="name">{{ $product->name }}</p>
                            <p class="price">{{ $product->price }}₽</p>
                        </div>
                        <div class="user-info">
                            <div class="avatar" style="background-image: url('{{ $product->user->data->avatar_path ?? '' }}')"></div>
                            <div class="name-and-rate">
                                <p class="name">{{ $product->user->name }}</p>
                                <x-rating :rating="$product->user->rating"/>
                                <p class="signed-duration">{{ $product->user->dateInterval() }}</p>
                            </div>
                        </div>
                        <a href="#" class="more"><img src="{{ asset('images/right.png') }}" alt=""></a>
                    </div></a>
                    @endforeach
                </div>
                <a href="{{ route('market') }}" class="see-all-review see-all">
                    <span>Все предложения</span>
                    <img src="{{ asset('images/right-duble.png') }}" alt="">
                </a>
            </div>
            <div class="main-questions">
                <h2>Основные вопросы</h2>
                <div class="items">
                    <div class="item" style="background-image: url('images/Rectangle 16.png')">
                        <a href="">Как покупать?</a>
                    </div>
                    <div class="item" style="background-image: url('images/Rectangle 18.png')">
                        <a href="">Партнёрская программа</a>
                    </div>
                    <div class="item" style="background-image: url('images/Rectangle 20.png')">
                        <a href="">Перед началом торговли</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
