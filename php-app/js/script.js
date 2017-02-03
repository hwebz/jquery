var Actors = {
	init: function(config) {
		this.config = config;

		$.ajaxSetup({
			url: 'index.php',
			type: 'POST'
		});
		

		this.setupTemplates();
		this.bindEvents();
	},

	bindEvents: function() {
		this.config.letterSelection.on('change', this.fetchActors);
		this.config.actorList.on('click', 'li', this.displayAuthorInfo);
		this.config.actorInfo.on('click', 'span.close', this.closeOverlay);
	},

	setupTemplates: function() {
		this.config.actorListTemplate = Handlebars.compile(this.config.actorListTemplate);
		this.config.actorInfoTemplate = Handlebars.compile(this.config.actorInfoTemplate);

		Handlebars.registerHelper('fullName', function(actor) {
			return actor.first_name + ' ' + actor.last_name; 
		});
	},

	fetchActors: function() {
		var self = Actors;
		$.ajax({
			data: self.config.form.serialize(),
			dataType: 'json',
			success: function(results) {
				self.config.actorList.empty();
				if (results[0]) {
					self.config.actorList.append(self.config.actorListTemplate(results));
				} else {
					self.config.actorList.append('<li>No actor found!</li>');
				}
			}
		});
	},

	displayAuthorInfo: function(event) {
		var self = Actors;
		
		self.config.actorInfo.slideUp(300);

		$.ajax({
			data: { actor_id: $(this).data('actor-id') }
		}).done(function(results) {
			self.config.actorInfo.html(self.config.actorInfoTemplate({ info: results })).slideDown(300);
		});

		event.preventDefault();
	},

	closeOverlay: function() {
		Actors.config.actorInfo.fadeOut(300);
	}
}

Actors.init({
	letterSelection: $('#q'),
	form: $('#actor-selection'),
	actorListTemplate: $('#actor_list_template').html(),
	actorInfoTemplate: $('#actor_info_template').html(),
	actorList: $('.actors_list'),
	actorInfo: $('div.actor_info')
});