@extends('template')

@section('main')
    <main>
        <div class="container chat-content">
            <h1>Финансы</h1>
            <div class="">
               <h4>Ваш баланс:</h4>
               <h2 class="text-primary">{{ Auth::user()->balance }}<span class="rouble-icon">₽</span></h2>
               <button class="btn btn-primary mt-4">Пополнить</button>
            </div>
        </div>
    </main>
@endsection
