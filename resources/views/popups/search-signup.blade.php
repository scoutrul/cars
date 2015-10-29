<div id="search-signup-popup" class="mfp-hide popup popup--search">

    <div class="popup_content">

        <h3 class="popup_header">Найти запчасть</h3>

        <div class="popup_info">
            <input type="checkbox" class="popup_info_checkbox" id="popup_checkbox">
            <label for="popup_checkbox" class="popup_info_label">
                <svg class="svg_info" xmlns="http://www.w3.org/2000/svg" fill="#000000" height="16" viewBox="0 0 24 24" width="16">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M11 17h2v-6h-2v6zm1-15C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM11 9h2V7h-2v2z"/>
                </svg>
                <span>Как это работает?</span>
                <div class="info_content">
                    При помощи данной формы вы можете отправить <b>запрос на поиск запасных частей</b> для грузового коммерческого транспорта. <br><br>
                    Ваш запрос будет разослан подходящим компаниям нашего каталога, ответы от которых будут приходить к вам на почту. <br><br>
                    Эта схема позволит Вам быстро и эфективно найти необходимую запчасть или услугу.
                    <hr>
                </div>
            </label>
        </div>

        <div class="popup_checks">

            <input id="search-new" type="checkbox" class="popup_check">
            <label class="popup_label">Новая</label>

            <input id="search-old" type="checkbox" class="popup_check">
            <label class="popup_label">б/у</label>

        </div>

        <div class="popup_field">
            <select id="search-type" class="popup_select">

                <option class="popup_option" selected disabled>Тип авто</option>

                @foreach($types as $type)

                <option value="{{ $type->id }}" class="popup_option">
                    {{ $type->title }}
                </option>

                @endforeach

            </select>
        </div>

        <div class="popup_field">
            <select id="search-make" class="popup_select">

                <option class="popup_option" selected disabled>Производитель</option>

            </select>
        </div>

        <div class="popup_field">
            <select id="search-model" class="popup_select">

                <option class="popup_option" selected disabled>Уточните модель</option>

            </select>
        </div>

        <div class="popup_field">
            <label class="popup_label">Год выпуска</label>
            <input type="text" id="search-year" class="popup_input">
        </div>

        <div class="popup_field">
            <label class="popup_label">Дополнительная информация</label>
			<textarea
                id="search-more" cols="30" rows="7" placeholder="VIN, кузов, пожелания"
                class="popup_textarea"></textarea>
        </div>

        <div id="search-signup-auth">

            <h3 class="popup_header">Доступ к сайту</h3>

            <div class="popup_field">

                <label class="popup_label">Введите e-mail</label>

                <input name="email" type="email" class="popup_input search-signup-email">

            </div>

            <div class="popup_field">

                <label class="popup_label">Придумайте пароль</label>

                <input name="password" type="text" class="popup_input search-signup-pass">

            </div>

            <div class="popup_check--box">

                <input id="sign-up-search-check" name="agree" type="checkbox" class="popup_check popup_agree" checked>
				<span>
					Согласен с <a href="{{ route('home') }}/page/pravila" target="_blank">правилами</a> клуба.
				</span>

            </div>

        </div>

        <div id="search-button" class="popup_button">
            Запросить
        </div>

    </div>

    @include('templates.options-template')

</div>