@extends('layouts.main')

@section('body')

	<div class="home">

		<div class="wide-image"></div>
		
		<div class="container">
			
			<div class="home_left">
				

				@include('inc.company-signup')


				@include('inc.specs')





			</div>

			<div class="home_middle">
				
				<h3>
					<span>
						Запчасти и услуги для грузового транспорта
					</span>
					<br>
					<span style="font-size:80%">	
						Поиск организаций:
					</span>
				</h3>
				


				<div id="type-makes-ids">
					@foreach($ids as $id)
						
						<div data-ids="{{ $id }}"></div>

					@endforeach
				</div>

				@include('inc.type')

				@include('inc.makes.makes', ['id' => 'catalog-makes'])

			</div>

			<div class="home_right">
				
				<div class="sticky">
					@include('inc.search')
					
					@include('inc.feedback')

                    @include('inc.last_reviews')
				</div>

			</div>

			<div class="clear-fix"></div>

		</div>

	</div>

@stop