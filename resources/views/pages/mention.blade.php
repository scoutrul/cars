@extends('pages.feed')

@section('content')

	{!! Breadcrumbs::render('feed', $bread) !!}

	<div class="mention">
		
		<div class="mention_add"
		href="{{ Auth::guest() ? '#sign-up-popup' : 
				( Auth::user()->is_ready() ? '#feedback-popup' : '#fill-up-profile-popup' ) }}" >
			
			Добавить отзыв
		</div>

		<div class="mention_head">


			<h1 class="mention_header">
				{{ $mention->header }}
			</h1>

			<div class="mention_votes"> 

				<div class="mention_likes">
					<span id="mention-likes-info">{{ count($mention->likes) }}</span>
					<img src="{{ URL::to('/') }}/img/like.png" alt="">
				</div>

				<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
				    <path d="M12 6c0-.55-.45-1-1-1H5.82l.66-3.18.02-.23c0-.31-.13-.59-.33-.8L5.38 0 .44 4.94C.17 5.21 0 5.59 0 6v6.5c0 .83.67 1.5 1.5 1.5h6.75c.62 0 1.15-.38 1.38-.91l2.26-5.29c.07-.17.11-.36.11-.55V6zm10.5 4h-6.75c-.62 0-1.15.38-1.38.91l-2.26 5.29c-.07.17-.11.36-.11.55V18c0 .55.45 1 1 1h5.18l-.66 3.18-.02.24c0 .31.13.59.33.8l.79.78 4.94-4.94c.27-.27.44-.65.44-1.06v-6.5c0-.83-.67-1.5-1.5-1.5z"/>
				    <path d="M0 0h24v24H0z" fill="none"/>
				</svg>

				<div class="mention_dislikes">
					<span id="mention-dislikes-info">{{ count($mention->dislikes) }}</span>
					<img src="{{ URL::to('/') }}/img/dislike.png" alt="">
				</div>
			</div>

		</div>

		<div class="mention_date-user">
			<div class="mention_date">
				{{ 
					$mention->created_at->day . '.' . 
					$mention->created_at->month . '.'.
					$mention->created_at->year
				}}
			</div>
			<div class="mention_user">
				<a href="">
					{{ $mention->user->name }}
				</a>
			</div>
		</div>

		<div class="mention_content">
			{!! $mention->content !!}
		</div>

		<div id="mention_photos" class="mention_photos" data-layout="{{ $option }}">
			
			@foreach($mention->photos as $photo)

				<img src="{{ URL::to('/') . '/' . $photo->src }}" alt="">

			@endforeach

		</div>
		
		<div class="mention_pluses-minuses">

			<div class="mention_pluses">

				<h4>Плюсы</h4>

				@foreach($mention->pluses as $plus)
	
					<div class="mention_plus">
						<span class="mention_plus-sign">+</span>
						{{ $plus->text }}
					</div>

				@endforeach

			</div>

			<div class="mention_minuses">

				<h4>Минусы</h4>
				
				@foreach($mention->minuses as $minus)

					<div class="mention_minus">
						<span class="mention_minus-sign">-</span>
						{{ $minus->text }}
					</div>

				@endforeach

			</div>

		</div>

		@if( Auth::check() )

			<div class="mention_rate" data-id="{{ $mention->id }}">
				<span>Отзыв был полезен?</span>

				<div id="mention-likes" class="mention_likes"

				 data-count="{{ (int)count($mention->likes) }}"
				 data-active="{{ (int)$mention->likes->contains(Auth::id()) }}"
				>
					<span>{{ count($mention->likes) }}</span>
					<img src="{{ URL::to('/') }}/img/like.png" alt="">
				</div>
				<div id="mention-dislikes" class="mention_dislikes"

				 data-count="{{ (int)count($mention->dislikes) }}"
				 data-active="{{ (int)$mention->dislikes->contains(Auth::id()) }}"
				>
					<span>{{ count($mention->dislikes) }}</span>
					<img src="{{ URL::to('/') }}/img/dislike.png" alt="">
				</div>
			</div>
			
		@endif

	</div>
	
	<hr>

	@include('inc.comments')

@stop