TypeList = require './inc/TypeList'

class SpecModel extends Backbone.Model
	defaults:
		id: 0
		active: false

class SpecCollection extends Backbone.Collection
	model: SpecModel

class SpecView extends Backbone.View

	initialize: ->

		@class = 'parts--active'

	events:
		'click' : 'changeState'

	changeState: =>
		if @model.get 'active' 
			do @deactivate
		else
			do @activate

		@model.trigger('pass')

	activate: =>
		@$el.addClass @class

		@model.set 'active', true

	deactivate: =>
		@$el.removeClass @class

		@model.set 'active', false

class SpecList extends Backbone.View

	initialize: ->

		@collection = new SpecCollection

		@collection.on 'pass', @pass

		do @fillCollection

	pass: =>
		ids = []
		models = @collection.where active: true
		for model in models
			ids.push model.get 'id'

		@trigger 'changed', ids

	fillCollection: ->
		@$el.children('li').each (i, li) =>
			id = $(li).data('id')
			m = new SpecModel id: id
			v = new SpecView model: m, el: li
			@collection.add m


# initializes default collection from html
# on specs or type changed stores ids in specIds and typeId
# then gets makes be typeid and specids and updates collection

class MakeModel extends Backbone.Model
	defaults:
		id: 0
		title: ''

class MakeCollection extends Backbone.Collection
	model: MakeModel

class MakeView extends Backbone.View

	initialize: ->
		@class = 'makes--active'

		@model.on('hide', @hide)

		@model.on('show', @show)

	hide: =>
		@$el.css('display', 'none')

	show: =>
		@$el.css('display', 'block')

	events: 
		'click' : 'changeState'

	changeState: ->
		unless @state then do @activate else do @deactivate

	activate: ->
		@$el.addClass @class
		@state = true

	deactivate: ->
		@$el.removeClass @class
		@state = false

class MakeList extends Backbone.View

	url: 'api/live-makes'

	home: $('body').data 'home'

	typeId: 0

	specIds: []

	initialize: ->

		# dependencies to listen for changes of ids
		@dep = @options.dep

		@collection = new MakeCollection

		do @setDependencies

		# fill collection from html
		do @fillCollection

	fillCollection: ->
		@$el.children('li').each (i, li) =>
			id = $(li).data 'id'
			title = $(li).children('span').html().trim()

			m = new MakeModel id: id, title: title
			v = new MakeView model: m, el: li

			@collection.add m

	# listen for changes
	setDependencies: ->
		@dep.specs.on 'changed', @specsChanged

		@dep.type.on 'changed', @typeChanged

	specsChanged: (ids) =>
		@specIds = ids

		# if ids.length is 0 then return

		do @getMakes

		console.log "specs #{@specIds}"

	typeChanged: (id) =>
		@typeId = id

		do @getMakes

		# if id is 0 then return

		console.log "type #{@typeId}"

	getMakes: ->
		self = @

		$.ajax "#{@home}/#{@url}",
			data: 
				type: @typeId
				specs: @specIds
		.done (ids) ->
			self.updateCollection ids

	updateCollection: (ids) ->
		console.log ids
		if ids.length is 0
			console.log 'yes'
		else

			@collection.each (model) ->

				if ids.have(model.get 'id')
					model.trigger 'show'
				else
					model.trigger 'hide'


specs = new SpecList
	el: '#parts-list'

types = new TypeList
	el: '#main-type-list'

makes = new MakeList
	el: '#main-makes-list'
	dep: 
		specs: specs
		type: types