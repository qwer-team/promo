$(document).live( 'pagebeforecreate',function(event){
    
            $(document).bind('pagebeforeshow',function(event) {
                tinyMCE.init({
                mode : "textareas.promoText",
                selector : "textarea.promoText",
                theme : "advanced",
                width: 500,
                theme_advanced_buttons1 : "bold, italic, |, forecolor, backcolor",
                theme_advanced_statusbar_location: "none"                
            });
                tinyMCE.init({
                mode : "input.promoText",
                selector : "input.promoText",
                theme : "advanced",
                width: 500,
                height: 5,
                theme_advanced_buttons1 : "bold, italic, |, forecolor, backcolor",
                theme_advanced_statusbar_location: "none"                
            });
        });
    
});