$(function() {

window.AppView = function() {
    this.showView = function(view) {
	    var render = true;
	    if (typeof this.currentView == 'undefined') {
	    	render = false;
	    }
		if (this.currentView) {
		    this.currentView.close();
		}
	
		this.currentView = view;
		
		if (render) {
			this.currentView.render();
	    }
	
		//$('#main').html(this.currentView.el);
    };
};

window.workspace = Backbone.Router.extend({
	routes: {
		"": "home",
        'project/:id': 'project_details',
		"projects": "projects",
		
		"*path": 'notFound'
	},

    initialize: function(options) {
    	this.appView = options.appView;
    	var self = this;
        $('a:not(.outer)').live('click', function(e) {
        	e.preventDefault();
        	self.navigate($(this).attr('href'), true);
        });
    	Backbone.history.start({pushState: true});
    },
    
    notFound: function() {
    	notfound = new notFoundView;
    	this.appView.showView(notfound);
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

window.notFoundView = Andho.View.extend({
	tagName: 'section',
	template: 'notfound',
	render: function() {
		$(this.el).html(this.getTemplate());
	}
});
    
window.navView = Andho.View.extend({
	el:  "#main-nav",
	
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
	
    initialize: function() {
    	$(this.el).attr('id', 'main-nav');
    }
});

window.homeView = Andho.View.extend({
    el: '#main',
    template: 'home',
    render: function() {
	document.title = "Andho: Home";

	$(this.el).html(this.getTemplate());
    }
});

window.projectView = Andho.View.extend({
    el: '#main',
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

window.projectItemView = Andho.SubView.extend({
    tagName: 'span',
    template: 'project',
    render: function(data) {
        $(this.el).html(this.getTemplate(this.model.toJSON()));
        
        return this;
    }
});

window.ProjectDetailsView = Andho.View.extend({
    el: '#main',
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
