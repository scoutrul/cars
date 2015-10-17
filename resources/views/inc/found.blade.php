<div class="found">

	<hr>
	
	@if(Auth::guest())
	<div class="company-signup_button_list_add" href="#company-signup-popup">
		Добавить компанию
	</div>
	@endif

	<h3>Найденные организации</h3>

	@if(isset($spec_id))
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
						<div class="company-preview_name">{{ $companies[$i]['name'] }}</div>
						<div class="company-preview_adress">{{ $companies[$i]['address'] }}</div>
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
					>
						@foreach($companies[$i]['tags'] as $tag)

							<div data-tag="{{ $tag }}"></div>

						@endforeach
					</div>
				</div>

			@endif

		@endfor

	</div>

	@if(count($companies)>5)
		<div id="show-more-found-companies" class="found_more">
			Показать еще
		</div>
	@endif

</div>