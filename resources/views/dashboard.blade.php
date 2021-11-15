@extends('layout')
@section('content')
<a href="{{ route('main') }}" class="btn btn-primary">Главная</a>
<a href="{{ route('logout') }}" class="btn btn-secondary">Выход</a>

<table class="table">
    <thead>
        <tr>
            <th>Пользователь</th>
            <th>Сообщение</th>
            <th>Отметка</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($claims as $claim)
            <tr>
                <td>{{ $claim->user_email }}</td>
                <td>{{ $claim->message }}</td>
                <td>
                    @if ($claim->answered == true)
                        <a role="button" class="btn btn-success disabled" href="">Решено</a>
                    @elseif ($claim->answered == false)
                        <a role="button" class="btn btn-warning" href="{{ route('claim_answered', [$claim->id, $claims->currentPage()]) }}">Отметить</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>


</table>

{{ $claims->render() }}




@endsection
