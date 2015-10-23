<div class="found">

	<hr>
	
	@if(Auth::guest())
		<a class="company-signup_button_list_add"  href="#company-signup-popup">
			Добавить компанию
		</a>
	@endif

	<h3>Профильные организации 

	@if(isset($model))
		{{$make->title}} / {{$model->title}}
	@else
		{{$make->title}}
	@endif

	:</h3>

		<div class="company-preview-list" id="catalog-companies"
		data-make="{{ $make_id }}"
		data-spec="{{ $spec_id }}"
		>
	@else
		<div class="company-preview-list" id="catalog-companies"
		data-make="{{ $make_id }}"
		>
	@endif

		@for($i=0; $i < count($companies); $i++)

			@if($i<5)

				<div class="company-preview">
					<div class="company-preview_logo"
					style="background-image: url({{ URL::to('/') . '/' . $companies[$i]['logo'] }})"></div>
					<div class="company-preview_info">
						<div class="company-preview_name">{{ $companies[$i]['title'] }}</div>
						<div class="company-preview_address">{{ $companies[$i]['address'] }}</div>
						<div class="company-preview_excerpt">
							{{ substr($companies[$i]['about'], 
								0, 100) }}
						</div>
					</div>
					<div class="company-preview_more">
						<span>Подробнее</span>				
					</div>
					<div class="company-preview_data"
						data-phone="{{ $companies[$i]['phone'] }}"
						data-about="{{ $companies[$i]['about'] }}"
						data-address="{{ $companies[$i]['address'] }}"

					>
						@foreach($companies[$i]['tags'] as $tag)

							<div data-tag="{{ $tag }}"></div>

						@endforeach
					</div>
				</div>

			@endif
			<hr>
		@endfor

	</div>

	@if(count($companies)>5)
		<div id="show-more-found-companies" class="found_more">
			Показать еще
		</div>
	@endif


	<a class="search_button" style="margin: auto"
		href="{{ Auth::guest() ? '#sign-up-popup' :
			( Auth::user()->is_ready() ? '#search-popup' : '#fill-up-profile-popup' ) }}">
		Поиск запчастей
	</a>

</div>