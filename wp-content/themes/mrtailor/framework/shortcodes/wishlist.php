<?php

function mr_tailor_wishlist( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'per_page' => 10,
		'pagination' => 'no' 
	), $atts );
	
	ob_start();
	
	yith_wcwl_get_template( 'wishlist-widget.php', $atts );
	
	return apply_filters( 'mr_tailor_yith_wcwl_wishlisth_html', ob_get_clean() );
}

add_shortcode("mr_tailor_yith_wcwl_wishlist", "mr_tailor_wishlist");