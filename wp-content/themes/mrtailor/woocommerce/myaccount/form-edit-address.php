<?php
/**
 * Edit address form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $current_user;

$page_title = ( $load_address == 'billing' ) ? __( 'Billing Address', 'mr_tailor' ) : __( 'Shipping Address', 'mr_tailor' );

get_currentuserinfo();
?>

<?php if ( ! $load_address ) : ?>

	<?php wc_get_template( 'myaccount/my-address.php' ); ?>

<?php else : ?>

	<div class="row">
		<div class="medium-10 medium-centered  large-8 large-centered columns">
	
		<form method="post">
	
			<h3 class="myaccount_form_headers"><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title ); ?></h3>
	
			<?php foreach ( $address as $key => $field ) : ?>
	
				<?php woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] ); ?>
	
			<?php endforeach; ?>
	
			<p>
				<input type="submit" class="button account_button" name="save_address" value="<?php _e( 'Save Address', 'mr_tailor' ); ?>" />
				<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
				<input type="hidden" name="action" value="edit_address" />
			</p>
	
		</form>
		
		</div><!-- .medium-8-->
	</div><!-- .row-->
	
<?php endif; ?>

