if (typeof andho == 'undefined') {
    Andho = {};
}

Andho.View = Backbone.View.extend({
    getTemplate: function(data) {
        if (typeof this.template != 'function') {
            var self = this;
            var template = TemplateManager.getTemplate(this.template, function() {self.render()});
            
            if (template === false) {
                return this.getLoadingTemplate();
            }
            
            this.template = template;
        }
        
        return this.template(data, true);
    },
    getLoadingTemplate: function() {
        return '...Loading...';
    }
});
