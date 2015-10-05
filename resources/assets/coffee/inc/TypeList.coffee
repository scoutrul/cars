class TypeModel extends Backbone.Model
	defaults:
		id: 0
		name: null

class TypesCollection extends Backbone.Collection
	model: TypeModel

class TypeView extends Backbone.View

	initialize: ->

		# css class for active element
		@class = 'type_item--active'

		@model.on('deactivate', @deactivate)

		@model.on 'click', @activate

		@state = false

	events:
		'click': 'changeState'

	changeState: =>
		if @state
			do @deactivate

			@model.trigger('pass')
		else
			do @activate

	activate: =>
		$('#catalog-makes').find('a').each (i, element) =>
			element.href = element.href.replace "/make/", "/make/"+@model.attributes.name+'/'
		$('#catalog-specmakes').find('a').each (i, element) =>
			element.href = element.href.replace /catalog\/(.*)\//, "catalog/$1"+@model.attributes.name+'/'
		@model.trigger('activate', @model)

		@$el.addClass @class

		@state = true

	deactivate: =>
		@$el.removeClass @class
		$('#catalog-makes').find('a').each (i, element) =>
			element.href = element.href.replace @model.attributes.name+'/', ""
		$('#catalog-specmakes').find('a').each (i, element) =>
			console.log element.href
			element.href = element.href.replace @model.attributes.name, ""

		@state = false


class TypeList extends Backbone.View

	initialize: ->

		# active type id
		@activeId = 0

		# initialize hardcocded collection
		# anyway TypesCollection will be in the same file
		@collection = new TypesCollection

		# on change model active deactivate other models
		@collection.on 'activate', @deactivate

		@collection.on 'pass', @pass
	
		do @fillCollection

	# fill typescollection with li's in type's @el
	fillCollection: ->
		@$el.children('li').each (i, li) =>

			id = $(li).data('id')
			name = $(li).data('name')
			m = new TypeModel id: id, name: name
			v = new TypeView model: m, el: li
			@collection.add m

	deactivate:(model) =>
		@activeId = model.get 'id'

		@collection.each (m) =>
			if m isnt model
				m.trigger('deactivate')

		# trigger event for lower dependencies
		@trigger 'changed', @activeId

	pass: =>
		@activeId = 0

		@trigger 'changed', @activeId

	click: ->
		if @collection.length isnt 0
			@collection.at(0).trigger 'click'


module.exports = TypeList