SelectView = require './SelectView'

$('#search').magnificPopup

	type : 'inline'
	closeBtnInside: true


model = new SelectView 
	el: '#search-model'
	url: 'api/get-models'

make = new SelectView 
	el: '#search-make'
	c: model
	url: 'api/get-makes'

type = new SelectView 
	el: '#search-type'
	c: make



autosize $ '#search-more'