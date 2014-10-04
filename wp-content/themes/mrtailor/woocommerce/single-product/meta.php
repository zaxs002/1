<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper">
			<span class="product_meta_title"><?php _e( 'SKU:', 'mr_tailor' ); ?></span>
			<span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'n/a', 'mr_tailor' ); ?></span>
			<span class="product_meta_separator">/</span>
		</span>

	<?php endif; ?>

	<?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( '<span class="product_meta_title">Category:</span>', '<span class="product_meta_title">Categories:</span>', sizeof( get_the_terms( $post->ID, 'product_cat' ) ), 'mr_tailor' ) . ' ', '</span>' ); ?>

	<?php echo $product->get_tags( ', ', '<span class="tagged_as"><span class="product_meta_separator"> / </span>' . _n( '<span class="product_meta_title">Tag:</span>', '<span class="product_meta_title">Tags:</span>', sizeof( get_the_terms( $post->ID, 'product_tag' ) ), 'mr_tailor' ) . ' ', '.</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>