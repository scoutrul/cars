SelectView = require '../inc/SelectView'

$('.search_button').magnificPopup

	type : 'inline'
	closeBtnInside: true

model = new SelectView 
	el: '#search-model'
	url: 'api/get-models-by-make'
	type: 0

make = new SelectView 
	el: '#search-make'
	c: model
	url: 'api/get-makes-by-type'

type = new SelectView 
	el: '#search-type'
	c: make

more = $ '#search-more'

year = $ '#search-year'

autosize more

isNew = $ '#search-new'

isOld = $ '#search-old'

isNewLabel = $('#search-new + label')

isOldLabel = $('#search-old + label')

searchSignUp = $ '#search-signup-auth'

signUpSearchCheck = $ '#sign-up-search-check'

button = $ '#search-button'

button.click ->

	result = {}

	if isNew.is(':checked') or isOld.is(':checked')
		if isNew.is(':checked') and isOld.is(':checked')
			result.new = 1
			result.old = 1
		else if isNew.is(':checked')
			result.new = 1
			result.old = 0
		else if isOld.is(':checked')
			result.new = 0
			result.old = 1
	else
		isNewLabel.blink()
		isOldLabel.blink()
		return

	
	if type.get()?
		result.type = parseInt type.get()
	else
		type.error()
		return

	if make.get()?
		result.make = parseInt make.get()
	else
		make.error()
		return

	if model.get()?
		result.model = parseInt model.get()
	else
		model.error()
		return

	if year.val() isnt ''
		result.year = year.val()
	else
		year.blink()
		return

	if more.val() isnt ''
		result.more = more.val()
	else
		more.blink()
		return


	if searchSignUp.length
		if signUpSearchCheck.prop('checked') isnt true
			return

		email = searchSignUp.find '.search-signup-email'
		pass = searchSignUp.find '.search-signup-pass'

		if email.val() is ''
			email.blink()
			return
		else
			result.email = email.val()

		if pass.val() is ''
			pass.blink()
			return
		else
			result.pass = pass.val()

		pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i

		if not pattern.test email.val()
			email.blink()
			return


	$(@).preload 'start'

	$.ajax "#{$('body').data('home')}/api/request/create",
			headers:
				'X-CSRF-TOKEN' : $('body').data 'csrf'
			method: 'POST'
			data: result
		.done (response) =>
			console.log response
			$(@).preload('stop')

			setTimeout ->
				$.magnificPopup.instance.close()
				
				$.alert 'Ваша заявка отправлена! Мы уведомим Вас, как только поступят ответы от компаний.', true
			, 1000