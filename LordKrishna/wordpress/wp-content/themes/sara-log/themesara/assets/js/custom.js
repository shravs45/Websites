
jQuery(document).ready(function($){
	"use strict";
/******************* Home Masonnery Layout ********************/
var $grid = $('.masonry-wrap').masonry({
  		itemSelector: '.masonry', // use a separate class for itemSelector, other than .col-
  		percentPosition: true
	});
	

	// trigger after images loaded
	$grid.imagesLoaded( function() {
	  $grid.masonry();

});




/*==================================
	Home Page Main Slider
	==================================*/

	if($(".owl-carousel.style1").length){
		$(document).ready(function(){
			$(".owl-carousel.style1").owlCarousel({
				autoplay:true,
				items:1,
				loop:true,
				smartSpeed:2000,
				dots:false
			});
		});
	};

/*==================================
	Sidebar Editor Choice Slider
	==================================*/

	if($(".editor-choice .owl-carousel").length){
		$(document).ready(function(){
			$(".editor-choice .owl-carousel").owlCarousel({
				autoplay:true,
				items:1,
				loop:true,
				nav:true,
				smartSpeed:1000,
				dots:false
			});
		});
	};

/*==================================
	Slider Posts
	==================================*/

	if($(".sara-log-slider-posts .owl-carousel").length){
		$(document).ready(function(){
			$(".sara-log-slider-posts .owl-carousel").owlCarousel({
				autoplay:true,
				items:1,
				loop:true,
				nav:true,
				smartSpeed:2000,
				dots:false
			});
		});
	};


/*==================================
	Home Slider Style 2
	==================================*/

	if($(".owl-carousel.style2").length){
		$(document).ready(function(){
			$(".owl-carousel.style2").owlCarousel({
				autoplay:true,
				items:1,
				loop:true,
				smartSpeed:2000,
				dots:false
			});
		});
	};

/*==================================
	Home Slider Style 3
	==================================*/

	if($(".owl-carousel.style3").length){
		$(document).ready(function(){
			$(".owl-carousel.style3").owlCarousel({
				autoplay:true,
				items:1,
				loop:true,
				smartSpeed:2000

			});
		});
	};

/*==================================
	Home Slider Style 4
	==================================*/

	if($(".owl-carousel.style4").length){
		$(document).ready(function(){
			$(".owl-carousel.style4").owlCarousel({
				autoplay:false,
				items:3,
				loop:true,
				smartSpeed:1000,
				dots:false
			});
		});
	};


/*==================================
	Blog Inner Gallery Slider
	==================================*/

	if($(".owl-carousel.blog-inner-gallery").length){
		$(document).ready(function(){
			$(".owl-carousel.blog-inner-gallery").owlCarousel({
				autoplay:false,
				items:4,
				dots:false
			});
		});
	};


/*==================================
	Back To Top
	==================================*/
	$(window).scroll(function() {
		if ($(this).scrollTop()) {
			$('#backTop').fadeIn();
		} else {
			$('#backTop').fadeOut();
		}
	});
	$("#backTop").on("click", function () {
		$("html, body").animate({scrollTop: 0}, 1000);
	});
	

/*==================================
	ThemesMill Image Lightbox
	==================================*/
	$(".blog-inner-gallery .slide").on("click", function(){
		// $(this).children("img").attr();
		$(".sara-log-lightbox").addClass("active");
		var img_source = $(this).attr("data-img");
		$(".sara-log-lightbox img").attr("src", img_source);
	});
	$(".sara-log-lightbox .background").on("click",function(){
		$(".sara-log-lightbox").removeClass("active")
	})


	/*
	  =======================================================================
		  		Map Script Script
	  =======================================================================
	  */
	  // Tab Navigate
	  	$( '#primary-menu li.menu-item-has-children' ).focusin( function() {
        $( this ).addClass( 'locked' );
         }).add( this ).focusout( function() {
            if ( !$( this ).is( ':focus' ) ) {
                $( this ).removeClass( 'locked' );
            }
        });

	  $('.main-navigation').on('keydown', function (e) {
        if ($('.main-navigation').hasClass('toggled')) {
            var focusableEls = $(' .main-navigation .manu-toggler, .main-navigation a[href]:not([disabled])');
            var firstFocusableEl = focusableEls[0];

           // var firstTabbable = tabbable.first();
           // var lastTabbable = tabbable.last();

            var lastFocusableEl = focusableEls[focusableEls.length - 1 ];
             
            var KEYCODE_TAB = 9;
            if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
                if (e.shiftKey) /* shift + tab */ {
                    if (document.activeElement === firstFocusableEl) {
                        lastFocusableEl.focus();
                        e.preventDefault();
                    }
                } else /* tab */ {
                    if (document.activeElement === lastFocusableEl) {
                        firstFocusableEl.focus();
                        e.preventDefault();
                    }
                }
            }
            
        }
    });

	/*
	  =======================================================================
		  		sara-log Modal Popup
	  =======================================================================
	  */

	  $(".subscribe").on("click", function(){
	  	$(".sara-log-modal").addClass("show");
	  	$(".modal-overlay").addClass("show");
	  });
	  $(".modal-overlay").on("click", function(){
	  	$(".sara-log-modal").removeClass("show");
	  	$(this).removeClass("show")
	  });
	  $(".close-modal").on("click", function(){
	  	$(".sara-log-modal").removeClass("show");
	  	$(".modal-overlay").removeClass("show");
	  })

	/*
	  =======================================================================
		  		Map Script Script
	  =======================================================================
	  */
	  if($('#map-canvas').length){
	  	google.maps.event.addDomListener(window, 'load', initialize);
	  }
	  /* ---------------------------------------------------------------------- */
	/*	Google Map Function for Custom Style
	/* ---------------------------------------------------------------------- */
	function initialize() {
		var MY_MAPTYPE_ID = 'custom_style';
		var map;
		var brooklyn = new google.maps.LatLng(40.6743890, -73.9455);
		var featureOpts = [
		{
			stylers: [
			{ hue: '#f9f9f9' },			
			{ visibility: 'simplified' },
			{ gamma: 0.7 },
			{ saturation: -200 },
			{ lightness: 45 },
			{ weight: 0.6 }
			]
		},
		{
			featureType: "road",
			elementType: "geometry",
			stylers: [
			{ lightness: 200 },
			{ visibility: "simplified" }
			]
		},
		{
			elementType: 'labels',
			stylers: [		  
			{ visibility: 'on' }
			]
		},
		{
			featureType: 'water',
			stylers: [
			{ color: '#ffffff' }
			]
		}
		];	
		var mapOptions = {
			zoom: 15,
			scrollwheel: false,
			center: brooklyn,
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
			},
			mapTypeId: MY_MAPTYPE_ID
		};
		map = new google.maps.Map(document.getElementById('map-canvas'),
			mapOptions);
		var styledMapOptions = {
			name: 'Custom Style'
		};
		var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);
		map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
	};

});