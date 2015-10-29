@extends('emails.layout')

@section('body')

	<p style="font-size: 14px; line-height: 20px;">
		{{ $name }}
	</p>
	<p style="font-size: 14px; line-height: 20px;">
		{{ $email }}
	</p>
	<p style="font-size: 14px; line-height: 20px;">
		{{ $text }}
	</p>

@stop