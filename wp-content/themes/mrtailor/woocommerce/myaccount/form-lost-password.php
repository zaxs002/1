<?php
/**
 * Lost password form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $post;
?>

<style>
	#site-top-bar,
	#masthead,
	.entry-title,
	#site-footer
	{
		display: none !important;
	}
	
	.login_header
	{
		display: block;
	}
	
	.st-content,
	.st-container
	{
		height: 100%;
	}
	
	.st-content
	{
		overflow-y: auto;
	}	
</style>

<div class="row">
	<div class="medium-10 medium-centered large-6 large-centered columns">

		<div class="login-register-container">
				
			<div class="row">
				
				<div class="medium-4 columns">
					<div class="account-img-container">
						<img id="lost-password-img" alt="Lost password"  width="132" height="172"  src="<?php echo get_template_directory_uri() . '/images/lost_password.png'; ?>" data-interchange="[<?php echo get_template_directory_uri() . '/images/lost_password.png'; ?>, (default)], [<?php echo get_template_directory_uri() . '/images/lost_password_retina.png'; ?>, (retina)]">
					</div>
				</div>
			
				<div class="medium-8 columns">
					<div class="account-forms-container">
						
						<form method="post" class="lost_reset_password">
						
							<?php if( 'lost_password' == $args['form'] ) : ?>
						
								<p class="lost-reset-pass-text"><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'mr_tailor' ) ); ?></p>
						
								<p class="form-row">
									<!--<label for="user_login"><?php //_e( 'Username or email', 'mr_tailor' ); ?></label>-->
									<input class="input-text" type="text" name="user_login" id="user_login" placeholder="<?php _e( 'Username or email address *', 'mr_tailor' ); ?>" />
								</p>
						
							<?php else : ?>
						
								<p class="lost-reset-pass-text"><?php echo apply_filters( 'woocommerce_reset_password_message', __( 'Enter a new password below.', 'mr_tailor') ); ?></p>
						
								<p class="form-row">
									<!--<label for="password_1"><?php// _e( 'New password', 'mr_tailor' ); ?> <span class="required">*</span></label>-->
									<input type="password" class="input-text" name="password_1" id="password_1" placeholder="<?php _e( 'New password *', 'mr_tailor' ); ?>"/>
								</p>
								<p class="form-row">
									<!--<label for="password_2"><?php //_e( 'Re-enter new password', 'mr_tailor' ); ?> <span class="required">*</span></label>-->
									<input type="password" class="input-text" name="password_2" id="password_2"  placeholder="<?php _e( 'Re-enter new password *', 'mr_tailor' ); ?>"/>
								</p>
						
								<input type="hidden" name="reset_key" value="<?php echo isset( $args['key'] ) ? $args['key'] : ''; ?>" />
								<input type="hidden" name="reset_login" value="<?php echo isset( $args['login'] ) ? $args['login'] : ''; ?>" />
						
							<?php endif; ?>
						
							<div class="clear"></div>
						
							<p class="form-row"><input type="submit" class="button" name="wc_reset_password" value="<?php echo 'lost_password' == $args['form'] ? __( 'Reset Password', 'mr_tailor' ) : __( 'Save', 'mr_tailor' ); ?>" /></p>
							<?php wp_nonce_field( $args['form'] ); ?>
						
						</form>
					</div><!-- .account-forms-container	-->
				</div><!-- .medium-8-->
			</div><!-- .row-->
		</div><!-- .login-register-container-->
	</div><!-- .medium-8 .large-6-->
</div><!-- .row-->
			