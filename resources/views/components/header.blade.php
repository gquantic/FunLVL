 <header style="background-color: #fff;!important;">
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
