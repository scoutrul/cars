<div class="sticky">

	<div class="specs">
		

		<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
		    <path d="M0 0h24v24H0z" fill="none"/>
		    <path d="M20 8h-3V4H3c-1.1 0-2 .9-2 2v11h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4zM6 18.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm13.5-9l1.96 2.5H17V9.5h2.5zm-1.5 9c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
		</svg>

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
		<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
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
</div>