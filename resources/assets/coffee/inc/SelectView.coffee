class SelectView extends Backbone.View

	home: $('body').data('home')

	initialize: ->
		do @$el.selectBox

	events:
		'change' : 'selected'

	selected: ->
		do @options.c.reset if @options.c
		@options.c.options.parent  = @ if @options.c
		@options.c.store @$el.val() if @options.c

	reset: ->
		# remove native options
		@$el.find('option:not(:first)').remove()

		# refresh selectbox
		@$el.selectBox 'refresh'

		# reset on children
		do @options.c.reset if @options.c

	error: ->
		@$el.selectBox('control').blink()
		
	render: ->
		temp = $.HandlebarsFactory '#options-template'

		options = temp @options.json

		html = $.parseHTML(options)

		@$el.find('option:first').after(html)

		@$el.selectBox 'refresh'

	store: (id) ->
		self = @
		$.ajax "#{@home}/#{@options.url}",
			data:
				id: id
		.done (d) ->
			console.log d
			if(typeof self.options.type isnt "undefined")
				type = self.options.parent.options.parent.$el.val()
				d = (item for item in d when (typeof item isnt "undefined") && (parseInt(item.type_id) is parseInt(type)))
#				for i, key in d
#					if typeof i is "undefined"
#						console.log "undefined: ", key
#						d.splice(key, 1)
#						continue
#					console.log "i: ", i, "i.type: ", i.type_id, "type: ", type, "equals: ", parseInt(i.type_id) isnt parseInt(type)
#					if(parseInt(i.type_id) isnt parseInt(type))
#						console.log "splicing: ", i
#						d.splice(key, 1);
			console.log d
			self.options.json = d
			do self.render

	get: ->
		@$el.val()

module.exports = SelectView