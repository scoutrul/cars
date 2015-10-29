@extends('emails.layout')

@section('body')

    <h3>{{ !empty($company['user']['name']) ? $company['user']['name'] . '! ' : '' }}Ваша компания проверена.</h3>

    @if($company['status'] == 1)
        <p style="font-size: 14px; line-height: 20px;">Ваша компания была <strong style="color: #00CE00">одобрена</strong>.</p>
    @else
        <p style="font-size: 14px; line-height: 20px;">Ваш компания была <strong style="color: #CE0000">отклонена</strong>.</p>
        <p style="font-size: 14px; line-height: 20px;">Пожалуйста, ознакомьтесь с правилами клуба <a href="http://komtrans-club.ru/page/pravila">http://komtrans-club.ru/page/pravila</a>.</p>
    @endif

@stop