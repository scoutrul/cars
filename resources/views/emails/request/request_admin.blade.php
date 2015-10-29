@extends('emails.layout')

@section('body')

    <h3>Новый заказ</h3>

    <p style="font-size: 14px; line-height: 20px;">
        Пользователь <strong>{{ $request['user']['email'] }}</strong> оставил заказ {{ \Carbon\Carbon::parse($request['created_at'])->format('d.m.Y в H:i:s') }}:
    </p>

    <p style="font-size: 14px; line-height: 20px;">
        <strong>Тип:</strong> {{ $request['new'] ? 'новая' : '' }}{{ $request['old'] ? ', бу' : '' }} <br>
        <strong>Машина:</strong> {{ $request['type']['title'] }} -> {{ $request['make']['title'] }} -> {{ $request['model']['title'] }} <br>
        <strong>Год выпуска:</strong> {{ $request['year'] }} <br>
        <strong>Сообщение:</strong> {{ $request['text'] }}
    </p>

@stop
