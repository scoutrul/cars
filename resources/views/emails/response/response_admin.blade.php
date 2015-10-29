@extends('emails.layout')

@section('body')

    <h3>Новый ответ</h3>

    <p style="font-size: 14px; line-height: 20px;">
        По запросу пользователя <strong>{{ $request['user']['email'] }}</strong> от
        {{ \Carbon\Carbon::parse($request['created_at'])->format('d.m.Y в H:i:s') }}
        пришел ответ от компании <strong>{{ $company['name'] }}</strong>.
    </p>

    <h4>Состав запроса:</h4>
    <p style="font-size: 14px; line-height: 20px;">
        <strong>Тип:</strong> {{ $request['new'] ? 'новая' : '' }}{{ $request['old'] ? ', бу' : '' }} <br>
        <strong>Машина:</strong> {{ $request['type']['title'] }} -> {{ $request['make']['title'] }} -> {{ $request['model']['title'] }} <br>
        <strong>Год выпуска:</strong> {{ $request['year'] }} <br>
        <strong>Сообщение:</strong> {{ $request['text'] }}
    </p>

@stop
