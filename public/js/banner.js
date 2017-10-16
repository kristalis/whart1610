var useFixedAspectRatio = true;
var widthRatio = 16;
var heightRatio = 9;
// Height * (width ratio / width)
var timeBetweenSlides = 6000; // in microseconds, so 1000 = 1 sec.
var transitionTime = 1000;

var banners = [];
var pointer = 0;
var pmax = 0;
var timer = 0;

if (useFixedAspectRatio) {
	$(function() {
		Start();
	});
} else {
	$(window).load(function() {
		Start();
	});
}

$('#banner-pause').on('click', function() {
	
	if (window.timer.isPaused()) {
		$(this).prop('src', 'img/banner-pause.png');
		window.timer.resume();
	} else {
		$(this).prop('src', 'img/banner-play.png');
		window.timer.pause();
	}
	
});
$('#banner-next').on('click', function() {
	
	BannerNext();
	
});
$('#banner-prev').on('click', function() {
	
	BannerPrevious();
	
});

$(window).resize(function(e) {
    SetHeight();
});

function Start() {
	SetHeight();
	$('.banner-inner').each(function(i, e) {
		banners[pmax++] = $(this);
		if(i > 0) {
			$(this).css('opacity', 0);
		} else {
			$(this).css('z-index', '4');
		}
	});
	window.timer = new Timer(function() {BannerNext()}, timeBetweenSlides);
	$('.banner-hide').delay(400).css('visibility', 'visible');
}

function BannerNext() {
	var pc = pointer++;
	var pn = pointer;
	if(pn == pmax) {
		pn = pointer = 0;
	}
	
	BannerAnimate(pc, pn);
}
function BannerPrevious() {
	var pc = pointer--;
	var pn = pointer;
	if (pn == -1) {
		pn = pointer = pmax - 1;
	}
	
	BannerAnimate(pc, pn);
}
function BannerAnimate(pc, pn) {
	
	$(banners[pc]).css('z-index', 3).animate({opacity: 0}, transitionTime);
	$(banners[pn]).css('z-index', 4).animate({opacity: 1}, transitionTime);
	if ( ! window.timer.isPaused()) {
		window.timer.pause();
		window.timer = new Timer(function() {BannerNext()}, timeBetweenSlides);
	}
	
}

function SetHeight() {
	var h = 0;
	if (useFixedAspectRatio) {
		h = parseFloat($('.banner').outerWidth()) * (heightRatio / widthRatio);
	} else {
		h = $('.banner-inner').first().height();
	}
	$('.banner').height(h);
}

function Timer(callback, delay) {
	
    var timerId, start, remaining = delay, paused = false;

    this.pause = function() {
        window.clearTimeout(timerId);
        remaining -= new Date() - start;
		paused = true;
    };

    this.resume = function() {
        start = new Date();
        window.clearTimeout(timerId);
		paused = false;
        timerId = window.setTimeout(callback, remaining);
    };
	
	this.isPaused = function() {
		return paused;
	}

    this.resume();
}