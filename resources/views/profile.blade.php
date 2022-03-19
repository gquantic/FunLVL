@extends('template')

@section('main')
    <main>
        <form action="{{ route('profile.post') }}" method="post" class="container" enctype="multipart/form-data">
            @csrf
            <x-alert :errors="$errors" :success="session('success') "/>
            <h2>{{ $user->name }}</h2>
            <div class="form-group">
                <label for="">Аватар</label>
                @if($user->data)
                    <img src="{{ asset($user->data->avatar_path) }}" alt="">
                @endif
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Описание</label>
                <textarea name="description" class="form-control" id="" rows="10">{{ $user->data->description ?? '' }}</textarea>
            </div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <button type="submit">Сохранить</button>
        </form>
    </main>
@endsection
