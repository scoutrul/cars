@extends('emails.layout')

@section('body')

    <h3>Вашими услугами интересуются!</h3>

    <p style="font-size: 14px; line-height: 20px;">
        Оставлен заказ:
    </p>

    <p style="font-size: 14px; line-height: 20px;">
        <strong>Тип:</strong> {{ $request['new'] ? 'новая' : '' }}{{ $request['old'] ? ', бу' : '' }} <br>
        <strong>Машина:</strong> {{ $request['type']['title'] }} -> {{ $request['make']['title'] }} -> {{ $request['model']['title'] }} <br>
        <strong>Год выпуска:</strong> {{ $request['year'] }} <br>
        <strong>Сообщение:</strong> {{ $request['text'] }}
    </p>

    <p>
        Прочитать и ответить новому клиенту возможно по
        <a href="{{ route('room', ['id' => $room['id']]) }}">этой ссылке</a>.
    </p>

@stop