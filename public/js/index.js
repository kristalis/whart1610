$(document).ready(function(e) {
	//$('.carousel').carousel();
});

(function() {
    //settings
    var fadeSpeed = 200, fadeTo = 1, topDistance = 15;
    var topbarME = function() { $('.navbar').fadeTo(fadeSpeed,1); }, topbarML = function() { $('.navbar').fadeTo(fadeSpeed,fadeTo); };
    var inside = false;
    //do
    $(window).scroll(function() {
        position = $(window).scrollTop();
        if(position > topDistance && !inside) {
            //add events
            topbarML();
            $('.navbar').bind('mouseenter',topbarME);
            $('.navbar').bind('mouseleave',topbarML);
            inside = true;
        }
        else if (position < topDistance){
            topbarME();
            $('.navbar').unbind('mouseenter',topbarME);
            $('.navbar').unbind('mouseleave',topbarML);
            inside = false;
        }

        var topHeight = $('#header-main').height();


        if($(document).scrollTop() > topHeight) {
            $('.navbar').addClass('nav-top');
        }
        else {
            $('.navbar').removeClass('nav-top');
        }
    });
})();