@extends('emails.layout')

@section('body')

    <h3>Новая компания</h3>

    <p style="font-size: 14px; line-height: 20px;">
        Пользователь <strong>{{ $company['user']['email'] }}</strong> зарегистрировал компанию {{ $company['title'] }} {{ \Carbon\Carbon::parse($company['created_at'])->format('d.m.Y в H:i:s') }}:
    </p>

    @if(!empty($company['logo']) && $company['logo'] != 'img/user/noavatar.png')
    <p style="font-size: 14px; line-height: 20px;">
        <strong>Лого:</strong> <br>
        <img style="max-height: 300px; max-width: 300px;" src="{{ url($company['logo']) }}" alt="{{ $company['title'] }}">
    </p>
    @endif

    <p style="font-size: 14px; line-height: 20px;">
        <strong>Специализация:</strong> {{ $company['spec']['title'] }}<br>

        @if(!$company['spec']['light_spec'])
            <strong>Ориентация:</strong> {{ $company['type']['title'] }}<br>
            <strong>Производители:</strong> <br>

            @foreach($company['makes'] as $make)
                <em>{{ $make['title'] }}</em>,
            @endforeach

            <br>
            <strong>Модели:</strong> <br>

            @foreach($company['models'] as $model)
                <em>{{ $model['title'] }}</em>,
            @endforeach

            <br>
        @endif

        <strong>Адрес:</strong> {{ $company['address'] }}<br>
        <strong>Телефоны:</strong> {{ $company['phone'] }}<br>
        <strong>О компании:</strong> {{ $company['about'] }}<br>
    </p>

@stop
