@extends('pages.feed')

@section('content')
    @if(isset($bread))
        {!! Breadcrumbs::render('feed', $bread) !!}
    @endif
	<h1 class="feed_header">Отзывы о ваших авто</h1>

				
	@foreach($types as $type)

		@include('inc.makes.feed-makes', ['type' => $type])

	@endforeach

<div class="mention_add feedback_button clear_button"
href="{{ Auth::guest() ? '#sign-up-popup' : 
		( Auth::user()->is_ready() ? '#feedback-popup' : '#fill-up-profile-popup' ) }}" >
	
	Добавить отзыв
</div>

@stop