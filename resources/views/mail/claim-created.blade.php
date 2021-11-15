@component('mail::message')

<h2>Новое обращение.</h2> <br/>
<strong>От:</strong> {{ $user_email }} <br/>
<strong>Сообщение:</strong> {{ $message }}<br/>
<strong>Создано:</strong> {{ $created_at }}<br/>

@endcomponent
