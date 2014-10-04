/*global jQuery:false, mrtailor_ajaxurl:false */

var ua = window.navigator.userAgent;
var msie = ua.indexOf("MSIE ");

jQuery(document).foundation();

jQuery(document).ready(function($) {

	"use strict";
	
	// Off Canvas Navigation
	var offcanvas_open = false;
	var offcanvas_from_left = false;
	var offcanvas_from_right = false;
	var window_width = $(window).innerWidth();
	
	//submenu adjustments
	function submenu_adjustments() {
		$("#site-navigation > ul > .menu-item").mouseenter(function() {		
			if ( $(this).children(".sub-menu").length > 0 ) {
				var submenu = $(this).children(".sub-menu");
				var window_width = parseInt($(window).innerWidth());
				var submenu_width = parseInt(submenu.width());
				var submenu_offset_left = parseInt(submenu.offset().left);
				var submenu_adjust = window_width - submenu_width - submenu_offset_left;
				
				//console.log("window_width: " + window_width);
				//console.log("submenu_width: " + submenu_width);
				//console.log("submenu_offset_left: " + submenu_offset_left);
				//console.log("submenu_adjust: " + submenu_adjust);
				
				if (submenu_adjust < 0) {
					submenu.css("left", submenu_adjust-30 + "px");
				}
			}
		});
	}
	
	submenu_adjustments();
	
	//sticky header
	var headerHeight,minPos;
	function StickyHeaderShowPosition() {
		
		headerHeight = $('.site-header').outerHeight();
		if ( headerHeight*1.3 > 400 ) {
			minPos = headerHeight*1.3;
		}else{
			minPos = 400;
		}
		
	}
	
	if ( ( $(window).outerWidth() > 1024 ) && ( $('.site-header-sticky').size() > 0 ) ) {
		
		StickyHeaderShowPosition()
		
		if ( $(this).scrollTop() > minPos && !$('.site-header-sticky').hasClass('on_page_scroll') ) {
			$('.site-header-sticky').addClass('on_page_refresh');
			if ( $('#wpadminbar').size() > 0 ) {
				$('.site-header-sticky').addClass('wpadminbar_onscreen')
			}
		}
	}
	
	//search	
	function switch_search_buttons() {
		if($(".site-search #s").val() !== "") {
			$(".search-but-added").css("z-index", "1");
			$("#searchsubmit, .search-submit").css("z-index", "2");
		} else {
			$(".search-but-added").css("z-index", "2");
			$("#searchsubmit, .search-submit").css("z-index", "1");
		}
	}
	
	
	function toggle_logo_nav() {
		if ($(window).innerWidth() >= 640) {
			if ($('.site-branding').css('visibility') == 'hidden')
				$('.site-branding, #site-navigation').css('visibility','visible');
			else
				$('.site-branding, #site-navigation').css('visibility','hidden');
		}
	}
	
	function reset_search_toggles() {
		$('.site-search').removeClass("open");
		$('.site-branding, #site-navigation').css('visibility','visible');
	}
	
	$("#searchform div, .site-search div").append( '<div class="search-but-added"><i class="icon-search"></i></div>' );
	
	$(".search-button, .search-but-added").click(function() {

        $(".site-search").toggleClass("open");
		//$(".site-search #s").focus();
		toggle_logo_nav();		
		switch_search_buttons();
		
		$("body").on('click',function(e) {
			if ( $(e.target).attr('class') == 'icon-search' || $(e.target).attr('id') == 's') {
				return;
			} else {
				reset_search_toggles()
				$('body').unbind('click');
			}
		});
	});
	
	$(".site-search #s").keyup(function() {
		switch_search_buttons();
	});
    
    //product animation (thanks Sam Sehnert)
    $.fn.visible = function(partial) {

      var $t            = $(this),
          $w            = $(window),
          viewTop       = $w.scrollTop(),
          viewBottom    = viewTop + $w.height(),
          _top          = $t.offset().top,
          _bottom       = _top + $t.height(),
          compareTop    = partial === true ? _bottom : _top,
          compareBottom = partial === true ? _top : _bottom;

    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

    };

    $(".products li").each(function(i, el) {
        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
			$(el).addClass("shown");
		}            
        else {
			if ($(el).visible(true)) {
				$(el).addClass("shown");
			}
		}
    });
    
    //if is visible on screen add a class
    $(".single_product_summary_related").each(function(i, el) {
        if ($(el).visible(true)) {
            $(el).addClass("on_screen");
        } 
    });
	
	//offcanvas fine tuning
	/*function calculate_viewport_height() {
		var totalHeight = 0;
		$("body").children().filter(':visible').each(function(){
			totalHeight += $(this).outerHeight(true); // true = include margins
		});
		var diff_height = totalHeight - $('#st-container').height();
		
		$('#st-container').css( 'max-height', $(window).height() - diff_height );
	}*/
	
	//refresh wishlist in offcanvas
	function refresh_wishlist_offcanvas() {
		$.post(
			//yith_wcwl_plugin_ajax_web_url,
            mrtailor_ajaxurl,
			{
				'action': 'wishlist_shortcode',
				'data':   ''
			}, 
			function(response){
				$("#wishlist-offcanvas .widget").html(response);
			}
		);
	}
	
	refresh_wishlist_offcanvas();
	
	function offcanvas_left() {
		$(".no-csstransforms3d .st-pusher").removeClass("st-pusher-from-right-zombie-browsers");
		$(".no-csstransforms3d .st-pusher").addClass("st-pusher-from-left-zombie-browsers"); // IE-lte-9
			
		$(".st-container").removeClass("slide-from-right");
		$(".st-container").addClass("slide-from-left");
		$(".st-container").addClass("st-menu-open");
		
		offcanvas_open = true;
		offcanvas_from_left = true;
		
		$(".st-menu").addClass("open");
		$("body").addClass("offcanvas_open offcanvas_from_left");
		
		$(".nano").nanoScroller();
		
		$('.site-header-sticky').addClass('offcanvas-active');
		
		$(".product_navigation").addClass('hidden');
		
		/*setTimeout(function() {	
			$("html").addClass("overflow-y-hidden"); // remove the scrollbar when off-canvas is open
			//$(".st-content").css("overflow-y", "hidden"); // remove the scrollbar when off-canvas is open
		}, 1);*/

	}
	
	function offcanvas_right() {
		$(".no-csstransforms3d .st-pusher").removeClass("st-pusher-from-left-zombie-browsers");
		$(".no-csstransforms3d .st-pusher").addClass("st-pusher-from-right-zombie-browsers"); // IE-lte-9
			
		$(".st-container").removeClass("slide-from-left");
		$(".st-container").addClass("slide-from-right");
		$(".st-container").addClass("st-menu-open");		
		
		offcanvas_open = true;
		offcanvas_from_right = true;
		
		$(".st-menu").addClass("open");
		$("body").addClass("offcanvas_open offcanvas_from_right");

		$(".nano").nanoScroller();
		
		$('.site-header-sticky').addClass('offcanvas-active');
		
		$(".product_navigation").addClass('hidden');
		
		/*setTimeout(function() {	
			$("html").addClass("overflow-y-hidden"); // remove the scrollbar when off-canvas is open
			//$(".st-content").css("overflow-y", "hidden"); // remove the scrollbar when off-canvas is open
		}, 1);*/
	}
	
	function offcanvas_close() {
		if (offcanvas_open === true) {
			
			$(".no-csstransforms3d .st-pusher").removeClass("st-pusher-from-left-zombie-browsers"); // IE-lte-9
			$(".no-csstransforms3d .st-pusher").removeClass("st-pusher-from-right-zombie-browsers"); // IE-lte-9
				
			$(".st-container").removeClass("slide-from-left");
			$(".st-container").removeClass("slide-from-right");
			$(".st-container").removeClass("st-menu-open");
			
			offcanvas_open = false;
			offcanvas_from_left = false;
			offcanvas_from_right = false;
			
			$('#st-container').css('max-height', 'inherit');
			$(".st-menu").removeClass("open");
			$("body").removeClass("offcanvas_open offcanvas_from_left offcanvas_from_right");
			
			/*setTimeout(function() {	
				$("html").removeClass("overflow-y-hidden");;
				//$(".st-content").css("overflow-y", "inherit");
			}, 1);*/
			
			setTimeout(function() {
				$(".slide-from-left").removeClass("filters");
				$('.site-header-sticky').removeClass('offcanvas-active');
			}, 500);
			
			setTimeout(function() {
				$(".product_navigation").removeClass('hidden');
			}, 1000);

			
		}
	}
	
	$(".shopping-bag-button").on('click',function(e) {

		$(".offcanvas-right-content").hide();
		$("#minicart-offcanvas").show();
		offcanvas_right();
		
	});
	
	$(".wishlist-button, .yith-wcwl-wishlistaddedbrowse .feedback, .yith-wcwl-wishlistexistsbrowse .feedback").click(function() {
		
		$(".offcanvas-right-content").hide();	
		refresh_wishlist_offcanvas();	
		$("#wishlist-offcanvas").show();
		
		offcanvas_right();
		
	});
	
	$("#button_offcanvas_sidebar_left").click(function() {
		
		$(".offcanvas-left-content").hide();
		$(".slide-from-left").addClass("filters");
		$("#filters-offcanvas").show();

		offcanvas_left();
		
	});
	
	$(".mobile-menu-button").click(function() {
		
		$(".offcanvas-left-content").hide();
		$("#mobiles-menu-offcanvas").show();
		
		offcanvas_left();
		
	});
	
	$("#st-container").on("click", ".st-pusher-after", function(e) {
		
		offcanvas_close();
		
	});
	
	$(".st-pusher-after").swipe({
		swipeLeft:function(event, direction, distance, duration, fingerCount) {
			offcanvas_close();
		},
		swipeRight:function(event, direction, distance, duration, fingerCount) {
			offcanvas_close();
		},
		tap:function(event, direction, distance, duration, fingerCount) {
			offcanvas_close();
		},
		/*swipeUp:function(event, direction, distance, duration, fingerCount) {
			return false;
		},
		swipeDown:function(event, direction, distance, duration, fingerCount) {
			return false;
		},*/
		threshold:0
	});
	
	//mobile menu	
	$(".mobile-navigation .menu-item-has-children").append('<div class="more"><i class="fa fa-plus"></i></div>');
	
	$(".mobile-navigation").on("click", ".more", function(e) {
		e.stopPropagation();
		$(this).parent().children(".sub-menu").toggleClass("open");
		$(this).html($(this).html() == '<i class="fa fa-plus"></i>' ? '<i class="fa fa-minus"></i>' : '<i class="fa fa-plus"></i>');
		$(".nano").nanoScroller();
	});
	
	$(".mobile-navigation").on("click", "a", function(e) {
		$(".mobile-navigation").find(".sub-menu").removeClass("open");
		offcanvas_close();
	});
	
	$("#related-products-carousel").owlCarousel({
		items:4,
		itemsDesktop : [1200,4],
		itemsDesktopSmall : [1000,3],
		itemsTablet: false,
		itemsMobile : [600,2],
		lazyLoad : true,
		/*autoHeight : true,*/
	});
	
	$("#cross-sell-products-carousel").owlCarousel({
		items:2,
		lazyLoad : true,
		/*autoHeight : true,*/
	});
	
	$("#upsells-products-carousel").owlCarousel({
		items:4,
		itemsDesktop : [1200,4],
		itemsDesktopSmall : [1000,3],
		itemsTablet: false,
		itemsMobile : [600,2],
		lazyLoad : true,
		/*autoHeight : true,*/
	});

	function replace_img_source(selector) {
		var data_src = $(selector).attr('data-src');
		$(selector).one('load', function() {
		}).each(function() {
			$(selector).attr('src', data_src);
			$(selector).css("opacity", "1");
		});
	}
	
	$('#products-grid li img').each(function(){
		replace_img_source(this);
	});
	
	$('.related.products:not(.owl-carousel) li img').each(function(){
		replace_img_source(this);
	});
	
	$('.upsells.products:not(.owl-carousel) li img').each(function(){
		replace_img_source(this);
	});

	
	//wishlist 
	$("body").live('added_to_wishlist',function(e){ //trigger defined in jquery.yith-wcwl.js
		refresh_wishlist_offcanvas();
		var wishlist_items = parseInt($(".wishlist_items_number").html());
		$(".wishlist_items_number").addClass( "animated flipYSmall" );
		$(".wishlist_items_number").html(wishlist_items+1);
		$('.wishlist-button').trigger('click');		
	});
	
	$(".product-remove a").live('click', function() {
		$(".wishlist_items_number").removeClass( "animated flipYSmall" );
		$.ajax({
			success: function() {
				var wishlist_items = parseInt($(".wishlist_items_number").html());
				$(".wishlist_items_number").addClass( "animated flipYSmall" );
				if (wishlist_items > 0) {
					$(".wishlist_items_number").html(wishlist_items-1);
				} else {
					$(".wishlist_items_number").html(0);
				}
				setTimeout(function() {	
					refresh_wishlist_offcanvas();
				}, 2000);
			}
		});
	});

	// Login/register
	var login_container = $('.login-register-container');
	
	login_container.on('click','.account-tab-link',function(){
		
		var that = $(this),
			target = that.attr('href');
		
		that.parent().siblings().find('.account-tab-link').removeClass('current');
		that.addClass('current');
		
		$(target).siblings().stop().fadeOut(function(){
			$(target).fadeIn();	
		});
		
		return false;
	});
    
    // Disable fresco
    function disable_fresco() {
        $(".product_images .fresco").on('click',function() {
			if ($(window).innerWidth() < 640 ) {
                return false;
            }
        });
	}
    
    disable_fresco();
	
	function handleNavigation() {
		
		setTimeout(function() {	
		
			if ($(window).innerWidth() > 1400 ) {
				
				if ($(".single_product_summary_related.on_screen, #site-footer.on_screen")[0]){
					
					$(".product-nav-previous, .product-nav-next").hide();
					
				} else {
					
					$(".product-nav-previous, .product-nav-next").fadeIn(300);
				
				}
			
			} else {
				
				$(".product-nav-previous, .product-nav-next").hide();
				
			}
			
		}, 1);
		
	}
	
	handleNavigation();
	
	function handleSelect() {	
		if ($(window).innerWidth() > 1024 ) {
			
			$(".orderby, .big-select").select2({
				//placeholder: "Select a State",
				allowClear: true,
				minimumResultsForSearch: Infinity
			});
			
			//$(".big-select input").prop("readonly",true);
		}
	}
	
	handleSelect();
	
	// Toggle product navigation based on fresco
    $(".fresco").on("click", function() {
        $(".product-nav-previous").hide();
        $(".product-nav-next").hide();
    });
    
    $(".fr-window").on("click", function() {
        $(".product-nav-previous").show();
        $(".product-nav-next").show();
    });
    
    //category parallax
    function parallax_engine(cat_parallax_pos) {
        if ($(window).innerWidth() > 1200 ) {
            $(".category_header").css('background-position', 'center '+parseInt(-200+cat_parallax_pos/1.5)+'px'); // this 200 value can be found in styles.css also
            $(".entry-header").css('background-position', 'center '+parseInt(-200+cat_parallax_pos/1.5)+'px'); // this 200 value can be found in styles.css also
        } else {
            $(".category_header").css('background-position','center center');
            $(".entry-header").css('background-position','center center');
        }
    }
	
	//vc_row parallax
    /*function parallax_engine_vc_row(vc_row_parallax_pos) {
        if ($(window).innerWidth() > 1200 ) {
			$(".vc_row-fluid.parallax").each(function () {
				this.style.setProperty('background-position', 'center '+parseInt(-200+vc_row_parallax_pos/1.5)+'px', 'important');
			});
        } else {
			$(".vc_row-fluid.parallax").each(function () {
				this.style.setProperty('background-position', 'center center', 'important');
			});
        }
    }*/
    
    parallax_engine($(this).scrollTop());
	
	function refreshBackgrounds(selector) {
		// Chrome shim to fix http://groups.google.com/a/chromium.org/group/chromium-bugs/browse_thread/thread/1b6a86d6d4cb8b04/739e937fa945a921
		// Remove this once Chrome fixes its bug.
		$.browser.chrome = /chrom(e|ium)/.test(navigator.userAgent.toLowerCase());
		if ($.browser.chrome) {
			if ($(selector).css("background-image") != "none") {
				var oldBackgroundImage = $(selector).css("background-image");
				$(selector).css("background-image", oldBackgroundImage);
			}
		}
	}

	refreshBackgrounds(".st-content");
	
	$('.trigger-footer-widget-icon').on('click', function(){
		
		var trigger = $(this).parent();
		
		trigger.fadeOut('1000',function(){
			trigger.remove();
			$('.site-footer-widget-area').fadeIn();
		});
	});
	
	
	//scroll top tour section on next,prev slides
	$('.wpb_next_slide,.wpb_prev_slide').on('click',function(){
		
		var wpb_tour_top = $('.wpb_tour.wpb_content_element').offset().top;
		var window_width = $(window).width();
		
		if ( window_width > 1024 ) {
			$("html, body").animate(
				{ scrollTop: wpb_tour_top - 200 }
			);
		}else if ( window_width < 640 )  {
			$("html, body").animate(
				{ scrollTop: wpb_tour_top - 50 }
			);
		} else {
			$("html, body").animate(
				{ scrollTop: wpb_tour_top - 100 }
			);
		}
	})
	
	
	$(window).load(function(){
		
		$('body').hide().show(); //fix invisible fonts on refresh.

		//product thumbnails swiper	
		var product_thumbnails_swiper = $('.product_thumbnails .swiper-container').swiper({
			slidesPerView: "auto",
			watchActiveIndex: true,
			mousewheelControl: true,
			mode:'vertical',
			onSlideClick : function(swiper) {
				owl.goTo(product_thumbnails_swiper.clickedSlideIndex);
				for (var i = 0; i < product_thumbnails_swiper.slides.length; i++){
					product_thumbnails_swiper.slides[i].style.opacity = 0.2;
				}
				product_thumbnails_swiper.slides[product_thumbnails_swiper.clickedSlideIndex].style.opacity = 1;
				product_thumbnails_swiper.swipeTo(product_thumbnails_swiper.clickedSlideIndex, 300, '');
			}
		});
		
		$(".featured_img_temp").hide();
		
		//owl	
		$("#product-images-carousel").owlCarousel({
			singleItem : true,
			autoHeight : true,
			transitionStyle:"fade",
			lazyLoad : true,
			afterAction : afterAction,
		});
		
		//get carousel instance data and store it in variable owl
		var owl = $("#product-images-carousel").data('owlCarousel');
		
		function afterAction() {
			/*jshint validthis: true */
			if ($(".product_thumbnails").length) {
				
				for (var i = 0; i < product_thumbnails_swiper.slides.length; i++){
					product_thumbnails_swiper.slides[i].style.opacity = 0.2;
				}
				product_thumbnails_swiper.slides[this.owl.currentItem].style.opacity = 1;
				product_thumbnails_swiper.swipeTo(this.owl.currentItem, 300, '');
			}
		}
		
		$(".variations").on('change', 'select', function() {
            owl.goTo(0);
        });

        setTimeout(function() {	
            $(".product_thumbnail.with_second_image .product_thumbnail_background").css("background-size", "cover");
			$(".product_thumbnail.with_second_image").addClass("second_image_loaded");
        }, 300);
		
		// visible products on vc tabs
		$('.ui-tabs-anchor').one('click', function(){
			$(this).parents(".wpb_tour_tabs_wrapper").find(".products li").addClass("animate");
		});
		
		// visible products on vc tour
		$('.wpb_prev_slide a, .wpb_next_slide a, .wpb_tabs_nav a').one('click', function(){
			$(this).parents('.wpb_tour_tabs_wrapper').find(".products li").addClass("animate");
		});
		
        //if not IE add parallax
		//if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {}            
        //else {
			if ($(window).outerWidth() > 1024) {
				$(window).stellar({
					horizontalScrolling: false,
				});
			}
		//}
        
	});
		
	$(window).resize(function(){
		
		$("#site-navigation > ul > .menu-item > .sub-menu").css("left", "-15px");
		
		//offcanvas_close();        
        disable_fresco();
		
		setTimeout(function() {	
			if (window_width != $(window).innerWidth()) { // only horizontal resize (mobiles keyboard triggers window resize)
				reset_search_toggles();
			}
		}, 100);
		
		// disable select2
		//handleSelect();
		
		// hide product navogation
		handleNavigation();
        
        //category parallax
        parallax_engine($(this).scrollTop());
		
		//chrome bg fix
		refreshBackgrounds(".st-content");
        
	});
	

    
    $(window).scroll(function() {
        
		//sticky header
		if (  ( $(window).outerWidth() > 1024 ) && ( $('.site-header-sticky').size() > 0 ) ) {
		
			StickyHeaderShowPosition();
		
			var that = $('.site-header-sticky');
		
			if ( that.hasClass('on_page_refresh') ) {
				that.removeClass('on_page_refresh');
			}
				
			if ( $('#wpadminbar').size() > 0 ) {
				that.addClass('wpadminbar_onscreen')
			}
				
			if ( $(this).scrollTop() > minPos && !that.hasClass('on_page_scroll') ) {
				that.addClass('on_page_scroll');
			} else if ( $(this).scrollTop() <= minPos ) {
				if (that.hasClass('wpadminbar_onscreen')) {
					that.removeClass('on_page_scroll wpadminbar_onscreen');	
				}else{
					that.removeClass('on_page_scroll');
				}
			}
		}
		
        //animate products
        if ($(window).innerWidth() > 640 ) {
			$(".products li").each(function(i, el) {
				if ($(el).visible(true)) {
					$(el).addClass("animate"); 
				} 
			});
		}
        
        //mark this selector as visible
        $(".single_product_summary_related, #site-footer").each(function(i, el) {
            if ($(el).visible(true)) {
                $(el).addClass("on_screen");
				handleNavigation();
            } else {
                $(el).removeClass("on_screen");
				handleNavigation();
            }
        });		
        
        //category parallax
        parallax_engine($(this).scrollTop());
		
		//chrome bg fix
		refreshBackgrounds(".st-content");
        
    });
	 

});