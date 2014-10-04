<?php

class mr_tailor_WC_Widget_Best_Sellers extends WC_Widget_Best_Sellers {
 
	 // copy the widget function from \plugins\woocommerce\classes\widgets\class-wc-widget-best-sellers.php
	
	function widget( $args, $instance ) {
		global $woocommerce;
		
		$cache = wp_cache_get('widget_best_sellers', 'widget');
		
		if ( !is_array($cache) ) $cache = array();
		
		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}
		
		ob_start();
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Best Sellers', 'mr_tailor' ) : $instance['title'], $instance, $this->id_base);
		if ( !$number = (int) $instance['number'] )
			$number = 10;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 15 )
			$number = 15;
		
		$query_args = array(
			'posts_per_page' => $number,
			'post_status' 	 => 'publish',
			'post_type' 	 => 'product',
			'meta_key' 		 => 'total_sales',
			'orderby' 		 => 'meta_value_num',
			'no_found_rows'  => 1,
		);
		
		$query_args['meta_query'] = $woocommerce->query->get_meta_query();
		
		if ( isset( $instance['hide_free'] ) && 1 == $instance['hide_free'] ) {
			$query_args['meta_query'][] = array(
				'key'     => '_price',
				'value'   => 0,
				'compare' => '>',
				'type'    => 'DECIMAL',
			);
		}
		
		$r = new WP_Query($query_args);
		
		if ( $r->have_posts() ) {
		
			echo $before_widget;
		
			if ( $title )
				echo $before_title . $title . $after_title;
		
			echo '<ul class="product_list_widget">';
		
			while ( $r->have_posts()) {
				$r->the_post();
				global $product;
		
				echo '<li>
					<a href="' . get_permalink() . '">
						' . ( has_post_thumbnail() ? get_the_post_thumbnail( $r->post->ID, 'shop_thumbnail' ) : woocommerce_placeholder_img( 'shop_thumbnail' ) ) . ' ' . get_the_title() . '
					</a> ' . $product->get_price_html() . '
				</li>';
			}
		
			echo '</ul>';
		
			echo $after_widget;
		}
		
		wp_reset_postdata();
		
		$content = ob_get_clean();
		
		if ( isset( $args['widget_id'] ) ) $cache[$args['widget_id']] = $content;
		
		echo $content;
		
		wp_cache_set('widget_best_sellers', $cache, 'widget');
	}
 
}

?>