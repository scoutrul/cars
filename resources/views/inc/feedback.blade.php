<div class="feedback">

	<svg class="header_svg_icon" fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
	    <path d="M0 0h24v24H0z" fill="none"/>
	    <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 12h-2v-2h2v2zm0-4h-2V6h2v4z"/>
	</svg>
	
	<h3 class="feedback_h3">Ваше мнение об авто</h3>
	<p class="feedback_p">
		Вы можете оставить отзыв об эксплуатации Вашего автомобиля
	</p>

	<div id="feedback" class="feedback_button"
	href="{{ Auth::guest() ? '#sign-up-popup' : 
			( Auth::user()->is_ready() ? '#feedback-popup' : '#fill-up-profile-popup' ) }}" >
		
		Написать отзыв
	</div>

</div>

@include('popups.feedback')