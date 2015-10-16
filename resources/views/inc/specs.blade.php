

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
		<svg class="header_svg_icon" fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
		    <path d="M0 0h24v24H0z" fill="none"/>
		    <path d="M7 7h10v3l4-4-4-4v3H5v6h2V7zm10 10H7v-3l-4 4 4 4v-3h12v-6h-2v4z"/>
		</svg>
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
