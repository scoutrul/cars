@if( Auth::guest() ? 1 : ( Auth::user()->company ? 0 : 1 ) )

	<div class="search">
		
		<svg class="header_svg_icon" fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
		    <path d="M0 0h24v24H0z" fill="none"/>
		    <path d="M11.5 9C10.12 9 9 10.12 9 11.5s1.12 2.5 2.5 2.5 2.5-1.12 2.5-2.5S12.88 9 11.5 9zM20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-3.21 14.21l-2.91-2.91c-.69.44-1.51.7-2.39.7C9.01 16 7 13.99 7 11.5S9.01 7 11.5 7 16 9.01 16 11.5c0 .88-.26 1.69-.7 2.39l2.91 2.9-1.42 1.42z"/>
		</svg>
			
		<h3>Поиск запчастей</h3>

		<p>Заполните форму и получите 
			персональные предложения от актуальных компаний</p>

		<div id="search" class="search_button"
		href="{{ Auth::guest() ? '#search-signup-popup' :
				( Auth::user()->is_ready() ? '#search-popup' : '#fill-up-profile-popup' ) }}">
			Найти деталь
		</div>


	</div>

	@if(Auth::check())
		@include('popups.search')
	@else
		@include('popups.search-signup')
	@endif

@endif