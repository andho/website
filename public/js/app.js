$(function() {

window.workspace = Backbone.Router.extend({
	routes: {
		"": "home",
		"projects": "projects"
	},
	
	home: function() {
		var app = new homeView;
		app.render();
	},
	
	projects: function() {
		var projects = new projectView;
		projects.render();
	}
});
	
window.navView = Backbone.View.extend({
	tagName:  "nav",
	
	template: '<a id="homelink">Home page</a> <a id="projects">Projects</a>',
	
	render: function() {
		$(this.el).html(this.template);

		return this;
	},
	
    events: {
    	"click #homelink": "showHome",
    	"click #projects": "showProjects"
    },
    
    initialize: function() {
    	$(this.el).attr('id', 'main-nav');
    	
    	window.router.bind('route:', function() {
    		console.log('gotohomepage');
    	});
    },
    
    showHome: function() {
    	router.navigate('', true);
    },
    
    showProjects: function() {
    	router.navigate('projects', true);
    }
});

window.homeView = Backbone.View.extend({
	el: $('#main'),
    template: ich.homepage,
	events: {
		"click #projects": "showProjects"
	},
	render: function() {
		$(this.el).html(this.template({}, true));
	},
    showProjects: function() {
    	router.navigate('projects', true);
    }
});

window.projectView = Backbone.View.extend({
	el: $('#main'),
    template: ich.projectspage,
	render: function() {
		$(this.el).html(this.template({}, true));
	}
});

});
