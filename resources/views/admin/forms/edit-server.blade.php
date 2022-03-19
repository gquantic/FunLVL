@extends('admin.template')

@section('main')
    <form class="container" action="{{ route('admin.servers.update',['server'=>$server->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-alert :errors="$errors" :success="session('success') "/>
        <div>
            <h2>Имя сервера</h2>
            <input type="text" name="name" value="{{ $server->name }}">
        </div>
        <div>
            <h2>Описание</h2>
            <textarea name="description" rows="5">{{ $server->description }}</textarea>
        </div>
        <div>
            <h2>Логотип</h2>
            <div class="logo">
                <img src="{{ asset($server->logo_path) }}" alt="">
            </div>
            <input type="file" name="logo">
        </div>
        <input type="submit" value="Save">
    </form>
@endsection
