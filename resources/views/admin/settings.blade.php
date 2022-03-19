@extends('admin.template')

@section('main')
    <main>
        <form class="container" action="{{ route('admin.settings.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-alert :errors="$errors" :success="session('success') "/>
            <div>
                <h4>Загрузите логотип</h4>
                <div class="logo" style="display: {{ \App\Facades\Setting::name('logo') ? 'block' : 'none' }}">
                    <img src="{{ \App\Facades\Setting::asset('logo') }}" alt="">
                </div>
                <input type="file" name="settings[logo]">
            </div>
            <div>
                <h4>Описание</h4>
                <textarea name="settings[description]" rows="5">{{ \App\Facades\Setting::name('description') }}</textarea>
            </div>
            <div>
                <h4>Номер телефона</h4>
                <input type="tel" name="settings[phone]" value="{{ \App\Facades\Setting::name('phone') }}">
            </div>
            <div>
                <h4>Баннер на главной</h4>
                <div class="logo" style="display: {{ \App\Facades\Setting::name('logo') ? 'block' : 'none' }}">
                    <img src="{{ \App\Facades\Setting::asset('banner') }}" alt="">
                </div>
                <input type="file" name="settings[banner]">
            </div>
            <p>
                <input type="submit" value="Save">
            </p>
        </form>
    </main>
@endsection

