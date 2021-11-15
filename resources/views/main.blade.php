@extends('layout')
@section('content')

<div class="row justify-content-center">
    <div class="row">
        <div class="text-center fs-2 pb-5">
            Главная страница
        </div>
    </div>
    <div class="text-center">
    @auth
        @if (Auth::user()->role == 'manager')
            <a href="{{ route('dashboard') }}" class="btn btn-primary col-4 mb-5">Отзывы</a>
            <div class="w-100"></div>
            <a href="{{ route('logout') }}" class="btn btn-secondary col-4 mb-5">Выход</a>
        @elseif (Auth::user()->role == 'client')
            <a href="{{ route('claim_form') }}" class="btn btn-primary col-4 mb-5">Форма обратной связи</a>
            <div class="w-100"></div>
            <a href="{{ route('logout') }}" class="btn btn-secondary col-4 mb-5">Выход</a>
        @endif
    @else
        <a href="{{ route('login') }}" class="btn btn-primary col-4 mb-5">Вход</a>
        <div class="w-100"></div>
        <a href="{{ route('register') }}" class="btn btn-secondary col-4 mb-5">Регистрация</a>
    @endauth
    </div>
</div>

@endsection
