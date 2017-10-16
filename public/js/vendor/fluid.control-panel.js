$('.control-panel').mouseenter(
    function() {
        $('.control-panel').stop().animate({"right": "-5px"}, 500);
    }
).mouseleave(
    function() {
        $('.control-panel').stop().animate({"right": "-140px"}, 500);
    }
);