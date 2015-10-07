@extends('pages.feed')

@section('content')
    @if(isset($bread))
        {!! Breadcrumbs::render('feed', $bread) !!}
    @endif
	<h3 class="feed_header">Отзывы</h3>
				
	@foreach($types as $type)

		@include('inc.makes.feed-makes', ['type' => $type])

	@endforeach

@stop