//jQuery(document).foundation();

jQuery(document).ready(function($) {
	
	"use strict";
	
	//responsive videos
	$(".content-area").fitVids();
	
	//add fresco groups to images galleries
	$(".gallery").each(function() {
		$(this).find('.fresco')
			.attr('data-fresco-group', $(this).attr('id'));
	});
	
	//debug_grid_guide
	$('.debug_grid_guide').css('height', $(window).height());
	$('.debug_grid_guide .columns').css('height', $(window).height());
	$('.debug_grid_guide .columns div').css('height', $(window).height());
	
	$('.debug_grid_guide_toggle').click(function() {
		$('.debug_grid_guide').slideToggle( "slow", function() {
			// Animation complete.
		});
	});
	
	//audioplayer
	//$('audio').audioPlayer();
    
    $('.font-group li').hover(
        function() {
            $(this).addClass("active");
        }, function() {
            $(this).removeClass("active");
        }
    );
	

	
	
	$(window).load(function() {

		
	});
	
	
	$(window).resize(function() {
		
		$('.debug_grid_guide').css('height', $(window).height());
		$('.debug_grid_guide .columns').css('height', $(window).height());
		$('.debug_grid_guide .columns div').css('height', $(window).height());
		
	});


});





