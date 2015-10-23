@extends('layouts.main')

@section('body')

	<div class="home">

		<div class="wide-image"></div>
		
		<div class="container">
			
			<div class="home_left">
				<div class="sticky">
					@include('inc.search')
					
					@include('inc.specs')
				</div>



			</div>

			<div class="home_middle">
				
				<div class="home_middle-info">
					<h1>Запчасти и услуги для грузового транспорта</h1>

					Нужны запчасти или услуги для грузового коммерческого транспорта? <br>

					Найдите компанию, которая Вам поможет, используя фильтр организаций далее.

				</div>


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
					@include('inc.company-signup')
					
					@include('inc.feedback')

                    @include('inc.last_reviews')
				</div>

			</div>

			<div class="clear-fix"></div>

		</div>

	</div>

@stop