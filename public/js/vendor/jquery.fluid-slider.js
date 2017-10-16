/**
 * jQuery Plugin: Fluid Slider
 *
 * A simple slider designed by Tony Christopher.
 * Copyright Fluid Studios Ltd © 2013
 * tony@fluidstudiosltd.com
 */

(function($){
	$.fn.fluidSlider = function(options) {
		
		var defaults = {
			arrowLeft: 'img/fluid-slider-arrow-left.png',
			arrowRight: 'img/fluid-slider-arrow-right.png',
			linked: true,
			speed: 500
		};
		var options = $.extend(defaults, options);
		
		return this.each(function() {
			slider = $(this);
			var children = options.linked ? $(slider).children('a') : $(slider).children('img');
			var htmlBody = '<div class="fluid-slider-arrow-left"><img src="' + options.arrowLeft + '"></div><div class="fluid-slider-window"><div class="fluid-slider-container">';
			var numImg = $(children).length;
			$(children).each(function(index, element) {
                htmlBody += '<div class="fluid-slider-image">';
				if(options.linked) {
					htmlBody += '<a';
				} else {
					htmlBody += '<img';
				}
				$.each(this.attributes, function() {
					htmlBody += ' ' + this.name + '="' + this.value + '"';
				});
				htmlBody += '>';
				if(options.linked) {
					htmlBody += $(this).html() + '</a>';
				}
				htmlBody += '</div>';
            });
			htmlBody += '</div></div><div class="fluid-slider-arrow-right"><img src="' + options.arrowRight + '"></div>';
			
			$(slider).html(htmlBody);
			var imgBgWidth = $('.fluid-slider-image', slider).width() + ($('.fluid-slider-image', slider).css("padding-left").substr(0,$('.fluid-slider-image', slider).css("padding-left").indexOf('px')) * 2) + ($('.fluid-slider-image', slider).css("margin-left").substr(0,$('.fluid-slider-image', slider).css("margin-left").indexOf('px')) * 2);
			var containerWidth = imgBgWidth * numImg;
			$('.fluid-slider-container', slider).css('width', containerWidth + 'px');
			
			var arrowsEnabled = true;
			var arrowLeft = $('.fluid-slider-arrow-left', slider);
			var arrowRight = $('.fluid-slider-arrow-right', slider);
			var leftMostImg = 1;
			
			var windowWidth = $('.fluid-slider-window', slider).width();
			var visibleImg = Math.floor(windowWidth / imgBgWidth);
			if(visibleImg >= numImg) {
				arrowsEnabled = false;
				$(arrowLeft).children('img').css('visibility', 'hidden');
				$(arrowRight).children('img').css('visibility', 'hidden');
			}
			
			arrowLeft.click(function(e) {
                if(arrowsEnabled) {
					if(leftMostImg <= (numImg - visibleImg)) {
						leftMostImg++;
						$('.fluid-slider-container', slider).animate({'left': '-=' + imgBgWidth + 'px'}, options.speed);
					} else {
						leftMostImg = 1;
						$('.fluid-slider-container', slider).animate({'left': '0px'}, options.speed * (numImg - visibleImg));
					}
				}
            });
			
			arrowRight.click(function(e) {
                if(arrowsEnabled) {
					if(leftMostImg == 1) {
						leftMostImg = (numImg - visibleImg) + 1;
						$('.fluid-slider-container', slider).animate({'left': '-=' + (imgBgWidth * (numImg - visibleImg)) + 'px'}, options.speed * (numImg - visibleImg));
					} else {
						leftMostImg--;
						$('.fluid-slider-container', slider).animate({'left': '+=' + imgBgWidth + 'px'}, options.speed);
					}
				}
            });
		});
	};
})(jQuery);