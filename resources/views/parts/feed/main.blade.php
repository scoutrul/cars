@extends('pages.feed')

@section('content')
    @if(isset($bread))
        {!! Breadcrumbs::render('feed', $bread) !!}
    @endif
	<h1 class="feed_header">Отзывы о ваших авто</h1>

				
	@foreach($types as $type)

		@include('inc.makes.feed-makes', ['type' => $type])

	@endforeach

@stop