<div id="company-signup-popup" class="popup mfp-hide popup--create-company">

	<div class="popup_content">

		<h3 class="popup_header">Добавление компании</h3>

		<div class="popup_info">
			<input type="checkbox" class="popup_search_checkbox" id="popup_checkbox">
			<label for="popup_checkbox" class="popup_search_label">
				<svg class="svg_info" xmlns="http://www.w3.org/2000/svg" fill="#000000" height="16" viewBox="0 0 24 24" width="16">
				  <path d="M0 0h24v24H0z" fill="none"/>
				  <path d="M11 17h2v-6h-2v6zm1-15C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM11 9h2V7h-2v2z"/>
				</svg>
				<span>Преимущества регистрации компании</span>
				<div class="info_content">
				Найдите своего клиена, заявив о себе на страницах сайта!<br><br>
				Приглашаем организации, специализирующиеся на грузовом коммерческом транспорте, в каталог "Комтранс". <br><br>
				Сегодня регистрация абсолютно <b>бесплатна</b>! 
								<hr>
				</div>
			</label>
		</div>

		<div class="popup_content--create-company">

			<div class="create-company_higher">

				<div>
					<div class="popup_field">

						<div class="popup_label">Специализация</div>

						<select name="" id="create-company-spec" class="popup_select create-company-spec create-company">

							<option value="" disabled selected></option>

							@foreach($specs as $spec)

								<option value="{{ $spec->id }}" class="popup_option" data-light="{{ intval($spec->light_spec) }}">
									{{ $spec->title }}
								</option>

							@endforeach

						</select>

					</div>
				</div>
				<div>
					<div class="popup_field popup_field--types">

						<div class="popup_label">Ориентация</div>

						<select name="" id="create-company-type"
						class="popup_select create-company">

							<option value="" disabled selected></option>

							@foreach($types as $type)

								<option value="{{ $type->id }}" class="popup_option">
									{{ $type->title }}
								</option>

							@endforeach

						</select>

					</div>
				</div>

			</div>

			<div id="create-company_makes-models" class="create-company_makes-models">

				<div class="popup_header-field">
					<div class="popup_label">Производители</div>

					<div class="popup_plus-sign">
						+ Добавить
					</div>
				</div>

			</div>

			<div class="create-company_lower">

				<div>
					<div class="popup_field">

						<div class="popup_label">Название</div>

						<input id="create-company-name" type="text" class="popup_input"
						placeholder="Например: 'Комтранс'">

					</div>

					<div class="popup_field">

						<div class="popup_label">Адрес</div>

						<input id="create-company-address" type="text" class="popup_input"
						placeholder="город, улица, дом...">

					</div>

					<div class="popup_field">

						<div class="popup_label">Телефоны</div>

						<input id="create-company-phone" type="text" class="popup_input"
						placeholder="Например: 8 (495) 123-45-67">

					</div>
				</div>

				<div>
                        <div class="popup_field">

                            <div class="popup_label">Форма собственности</div>

                            <select name="" id="create-company-ctype" class="popup_select create-company">
                                <option value="" disabled selected></option>
								@foreach($ctypes as $ctype)
									<option value="{{ $ctype->id }}" class="popup_option">
										{{ $ctype->name }}
									</option>
								@endforeach
                            </select>

                        </div>

					<div class="popup_field">

						<div class="popup_label">Кратко о компании</div>

						<textarea name="" id="create-company-about" cols="30" rows="7" class="popup_textarea"></textarea>

					</div>

					<div class="popup_field">

						<div class="popup_header-field">

							<div id="create-company-logo-label" class="popup_label">Логотип <i>(если есть)</i></div>

							<div id="create-company-logo-btn" class="popup_pick-file">
								Выбрать файл
							</div>

							<input type="file" id="create-company-logo">

						</div>

						<div id="create-company-logo-html" class="popup_comp-logo"></div>

					</div>
				</div>

			</div>

		</div>

		<div id="company-signup-auth">

			<h3 class="popup_header">Доступ к сайту</h3>

			<div class="popup_field">

				<label class="popup_label">Введите e-mail</label>

				<input name="email" type="email" class="popup_input company-signup-email">

			</div>

			<div class="popup_field">

				<label class="popup_label">Придумайте пароль</label>

				<input name="password" type="text" class="popup_input company-signup-pass">

			</div>

			<div class="popup_check--box">

				<input id="sign-up-company-check" name="agree" type="checkbox" class="popup_check popup_agree" checked>
				<span>
					Согласен с <a href="{{ route('home') }}/page/pravila" target="_blank">правилами</a> клуба.
				</span>

			</div>

		</div>

		<div id="create-company-submit" class="popup_button">Зарегистрировать компанию</div>

	</div>

</div>

@include('templates.create-company-make')

@include('templates.create-company-model')

@include('templates.create-company-models-list')