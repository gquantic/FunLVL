@extends('admin.template')

@section('main')
    <form class="container" action="{{ route('admin.games.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-alert :errors="$errors" :success="session('success') "/>
        <div class="form-group">
            <label>Название игры</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Описание</label>
            <textarea name="description" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Логотип</label>
            <input type="file" name="logo" class="form-control">
        </div>
        <button type="submit">Добавить</button>
        <div>
            <h2>Баннер</h2>
            <input type="file" name="banner">
        </div>
        <input type="submit" value="Save">
    </form>
@endsection
