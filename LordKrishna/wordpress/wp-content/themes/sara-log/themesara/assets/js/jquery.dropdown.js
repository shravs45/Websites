// page init
jQuery(function(){
	initTabNav();
	initNavigation();
});

// navigation init
function initNavigation() {
	jQuery('ul#primary-menu').animDropdown();
	jQuery('ul#primary-menu').animDropdown({
		effect: 'fade',
		delay: 5
	});
}

// "tab" key handling
function initTabNav() {
	jQuery('.main-menu').tabNav({
		items: 'li'
	});
}

/*
 * Accessible TAB navigation
 */
;(function($){
	var isWindowsPhone = /Windows Phone/.test(navigator.userAgent);
	var isTouchDevice = ('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch;

	$.fn.tabNav = function(opt) {
		var options = $.extend({
			hoverClass: 'hover',
			items: 'li',
			opener: '>a',
			delay: 10
		},opt);

		if(isWindowsPhone || isTouchDevice) {
			return this;
		}

		return this.each(function() {
			var nav = $(this), items = nav.find(options.items);

			items.each(function(index, navItem) {
				var item = $(this), navActive, touchNavActive;
				var link = item.find(options.opener), timer;

				link.bind('focus', function() {
					navActive = nav.hasClass('js-nav-active');
					touchNavActive = window.TouchNav && TouchNav.isActiveOn(navItem);
					if(!navActive || touchNavActive) {
						initSimpleNav();
					}
					item.trigger(navActive && touchNavActive ? 'itemhover' : 'mouseenter');
				}).bind('blur', function() {
					item.trigger(navActive && touchNavActive ? 'itemleave' : 'mouseleave');
				});

				var initSimpleNav = function() {
					if(!initSimpleNav.done) {
						initSimpleNav.done = true;
						item.hover(function() {
							clearTimeout(timer);
							timer = setTimeout(function() {
								item.addClass(options.hoverClass);
							}, options.delay);
						}, function() {
							clearTimeout(timer);
							timer = setTimeout(function() {
								item.removeClass(options.hoverClass);
							}, options.delay);
						});
					}
				};
			});
		});
	};
}(jQuery));

/*
 * jQuery Dropdown plugin
 */
;(function($){
	$.fn.animDropdown = function(o){
		// default options
		var options = $.extend({
			hoverClass:'hover',
			dropClass:'drop-active',
			items: 'li',
			drop: '>ul',
			delay: 100,
			animSpeed: 300,
			effect: 'fade'
		},o);

		return this.each(function(){
			// options
			var nav = $(this);
				items = nav.find(options.items);

			items.addClass(options.hoverClass).each(function(){
				var item = $(this), delayTimer;
				var drop = item.find(options.drop);
				item.data('drop', drop);
				if(drop.length) {
					dropdownEffects[options.effect].prepare({item:item,drop:drop});
				}
				
				item.bind('mouseenter', function(){
					hideAllDropdowns(item);
					item.addClass(options.hoverClass);
					clearTimeout(delayTimer);
					delayTimer = setTimeout(function(){
						if(drop.length && item.hasClass(options.hoverClass)) {
							item.addClass(options.dropClass);
							dropdownEffects[options.effect].animate({drop:drop, state:true, speed:options.animSpeed, complete:function(){
								// callback
							}});
						}
					}, options.delay);
					item.data('timer', delayTimer);
				}).bind('mouseleave', function(){
					if(!item.hasClass(options.dropClass)) {
						item.removeClass(options.hoverClass);
					}
					clearTimeout(delayTimer);
					delayTimer = setTimeout(function(){
						if(drop.length && item.hasClass(options.dropClass)) {
							dropdownEffects[options.effect].animate({drop:drop, state:false, speed:options.animSpeed, complete:function(){
								// callback
								item.removeClass(options.hoverClass);
								item.removeClass(options.dropClass);
							}});
						}
					}, options.delay);
					item.data('timer', delayTimer);
				});
			});
			
			// hide dropdowns
			items.removeClass(options.hoverClass);
			if(dropdownEffects[options.effect].postProcess) {
				items.each(function(){
					dropdownEffects[options.effect].postProcess({item: $(this)});
				});
			}
			
			// hide current level dropdowns
			function hideAllDropdowns(except) {
				var siblings = except.siblings();
				siblings.removeClass(options.hoverClass).each(function(){
					var item = $(this);
					clearTimeout(item.data('timer'));
				});
				siblings.filter('.' + options.dropClass).each(function(){
					var item = jQuery(this).removeClass(options.dropClass);
					if(item.data('drop').length) {
						dropdownEffects[options.effect].animate({drop:item.data('drop'), state:false, speed:options.animSpeed});
					}
				});
			}
		});
	}
	
	// dropdown effects
	var dropdownEffects = {
		fade: {
			prepare: function(o) {
				o.drop.css({opacity:0,visibility:'none'}); 
			},
			animate: function(o) {
				o.drop.stop().show().animate({opacity: o.state ? 1 : 0},{duration: o.speed || 0, complete: function(){
					if(o.state) {
						o.drop.css({opacity:''});
					} else {
						o.drop.css({opacity:0,display:'none'});
					}
					if(typeof o.complete === 'function') {
						o.complete.call(o.drop);
					}
				}});
			}
		},
		slide: {
			prepare: function(o) {
				var elementHeight = o.drop.show().outerHeight(true);
				var elementWidth = o.drop.show().outerWidth(true);
				var elementWrap = o.drop.wrap('<div class="drop-slide-wrapper">').parent();
				elementWrap.css({
					height:elementHeight,
					width: elementWidth,
					position:'absolute',
					overflow:'hidden',
					top: o.drop.css('top'),
					left: o.drop.css('left')
				});
				o.drop.css({
					position:'static',
					display:'block',
					top: 'auto',
					left: 'auto'
				});
				o.drop.data('height', elementHeight).data('wrap', elementWrap).css({marginTop: -elementHeight}); 
			},
			animate: function(o) {
				o.drop.data('wrap').show().css({overflow:'hidden'});
				o.drop.stop().animate({marginTop: o.state ? 0 : -o.drop.data('height')},{duration: o.speed || 0, complete: function(){
					if(o.state) {
						o.drop.css({marginTop:''});
						o.drop.data('wrap').css({overflow:''});
					} else {
						o.drop.data('wrap').css({display:'none'});
					}
					if(typeof o.complete === 'function') {
						o.complete.call(o.drop);
					}
				}});
			},
			postProcess: function(o) {
				if(o.item.data('drop').length) {
					o.item.data('drop').data('wrap').css({display:'none'});
				}
			}
		}
	}
}(jQuery));