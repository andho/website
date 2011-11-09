TemplateManager = {
    template_status: {},
    template_callbacks: {},
    
    getTemplate: function(template_name, callback) {
        if (typeof ich[template_name] != 'function') {
            if (this.template_status[template_name] != 'loading') {
                this.template_status[template_name] = 'loading';
                
                if (typeof callback != 'function') {
                    console.log('Invalid function passed as callback');
                }
                
                if (typeof this.template_callbacks[template_name] == 'undefined') {
                    this.template_callbacks[template_name] = new Array();
                }
                this.template_callbacks[template_name].push(callback);
                var self = this;
                $.get('templates/'+template_name+'.tmpl', function(tmpl) {
                    ich.addTemplate(template_name, tmpl);
                    self.executeCallbacks(template_name);
                });
            } else {
                this.template_callbacks[template_name].push(callback);
            }
            return false;
        } else {
            return ich[template_name];
        }
    },
    
    executeCallbacks: function(template_name) {
        for (var i=0; i<this.template_callbacks[template_name].length; i++) {
            this.template_callbacks[template_name][i]();
        }
        this.template_callbacks[template_name] = new Array();
    }
}
