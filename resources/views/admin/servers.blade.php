@extends('admin.template')

@section('main')
    <main class="container">
        <x-alert :errors="$errors" :success="session('success')"/>
        <a href="{{ route('admin.servers.create') }}" class="button">Добавить сервер</a>
        <ul>
            @foreach($servers as $server)
            <li>
                <div class="server">
                    <h2>{{ $server->name }}</h2>
                    <ul>
                        <li><a href="{{ route('admin.servers.edit',['server'=>$server->id]) }}">Редактировать</a></li>
                        @if($server->deleted_at)
                            <li><a href="{{ route('admin.servers.restore', ['server'=>$server->id,'type'=>1]) }}">Показать</a></li>
                        @else
                            <li><a href="{{ route('admin.servers.delete', ['server'=>$server->id,'type'=>1]) }}">Скрыть</a></li>
                        @endif
                        <li><a href="{{ route('admin.servers.delete', ['server'=>$server->id,'type'=>0]) }}">Удалить</a></li>
                    </ul>
                </div>
            </li>
            @endforeach
        </ul>
    </main>
@endsection
