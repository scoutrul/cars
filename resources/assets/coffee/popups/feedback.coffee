SelectView = require './SelectView'

$('#feedback').magnificPopup

	type : 'inline'
	closeBtnInside: true

model = new SelectView 
	el: '#feedback-model'
	url: 'api/get-models'

make = new SelectView 
	el: '#feedback-make'
	c: model
	url: 'api/get-makes'

type = new SelectView 
	el: '#feedback-type'
	c: make


class Image extends Backbone.Model
	defaults:
		src: '' 


class ImageCollection extends Backbone.Collection
	model : Image

class ImageView extends Backbone.View

	className : 'feedback_photo'

	template: Handlebars.compile $('#photos-template').html()

	initialize: ->
		self = @
		@model.on('clean', @clean)

		do @render

		@$el.find('.feedback_redx:first').click ->
			do self.destroy

	clean: =>
		do @$el.remove

	destroy: =>
		do @model.destroy
		do @clean

	render: ->
		@$el.html @template src : @model.get('src')

class ImagesView extends Backbone.View

	initialize: ->
		console.log @collection

		@collection.on('add', @added)

	added: (m) =>
		do @clean
		do @render

	clean: ->
		@collection.each (image) =>
			image.trigger('clean')

	render: ->
		@collection.each (image) =>
			view = new ImageView model: image
			@options.plus.before view.el


imageCollection = new ImageCollection


imagesView = new ImagesView 
	collection : imageCollection
	el: '#feedback-photos'
	plus: $('#feedback-plus')


class AddPhotos

	constructor: (input, plus) ->
		self = @

		@input = $(input)
		@plus = $(plus)

		@input.change ->
			self.check @files

		@plus.click ->
			self.input.click()

	check: (files) ->
		for file in files
			unless file.type.search('image') is -1
				@read file

	read: (file) ->
		src = ''
		r = new FileReader()

		r.onloadend = ->
			imageCollection.add new Image src : r.result

		r.readAsDataURL(file)


new AddPhotos '#feedback-input', '#feedback-plus'