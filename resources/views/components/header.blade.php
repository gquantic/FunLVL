 <header>
    <div class="container">
        <div class="logo-and-nav">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ \App\Facades\Setting::asset('logo') }}" alt="logo">
                </a>
            </div>
            <nav>
                <ul>


                    <button class="btn btn-icon btn-icon rounded-circle btn-flat-danger waves-effect" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                        Вход
                    </button>
                    

                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    </div>
                    @foreach($menuItems as $route=>$item)
                        <li class="{{ \Illuminate\Support\Facades\Request::routeIs($route) ? 'active' : '' }}">
                            <a href="{{ \Illuminate\Support\Facades\Route::has($route) ? route($route) : '#' }}">{{ $item }}</a>
                        </li>
                    @endforeach
                    @role('admin')
                        <li><a href="{{ route('admin.dashboard') }}">Админ-панель</a></li>
                    @endrole


                </ul>
            </nav>
        </div>
    </div>
</header>
