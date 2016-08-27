(function() {
    tinymce.PluginManager.add('wpbootscore_mce_button', function( editor, url ) {
        editor.addButton( 'wpbootscore_mce_button', {
            text: 'Shortcodes',
            icon: 'button',
            type: 'menubutton',
            menu: [

                // No Parameter
                {
                      text: 'No Parameter',
                      onclick: function() {
                      editor.insertContent('[single_noparameter_shortcode]');
                     }
               },

               {
                    text: 'With Parameter',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Feature Generator',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'single_line',
                                    label: 'Single Line',
                                    value: 'Title here',
                                },
                                {
                                    type: 'listbox',
                                    name: 'dropdown',
                                    label: 'Dropdown',
                                    'values': [
                                        {text: 'One', value: 'One'},
                                        {text: 'Two', value: 'Two'},
                                    ]
                                },
                                
                            ],
                            onsubmit: function( e ) {
                                editor.insertContent( 
                                    '[single parameter="'+e.data.single_line+'" parameter="'+e.data.dropdown+'"]'
                                    );
                            }
                        });
                    }
                },

                // Section
                {
                    text: 'Section',
                    menu: [
{
                    text: 'With Parameter',
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Feature Generator',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'single_line',
                                    label: 'Single Line',
                                    value: 'Title here',
                                },
                                {
                                    type: 'textbox',
                                    name: 'multiple_line',
                                    label: 'Multiple Line',
                                    value: 'Message here',
                                    multiline: true,
                                    minWidth: 300,
                                    minHeight: 100
                                },
                                
                            ],
                            onsubmit: function( e ) {
                                editor.insertContent( 
                                    '[double parameter="'+e.data.single_line+'"]<p>'+e.data.multiple_line+'</p>[/double]'
                                    );
                            }
                        });
                    }
                },

                    ]
                },

            ]
        });
    });
})();