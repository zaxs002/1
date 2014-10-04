<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

?>

<div class="row">
	<div class="large-8 large-centered columns">
		<div class="my_account_container">	

			<p class="myaccount_user">
				<?php
				printf(
					__( 'Hello %1$s (not %1$s? <a href="%2$s">Sign out</a>).', 'mr_tailor' ) . ' ',
					$current_user->display_name,
					wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) )
				);
			
				printf( __( 'From your account dashboard you can view your recent orders, manage your shipping and billing addresses and <a href="%s">edit your password and account details</a>.', 'mr_tailor' ),
					wc_customer_edit_account_url()
				);
				?>
			</p>

			<?php do_action( 'woocommerce_before_my_account' ); ?>
			
			<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>
			
			<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>
			
			<?php wc_get_template( 'myaccount/my-address.php' ); ?>
			
			<?php do_action( 'woocommerce_after_my_account' ); ?>

		</div><!-- .my_account_container-->
	</div><!-- .large-8-->
</div><!-- .row-->