if (typeof andho == 'undefined') {
    Andho = {};
}

Andho.View = Backbone.View.extend({
    getTemplate: function(data) {
        if (typeof this.template != 'function') {
            var template_name = this.template;
            
            if (ich[template_name]) {
                this.template = ich[template_name];
                return this.template(data, true);
            }
            
            var self = this;
            $.get('templates/'+template_name+'.tmpl', function(tmpl) {
                ich.addTemplate(template_name, tmpl);
                self.template = ich[template_name];
                self.render();
            });
            
            return '...loading...';
        } else {
            return this.template(data, true);
        }
    }
});
