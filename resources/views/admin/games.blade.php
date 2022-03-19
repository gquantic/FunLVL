@extends('admin.template')

@section('main')
    <main class="container">
        <x-alert :errors="$errors" :success="session('success') "/>
        <a href="{{ route('admin.games.create') }}" class="button">Добавить игру</a>
        <ul>
            @foreach($games as $game)
            <li>
                <div class="game">
                    <h2>{{ $game->name }}</h2>
                    <ul>
                        <li><a href="{{ route('admin.games.edit',['game'=>$game->id]) }}">Редактировать</a></li>
                        @if($game->deleted_at)
                            <li><a href="{{ route('admin.games.restore', ['game'=>$game->id,'type'=>1]) }}">Показать</a></li>
                        @else
                            <li><a href="{{ route('admin.games.delete', ['game'=>$game->id,'type'=>1]) }}">Скрыть</a></li>
                        @endif
                        <li><a href="{{ route('admin.games.delete', ['game'=>$game->id,'type'=>0]) }}">Удалить</a></li>
                    </ul>
                </div>
            </li>
            @endforeach
        </ul>
    </main>
@endsection
