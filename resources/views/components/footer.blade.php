
<div style="margin-top: 350px;">
    <footer style="position: relative;width:100%;bottom: 0;margin-top: 50px;">
        <div class="container">
            <div class="logo-and-copyright">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ \App\Facades\Setting::asset('logo') }}" alt="logo">
                </a>
                <p class="copyright">Description (c) All Right reserved </p>
            </div>
            <div class="footer-navigation">
                <div class="nav-item">
                    <p class="title">Покупателю</p>
                    <ul>
                        @foreach($buyersMenuItems as $route=>$item)
                            <li class="{{ \Illuminate\Support\Facades\Request::routeIs($route) ? 'active' : '' }}">
                                <a href="{{ \Illuminate\Support\Facades\Route::has($route) ? route($route) : '#' }}">{{ $item }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="nav-item">
                    <p class="title">Продавцу</p>
                    <ul>
                        @foreach($sellerMenuItems as $route=>$item)
                            <li class="{{ \Illuminate\Support\Facades\Request::routeIs($route) ? 'active' : '' }}">
                                <a href="{{ \Illuminate\Support\Facades\Route::has($route) ? route($route) : '#' }}">{{ $item }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="nav-item">
                    <p class="title">Полезно</p>
                    <ul>
                        @foreach($infoMenuItems as $route=>$item)
                            <li class="{{ \Illuminate\Support\Facades\Request::routeIs($route) ? 'active' : '' }}">
                                <a href="{{ \Illuminate\Support\Facades\Route::has($route) ? route($route) : '#' }}">{{ $item }}</a>
                            </li>
                        @endforeach
                            <li><a href="{{ route('ticket') }}">Написать в службу поддержки</a></li>
                    </ul>
                </div>

            </div>
            <div class="phone-and-privacy">
                <a href="#" class="phone">{{ \App\Facades\Setting::name('phone') }}</a>
                <a href="" class="privacy">Политика конфедициальности</a>
            </div>
        </div>
    </footer>
    <template id="push">
        <div class="wrap" style="position: absolute;left: 5px;bottom: 5px;background-color: white;box-shadow: #4a5568">
            <h3 class="name"></h3>
            <span></span>
            <p class="content"></p>
            <a href="">перейти к чату</a>
        </div>
    </template>
</div>
