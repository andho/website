$(function() {

window.AppView = function() {
    this.showView = function(view) {
	if (this.currentView) {
	    this.currentView.close();
	}

	this.currentView = view;
	this.currentView.render();

	$('#main').html(this.currentView.el);
    };
}

    Backbone.View.prototype.close = function() {
	this.remove();
	this.unbind();
	if (this.onClose) {
	    this.onClose();
	}
    }

window.workspace = Backbone.Router.extend({
	routes: {
		"": "home",
        'project/:id': 'project_details',
		"projects": "projects"
	},

    initialize: function(options) {
	this.appView = options.appView;
    },
	
    home: function() {
	var home = new homeView;
	this.appView.showView(home);
    },
    
    projects: function() {
        if (typeof window.projects == 'undefined') {
            window.projects = new Projects;
            window.projects.fetch();
        }
        
	var projects = new projectView({model: window.projects});
	this.appView.showView(projects);
    },
    
    project_details: function(id) {
        if (typeof window.projects == 'undefined') {
            window.projects = new Projects;
            window.projects.fetch();
        }
        
        var projectDetails = new ProjectDetailsView({model: window.projects.get(id)});
	this.appView.showView(projectDetails);
    }
});
	
    window.navModel = Backbone.Model.extend({
	
    });

window.navView = Andho.View.extend({
	tagName:  "nav",
	
    model: new window.navModel({
	menuitems: [
	    {
		label: 'Home',
		link: ''
	    },
	    {
		label: 'Projects',
		link: 'projects'
	    },
	    {
		label: 'Blog',
		link: 'http://blog.andho.com',
		class: 'outer'
	    }
	]
    }),

    template: 'nav',
    
    render: function() {
	$(this.el).attr('id', 'main-nav');
	$(this.el).html(this.getTemplate(this.model.toJSON()));
	
	return this;
    },
	
    events: {
    	"click a:not(.outer)": "showPage"
    },
    
    initialize: function() {
    	$(this.el).attr('id', 'main-nav');
    },
    
    showPage: function(e) {
	router.navigate($(e.currentTarget).attr('href'), true);
    }
});

window.homeView = Andho.View.extend({
    tagName: 'section',
    template: 'home',
    events: {
		"click #projects": "showProjects"
    },
    render: function() {
	document.title = "Andho: Home";

	$(this.el).html(this.getTemplate());
    },
    showProjects: function() {
    	router.navigate('projects', true);
    }
});

window.projectView = Andho.View.extend({
    tagName: 'section',
    template: 'projects',
    initialize: function() {
        this.model.bind('reset', this.render, this);
    },
    render: function() {
	document.title = 'Andho: Projects';

        $(this.el).html(this.getTemplate());
        
        if (typeof this.template == 'function') {
            for (var i=0; i<this.model.length; i++) {
                var project_view = new projectItemView({model: this.model.at(i)});
                $('dl', this.el).append(project_view.render().el);
            }
        }
    },
    onClose: function() {
	this.model.unbind('reset', this.render);
    }
});

window.projectItemView = Andho.View.extend({
    tagName: 'span',
    template: 'project',
    events: {
        'click dt': 'onClick'
    },
    render: function(data) {
        $(this.el).html(this.getTemplate(this.model.toJSON()));
        
        return this;
    },
    onClick: function() {
        window.router.navigate('project/'+this.model.get('id'), true);
    }
});

window.ProjectDetailsView = Andho.View.extend({
    tagName: 'section',
    template: 'project-details',
    initialize: function() {
        this.model.fetch();
        this.model.bind('change', this.render, this);
    },
    render: function() {
	document.title = 'Andho: Project - ' + this.model.get('name');
        $(this.el).html(this.getTemplate(this.model.toJSON()));
    },
    onClose: function() {
	this.model.unbind('change', this.render);
    }
});

});
