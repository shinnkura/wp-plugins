(function() {
    tinymce.create('tinymce.plugins.codeblock', {
        init : function(ed, url) {
            ed.addButton('codeblock', {
                title : 'Insert code block',
                image : url+'/icon.png',
                onclick : function() {
                    var selected_text = ed.selection.getContent();
                    var return_text = '';
                    return_text = '[codeblock]' + selected_text + '[/codeblock]';
                    ed.execCommand('mceInsertContent', 0, return_text);
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('codeblock', tinymce.plugins.codeblock);
})();
