<div class="sticky">

	<div class="specs">
						
		<h3 class="specs_header">Каталог организаций</h3>

		<ul class="specs_menu">
			
			@foreach($specs as $spec)
				
				@if($current)

					<li class="{{ $current == $spec->name ? 'specs_active' : '' }}">

				@else

					<li>

				@endif

						<a href="{{ route('specs', $spec->name) }}">
							{{ $spec->title }}
						</a>
					</li>

			@endforeach

		</ul>
	{{-- 
		@if( Auth::guest() ? 1 : ( Auth::user()->company ? 0 : 1 ) )

			<div id="create-company-button" class="specs_add" 
				href="{{ Auth::guest() ? '#sign-up-popup' :
				( Auth::user()->is_ready() ? '#create-company' : '#fill-up-profile-popup' ) }}">
				Добавить организацию
			</div>

		@endif --}}

	</div>


	@if( Auth::guest() ? 0 : ( Auth::user()->company ? 0 : 1 ) )
		@include('popups.create-company')
	@endif


	<div class="feedback">
		<h3 class="feedback_h3">Обратная связь</h3>
		<p class="feedback_p">
			Мы будем рады 
			вашим замечаниям и предложениям 
			по работе и развитию проекта
		</p>
		<a href="{{ route('contacts') }}">
			<div class="feedback_button">
				Написать
			</div>
		</a>
	</div>
</div>