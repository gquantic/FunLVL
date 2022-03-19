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
