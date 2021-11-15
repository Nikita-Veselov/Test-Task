@extends('layout')
@section('content')
<a href="{{ route('main') }}" class="btn btn-primary">Главная</a>
<a href="{{ route('logout') }}" class="btn btn-secondary">Выход</a>
@if ($diff < 1)
    <div class="row">
        <div class="text-center">Вы оставляли обращение меньше чем день назад!</div>
    </div>
@else
    <form method="POST" action="{{ route('claim_post') }}" >
        @csrf
        <div class="mb-3 hidden">
            <label for="email" class="form-label">Почта</label>
            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Сообщение</label>
            <textarea class="form-control" name="message" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endif

@endsection
