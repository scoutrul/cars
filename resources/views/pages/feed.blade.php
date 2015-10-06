@extends('layouts.main')

@section('body')
	
	<div class="feed">

		<div class="wide-image"></div>
		
		<div class="container">
			
			<div class="feed_left">

				@yield('content')

			</div>

			<div class="feed_right">
				
				<div class="sticky">
					@include('inc.search')
					
					@include('inc.feedback')

                    @include('inc.last_reviews')
				</div>

			</div>

		</div>

	</div>

@stop