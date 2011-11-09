var Project = Backbone.Model.extend({
    
});

var Projects = Backbone.Collection.extend({
   
   model: Project,
   
   url: 'models/projects'
    
});
