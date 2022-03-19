@extends('template')

@section('main')
    <main class="container">
        <h1>Игры и услуги на Fan<span>Lvl</span></h1>
        <div class="items">
            @foreach($games as $game)
                <div class="item" style="background-image: url('{{ asset($game->logo_path) }}')">
                    <a href="">{{ $game->name }}</a>
                </div>
            @endforeach
        </div>
    </main>
@endsection
