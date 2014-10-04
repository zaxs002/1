<?php
/**
 * Checkout coupon form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

if ( ! WC()->cart->coupons_enabled() )
	return;

$info_message = apply_filters( 'woocommerce_checkout_coupon_message', __( 'Have a coupon?', 'mr_tailor' ) );
$info_message .= ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'mr_tailor' ) . '</a>';
?>

<div class="checkout_coupon_box">
		
	<?php wc_print_notice( $info_message, 'notice' ); ?>

	<div class="row">
		<div class="large-8 large-centered text-center columns">
			
			<form class="checkout_coupon" method="post" style="display:none">
				<p class="form-row form-row-wide">
					<input type="text" name="coupon_code" class="input-text" placeholder="<?php _e( 'Coupon code', 'mr_tailor' ); ?>" id="coupon_code" value="" />
				</p>
			
				<p class="form-row form-row-wide">
					<input type="submit" class="button" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'mr_tailor' ); ?>" />
				</p>
			
				<div class="clear"></div>
			</form>
		</div><!-- .large-8-->
	</div><!-- .row-->
	
</div><!-- .checkout_coupon_box-->