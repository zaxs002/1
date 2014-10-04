<?php
/**
 * Edit account form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<div class="row">
	<div class="medium-10 medium-centered  large-8 large-centered columns">
		
		<form action="" method="post">
		
			<h3 class="myaccount_form_headers">Edit Account</h3>
		
			<p class="form-row form-row-first">
				<label for="account_first_name"><?php _e( 'First name', 'mr_tailor' ); ?> <span class="required">*</span></label>
				<input type="text" class="input-text" name="account_first_name" id="account_first_name" value="<?php esc_attr_e( $user->first_name ); ?>" />
			</p>
			<p class="form-row form-row-last">
				<label for="account_last_name"><?php _e( 'Last name', 'mr_tailor' ); ?> <span class="required">*</span></label>
				<input type="text" class="input-text" name="account_last_name" id="account_last_name" value="<?php esc_attr_e( $user->last_name ); ?>" />
			</p>
			<p class="form-row form-row-wide">
				<label for="account_email"><?php _e( 'Email address', 'mr_tailor' ); ?> <span class="required">*</span></label>
				<input type="email" class="input-text" name="account_email" id="account_email" value="<?php esc_attr_e( $user->user_email ); ?>" />
			</p>
			<p class="form-row form-row-first">
				<label for="password_1"><?php _e( 'Password', 'mr_tailor' ); ?></label>
				<input type="password" class="input-text" name="password_1" id="password_1" placeholder="<?php _e( 'Leave blank to leave unchanged', 'mr_tailor' ); ?> "/>
			</p>
			<p class="form-row form-row-last">
				<label for="password_2"><?php _e( 'Confirm new password', 'mr_tailor' ); ?></label>
				<input type="password" class="input-text" name="password_2" id="password_2" />
			</p>
			<div class="clear"></div>
		
			<p><input type="submit" class="button account_button" name="save_account_details" value="<?php _e( 'Save changes', 'mr_tailor' ); ?>" /></p>
		
			<?php wp_nonce_field( 'save_account_details' ); ?>
			<input type="hidden" name="action" value="save_account_details" />
		</form>

	</div><!-- .medium-8-->
</div><!-- .row-->