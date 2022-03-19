@extends('admin.template')

@section('main')
    <form class="container" action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-alert :errors="$errors" :success="session('success') "/>
        <div class="form-group">
            <label>Имя категории</label>
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
    </form>
@endsection
