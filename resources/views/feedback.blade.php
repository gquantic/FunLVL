@extends('template')

@section('main')
    <main>
        <div class="container chat-content">
            <h1>Оставить отзыв о продавце</h1>
            <div class="add-item-form">
                <form method="post" action="{{ route('feedback',['chat'=>$chatId]) }}">
                    @csrf
                <x-alert :errors="$errors" :success="session('success') "/>
                    <textarea class="inp4" name="description" placeholder="Отзыв" id="" cols="30" rows="10"></textarea>
                    <input type="submit" value="Добавить отзыв" class="inp6">
                </form>
            </div>
        </div>
    </main>
@endsection
