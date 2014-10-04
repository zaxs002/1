<?php
/**
 * Login Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
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
		
		<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

		<div class="login-register-container">
				
			<div class="row">
				
				<div class="medium-4 columns">
					<div class="account-img-container">
						<img id="login-img" alt="My account"  width="164" height="209"  src="<?php echo get_template_directory_uri() . '/images/my_account.png'; ?>" data-interchange="[<?php echo get_template_directory_uri() . '/images/my_account.png'; ?>, (default)], [<?php echo get_template_directory_uri() . '/images/my_account_retina.png'; ?>, (retina)]">
					</div>
				</div>
			
				<div class="medium-8 columns">
					<div class="account-forms-container">
						<ul class="account-tab-list">
							
							<li class="account-tab-item"><a class="account-tab-link current" href="#login"><?php _e( 'Login', 'mr_tailor' ); ?></a></li>
							
							<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
								<li class="account-tab-item last"><a class="account-tab-link" href="#register"><?php _e( 'Register', 'mr_tailor' ); ?></a></li>
							<?php endif; ?>
						
						</ul>
						
						<div class="account-forms">
							<form id="login" method="post" class="login-form">
					
								<?php do_action( 'woocommerce_login_form_start' ); ?>
					
								<p class="form-row form-row-wide">
									<!--<label for="username"><?php // _e( 'Username or email address', 'mr_tailor' ); ?> <span class="required">*</span></label>-->
									<input type="text" class="input-text" name="username" id="username"  placeholder="<?php _e( 'Username or email address *', 'mr_tailor' ); ?>"/>
								</p>
								<p class="form-row form-row-wide">
									<!--<label for="password"><?php //_e( 'Password', 'mr_tailor' ); ?> <span class="required">*</span></label>-->
									<input class="input-text" type="password" name="password" id="password" placeholder="<?php _e( 'Password *', 'mr_tailor' ); ?>" />
								</p>
					
								<?php do_action( 'woocommerce_login_form' ); ?>
					
								<p class="form-row">
									<?php wp_nonce_field( 'woocommerce-login' ); ?>
									
									<input name="rememberme" class="check_box" type="checkbox" id="rememberme" value="forever" /> 
									<label for="rememberme" class="remember-me check_label"><?php _e( 'Remember me', 'mr_tailor' ); ?></label>
									
									<input type="submit" class="button" name="login" value="<?php _e( 'Login', 'mr_tailor' ); ?>" /> 
									
								</p>
								<p class="lost_password">
									<a class="lost-pass-link" href="<?php echo esc_url( wc_lostpassword_url() ); ?>">
										<?php _e( 'Lost your password?', 'mr_tailor' ); ?>
									</a>
								</p>
					
								<?php do_action( 'woocommerce_login_form_end' ); ?>
					
							</form>
							
						<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
								
							<form id="register" method="post" class="register-form">
					
								<?php do_action( 'woocommerce_register_form_start' ); ?>
					
								<?php if ( get_option( 'woocommerce_registration_generate_username' ) === 'no' ) : ?>
					
									<p class="form-row form-row-wide">
										<!--<label for="reg_username"><?php //_e( 'Username', 'mr_tailor' ); ?> <span class="required">*</span></label>-->
										<input type="text" class="input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) esc_attr_e( $_POST['username'] ); ?>" placeholder="<?php _e( 'Username *', 'mr_tailor' ); ?>" />
									</p>
					
								<?php endif; ?>
					
								<p class="form-row form-row-wide">
									<!--<label for="reg_email"><?php //_e( 'Email address', 'mr_tailor' ); ?> <span class="required">*</span></label>-->
									<input type="email" class="input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) esc_attr_e( $_POST['email'] ); ?>" placeholder="<?php _e( 'Email *', 'mr_tailor' ); ?>"/>
								</p>
					
								<p class="form-row form-row-wide">
									<!--<label for="reg_password"><?php _//e( 'Password', 'mr_tailor' ); ?> <span class="required">*</span></label>-->
									<input type="password" class="input-text" name="password" id="reg_password" value="<?php if ( ! empty( $_POST['password'] ) ) esc_attr_e( $_POST['password'] ); ?>" placeholder="<?php _e( 'Password *', 'mr_tailor' ); ?>"/>
								</p>
					
								<!-- Spam Trap -->
								<div style="left:-999em; position:absolute;"><label for="trap"><?php _e( 'Anti-spam', 'mr_tailor' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>
					
								<?php do_action( 'woocommerce_register_form' ); ?>
								<?php do_action( 'register_form' ); ?>
					
								<p class="form-row">
									<?php wp_nonce_field( 'woocommerce-register', 'register' ); ?>
									<input type="submit" class="button" name="register" value="<?php _e( 'Register', 'mr_tailor' ); ?>" />
								</p>
					
								<?php do_action( 'woocommerce_register_form_end' ); ?>
					
							</form><!-- .register-->
					
								
						<?php endif; ?>	
						</div><!-- .account-forms-->
					</div><!-- .account-forms-container-->
				</div><!-- .medium-8-->
			</div><!-- .row-->
		</div><!-- .login-register-container-->
		
		<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

	</div><!-- .large-6-->
</div><!-- .rows-->
