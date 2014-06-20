(function($){ 

    $.fn.popupWindow = function(instanceSettings){
        
        return this.each(function(){
        
        $(this).click(function(){
        
        $.fn.popupWindow.defaultSettings = {
            centerBrowser:1,
            centerScreen:0,
            height:500,
            left:0,
            location:0,
            menubar:0,
            resizable:0, 
            scrollbars:0,
            status:0, 
            width:500,
            windowName:null,
            windowURL:null,
            top:0,
            toolbar:0
        };
        
        settings = $.extend({}, $.fn.popupWindow.defaultSettings, instanceSettings || {});
        
        var windowFeatures =    'height=' + settings.height +
                                ',width=' + settings.width +
                                ',toolbar=' + settings.toolbar +
                                ',scrollbars=' + settings.scrollbars +
                                ',status=' + settings.status + 
                                ',resizable=' + settings.resizable +
                                ',location=' + settings.location +
                                ',menuBar=' + settings.menubar;

                settings.windowName = this.name || settings.windowName;
                settings.windowURL = $(this).data('link') || settings.windowURL;
                var centeredY,centeredX;
            
                if(settings.centerBrowser){
                        
                    if ($.browser.msie) {//hacked together for IE browsers
                        centeredY = (window.screenTop - 120) + ((((document.documentElement.clientHeight + 120)/2) - (settings.height/2)));
                        centeredX = window.screenLeft + ((((document.body.offsetWidth + 20)/2) - (settings.width/2)));
                    }else{
                        centeredY = window.screenY + (((window.outerHeight/2) - (settings.height/2)));
                        centeredX = window.screenX + (((window.outerWidth/2) - (settings.width/2)));
                    }
                    window.open(settings.windowURL, settings.windowName, windowFeatures+',left=' + centeredX +',top=' + centeredY).focus();
                }else if(settings.centerScreen){
                    centeredY = (screen.height - settings.height)/2;
                    centeredX = (screen.width - settings.width)/2;
                    window.open(settings.windowURL, settings.windowName, windowFeatures+',left=' + centeredX +',top=' + centeredY).focus();
                }else{
                    window.open(settings.windowURL, settings.windowName, windowFeatures+',left=' + settings.left +',top=' + settings.top).focus();  
                }
                return false;
            });
            
        }); 
    };

})(jQuery);
(function(window, $) {
    var AW = {
        initialize: function() {
          $('body').prepend('<div id="menu-mobile"><span class="bt-menu">Menu</span><div class="wrapper-menu"></div></div>');
            $('#header nav.main ul.menu').clone().appendTo('#menu-mobile .wrapper-menu');
            $('#header nav.search .search-text').clone().appendTo('#menu-mobile .wrapper-menu');
            $('#header nav.main .others').clone().appendTo('#menu-mobile .wrapper-menu');

            $("#menu-mobile .bt-menu").click(function() {
                if ($("#menu-mobile").hasClass('open')) {
                    $("#menu-mobile").removeClass('open');
                } else {
                    $("#menu-mobile").addClass('open');
                }
            });
            $('#menu-mobile .dropdown').on('click', function() {
//                $(this).find('a:first').removeAttr("href");
                $(this).find('ul').slideToggle();
            });
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                $('#menu-mobile').addClass('is-mobile');
            }},
    };
    $(document).ready(function() {
        AW.initialize();
    });
    window.AW = window.AW || {};
    window.AW = AW;
})(window, window.jQuery);
$(document).ready(ScrollMenuMobile);
$(window).resize(ScrollMenuMobile);
function ScrollMenuMobile() {
    $('.wrapper-menu').css('height', $(window).height() + 'px');
}
function checkAdBlock() {
    var retVal = false;
    if ($.isAdblockOn === undefined) {
        retVal = true;
    }
    return retVal;
}