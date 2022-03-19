@extends('template')

@section('main')
    <main>
        <div class="container chat-content">
            <h1>Добавить тикет</h1>
            <div class="add-item-form">
                <form action="{{ route('ticket') }}" method="post" class="container create-product-form" enctype="multipart/form-data">
                    @csrf
                    <x-alert :errors="$errors" :success="session('success') "/>
                    <input class="inp1" type="text" placeholder="Название тикета"  name="name" required>
                    <div class="form-group">
                        <label for="">Тема</label>
                        <select name="ticket_category_id" id="" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <textarea class="inp4" name="description" placeholder="Описание вопроса" required id="" cols="30" rows="10"></textarea>
                    <input type="submit" value="Создать тикет" class="inp6">
                </form>
            </div>
        </div>
    </main>
@endsection
