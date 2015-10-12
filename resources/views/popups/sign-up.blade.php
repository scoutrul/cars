<div id="sign-up-popup" class="mfp-hide popup popup--sign-up">
	
	<div class="popup_content">
		
		<h3 class="popup_header">Регистрация в клубе<br>"Комтранс"</h3>

		<div class="popup_search">
			<input type="checkbox" class="popup_search_checkbox" id="popup_checkbox">
			<label for="popup_checkbox" class="popup_search_label">
				<svg class="svg_info" xmlns="http://www.w3.org/2000/svg" fill="#000000" height="16" viewBox="0 0 24 24" width="16">
				  <path d="M0 0h24v24H0z" fill="none"/>
				  <path d="M11 17h2v-6h-2v6zm1-15C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM11 9h2V7h-2v2z"/>
				</svg>
				<span>Преимущества регистрации</span>
				<div class="info_content">
					Стать членом клуба "Комтранс" очень просто! <br><br>

					Для этого достаточно ввести в форму ниже Ваши данные и подтвердить регистрацию по почте.<br><br>

					Зарегистрированные члены клуба, помимо прочего, имеют бесплатную возможность производить поиск запчастей и услуг по авторизованным организациям каталога "Комтранс".
					<hr>
				</div>
			</label>
		</div>



		{!! Form::open(['method' => 'post', 'route' => 'user-create', 'id' => 'sign-up-form']) !!}

			<div class="popup_field">
				
				<label class="popup_label">Введите e-mail</label>
			
				<input name="email" type="email" class="popup_input">
			
			</div>
			
			<div class="popup_field">
				
				<label class="popup_label">Введите пароль</label>
			
				<input name="password" type="text" class="popup_input">
			
			</div>

			<div class="popup_check--box">
			
				<input id="sign-up-check" name="agree" type="checkbox" class="popup_check popup_agree" checked>
				<span>
					Согласен с <a href="/page/pravila" target="_blank">правилами</a> клуба.
				</span>
			
			</div>
			
			<div id="sign-up-button" class="popup_button">
				Зарегистрироваться
			</div>

		{!! Form::close() !!}

	</div>

</div>