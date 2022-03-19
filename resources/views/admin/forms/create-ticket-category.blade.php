@extends('admin.template')

@section('main')
    <form class="container" action="{{ route('admin.ticket-categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-alert :errors="$errors" :success="session('success') "/>
        <div class="form-group">
            <label>Имя темы</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Описание</label>
            <textarea name="description" rows="5" class="form-control"></textarea>
        </div>
        <button type="submit">Добавить</button>
    </form>
@endsection
