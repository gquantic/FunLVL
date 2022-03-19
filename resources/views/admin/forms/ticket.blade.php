@extends('admin.template')

@section('main')
    <form  class="container" action="{{ route('admin.ticket.post',['ticket'=>$ticket->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-alert :errors="$errors" :success="session('success')"/>
        <h2>{{ $ticket->name }}</h2>
        <h6>{{ $ticket->category->name }}</h6>
        <div class="form-group">
            <label>Описание</label>
            <p>{{ $ticket->description }}</p>
        </div>
        <div class="form-group">
            <label>Ответить</label>
            <textarea name="answer"  rows="10"></textarea>
        </div>
        <button type="submit">Отправить</button>
    </form>
@endsection
