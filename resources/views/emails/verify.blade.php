@extends('emails.layout')

@section('body')

    <p style="font-size: 14px; line-height: 20px;">
        Приветствуем Вас в клубе автомобилистов "Комтранс"!
        Для подтверждения регистрации перейдите по <a href="{{ route('user-verify', $code) }}">этой ссылке</a>.
        Мы желаем Вам приятной и успешной работы на сайте.
    </p>

@stop