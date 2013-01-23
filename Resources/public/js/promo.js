$(document).live( 'pagebeforecreate',function(event){
    
            $(document).bind('pagebeforeshow',function(event) {
                tinyMCE.init({
                mode : "textareas.promoText",
                selector : "textarea.promoText",
                theme : "advanced",
                width: 570,
                theme_advanced_buttons1 : "bold, italic, |, fontselect, fontsizeselect, |, forecolor, backcolor",
                theme_advanced_statusbar_location: "none",
                content_css : "/bundles/qwerpromo/css/tinymce.css",
            });
                tinyMCE.init({
                mode : "input.promoText",
                selector : "input.promoText",
                theme : "advanced",
                width: 570,
                height: 5,
                theme_advanced_buttons1 : "bold, italic, |, fontselect, fontsizeselect, |, forecolor, backcolor",
                theme_advanced_statusbar_location: "none",
                content_css : "/bundles/qwerpromo/css/tinymce.css",
            });
        });
        $(".promoAmount input").bind("change", function(){            
           $(".promoAmount1, .promoAmount0").removeAttr("disabled");
           $(".promoAmount"+$(this).val()).attr("disabled", "disabled");
           
        });
        
});
