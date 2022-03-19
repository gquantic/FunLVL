@extends('admin.template')

@section('main')
    <main class="container">
        <x-alert :errors="$errors" :success="session('success') "/>
        <ul>
            @foreach($users as $user)
            <li>
                <div class="user">
                    <h2>{{ $user->name }}</h2>
                    <ul>
                        <li><a href="{{ route('admin.users.view',['user'=>$user->id]) }}">Просмотреть</a></li>
                    </ul>
                </div>
            </li>
            @endforeach
        </ul>
    </main>
@endsection
