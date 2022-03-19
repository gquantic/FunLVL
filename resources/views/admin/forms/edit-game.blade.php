@extends('admin.template')

@section('main')
    <form class="container" action="{{ route('admin.games.update',['game'=>$game->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-alert :errors="$errors" :success="session('success') "/>
        <div>
            <h2>Имя игры</h2>
            <input type="text" name="name" value="{{ $game->name }}">
        </div>
        <div>
            <h2>Описание</h2>
            <textarea name="description" rows="5">{{ $game->description }}</textarea>
        </div>
        <div>
            <h2>Логотип</h2>
            <div class="logo">
                <img src="{{ asset($game->logo_path) }}" alt="">
            </div>
            <input type="file" name="logo">
        </div>
        <div>
            <h2>Баннер</h2>
            <div class="logo">
                <img src="{{ asset($game->banner_path ?? '') }}" alt="">
            </div>
            <input type="file" name="banner">
        </div>
        <input type="submit" value="Save">
    </form>
@endsection
