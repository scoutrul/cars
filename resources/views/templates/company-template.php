<script id="company-template" type="text/x-handlebars-template">

	<div class="company-preview">
		<div class="company-preview_logo"
			style="background-image: {{logo}}"
		></div>
		<div class="company-preview_info">
			<div class="company-preview_info_name">{{name}}</div>
			<div class="company-preview_info_address"><b>Адрес:</b> {{address}}</div>
			<div class="company-preview_info_contact"><b>Контакты:</b> {{phone}}</div>
		</div>
	</div>

	<div class="company-popup_spec">Специализация</div>

	<div class="company-popup_tags">
		{{#each tags}}
			<div class="company-popup_tag">{{this}}</div>
		{{/each}}

	</div>

	<div class="company-popup_desc">Об организации</div>

	<p class="company-popup_description">
		{{about}}
	</p>

	<div class="company-popup_close">Закрыть</div>

</script>