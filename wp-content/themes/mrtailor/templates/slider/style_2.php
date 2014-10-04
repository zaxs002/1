<?php
	global $slider_metabox;
	$slider_metabox->the_meta();
	
	$slider_parallax = $slider_metabox->get_the_value('slider_parallax');
	
?>

<div class="row">
    <div class="large-12 columns">
    
        <div class="main-slider-boxed">
        
            <div class="main-slider">
                <div class="swiper-container" data-settings="">
                    
                    <div class="swiper-wrapper">
                        
                        <?php
						$slide_counter = 0;
						while($slider_metabox->have_fields('items'))
						{
							$slide_counter++;
						?>
                            
                            <div class="swiper-slide slide_<?php echo $slide_counter; ?>" <?php if ($slider_parallax == 1) { ?>data-stellar-background-ratio="0.5"<?php } ?>>
                                
                                <div class="main-slider-content">
                                    <div class="row">
                                        <div class="large-8 large-centered medium-10 medium-centered columns">
                                            <div class="main-slider-elements">
                                                <?php if ($slider_metabox->get_the_value('title') != "") { ?>
                                                    <h1><?php echo ($slider_metabox->get_the_value('title')) . "<br />"; ?></h1>
                                                <?php } ?>
                                                <?php if ($slider_metabox->get_the_value('description') != "") { ?>
                                                    <h2><?php echo ($slider_metabox->get_the_value('description')) . "<br />"; ?></h2>
                                                <?php } ?>
                                                <?php if ($slider_metabox->get_the_value('button_label') != "") { ?>
                                                    <a class="slider_button" href="<?php echo ($slider_metabox->get_the_value('link')); ?>"><?php echo ($slider_metabox->get_the_value('button_label')); ?></a> 
                                                <?php } ?>
                                            </div><!-- .main-slider-elements -->
                                        </div><!-- .columns -->
                                    </div><!-- .row --> 
                                </div>
                                
                                <a class="arrow-left" href="#"></a>
                                <a class="arrow-right" href="#"></a>		              
                            
                            </div>
                            
                        <?php    
                        }	
                        ?>
                        
                    </div>
                    
                    <div class="pagination"></div>
                    
                </div>
            </div>
        
        </div>
    
    </div><!-- .columns -->
</div><!-- .row -->

<script>
jQuery(document).ready(function($) {
	
	function resize_slider_content() {
		if ($(window).innerWidth() > 1024 ) {
			$('.main-slider .swiper-container .main-slider-content, .main-slider .swiper-container .swiper-wrapper').css('height', $(window).innerHeight() - $('#site-top-bar').innerHeight() - $('.site-header').innerHeight() - $('#wpadminbar').innerHeight());
		}
	}
	
	var slider_2 = $('.main-slider .swiper-container').swiper({
		pagination: '.pagination',
    	paginationClickable: true,
		calculateHeight: true,
		resizeReInit: true,
		resistance: '100%',
		<?php if ($slider_metabox->get_the_value('slider_autoplay') == 1) { ?>
		autoplay: <?php echo $slider_metabox->get_the_value('slider_autoplay_delay') == "" ? 5000 : $slider_metabox->get_the_value('slider_autoplay_delay'); ?>,
		<?php } ?>
		onSwiperCreated : function() {
			resize_slider_content();
			$('.main-slider .swiper-container').css('visibility', 'visible');
			$('.swiper-slide-active .main-slider-elements').addClass('animated');
		},
		onSlideChangeStart : function() {			
			$('.main-slider .arrow-left, .main-slider .arrow-right').addClass('hidden');
			$('.main-slider-elements').removeClass('animated');
		},
		onSlideChangeEnd : function() {			
			$('.main-slider .arrow-left, .main-slider .arrow-right').removeClass('hidden');	
			$('.swiper-slide-active .main-slider-elements').addClass('animated');
		}
	});
	
	$('.arrow-left').on('click', function(e){
		e.preventDefault()
		slider_2.swipePrev()
	});
	
	$('.arrow-right').on('click', function(e){
		e.preventDefault()
		slider_2.swipeNext()
	});
	
	$(window).resize(function(){		
		resize_slider_content();
	});
	
});
</script>