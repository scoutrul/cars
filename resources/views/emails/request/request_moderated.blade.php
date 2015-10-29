@extends('emails.layout')

@section('body')

    <h3>{{ !empty($request['user']['name']) ? $request['user']['name'] . '! ' : '' }}Ваш Заказ проверен.</h3>

    <p style="font-size: 14px; line-height: 20px;">
        Информация по заказу:
    </p>

    <p style="font-size: 14px; line-height: 20px;">
        <strong>Тип:</strong> {{ $request['new'] ? 'новая' : '' }}{{ $request['old'] ? ', бу' : '' }} <br>
        <strong>Машина:</strong> {{ $request['type']['title'] }} -> {{ $request['make']['title'] }} -> {{ $request['model']['title'] }} <br>
        <strong>Год выпуска:</strong> {{ $request['year'] }} <br>
        <strong>Сообщение:</strong> {{ $request['text'] }}
    </p>

    @if($request['status'] == 1)
        <p style="font-size: 14px; line-height: 20px;">Ваш запрос на поиск товаров и услуг был <strong style="color: #00CE00">одобрен</strong> и разослан по организациям.</p>
    @else
        <p style="font-size: 14px; line-height: 20px;">Ваш заказ <strong style="color: #CE0000">отклонен</strong></p>
        <p style="font-size: 14px; line-height: 20px;">Пожалуйста, ознакомьтесь с правилами клуба <a href="http://komtrans-club.ru/page/pravila">http://komtrans-club.ru/page/pravila</a>.</p>
    @endif

@stop