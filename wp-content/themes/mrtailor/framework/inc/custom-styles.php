<?php
if ( !function_exists ('mr_tailor_custom_styles') ) {
function mr_tailor_custom_styles() {	
	global $mr_tailor_theme_options;
	global $slider_metabox;
	$slider_metabox->the_meta();	
	?>

	<!-- ******************************************************************** -->
	<!-- * Theme Options Styles ********************************************* -->
	<!-- ******************************************************************** -->
		
	<style>
		
		/***************************************************************/
		/* Fonts *******************************************************/
		/***************************************************************/
		
		<?php if ( (isset($mr_tailor_theme_options['main_font']['font-family'])) && (trim($mr_tailor_theme_options['main_font']['font-family']) != "" ) ) : ?>			
			body,
			h1, h2, h3, h4, h5, h6,
			.comments-title,
			.comment-author,
			#reply-title,
			.wishlist_items_number,
			.shopping_bag_items_number,
			.copyright_text,
			.order_details li strong,
			.wpcf7 input,
			.mobile-navigation .sub-menu a,
			.cart-subtotal .amount,
			.order-total .amount
			{ 
				font-family: <?php echo $mr_tailor_theme_options['main_font']['font-family'] ?>;
			}
			
			.label,
			.products .button,
			#site-navigation-top-bar ul li a,
			.main-navigation .sub-menu li a,
			.remember-me,
			.woocommerce form .form-row label.inline,
			.woocommerce-page form .form-row label.inline
			{ 
				font-family: <?php echo $mr_tailor_theme_options['main_font']['font-family'] ?> !important;
			}			
		<?php endif; ?>
		
		<?php if ( (isset($mr_tailor_theme_options['secondary_font']['font-family'])) && (trim($mr_tailor_theme_options['secondary_font']['font-family']) != "" ) ) : ?>			
			#site-navigation-top-bar,
			.site-title,
			.widget h3,
			.widget_product_search #searchsubmit,
			.widget_search #searchsubmit,
			.widget_product_search .search-submit,
			.widget_search .search-submit,
			.comment-respond label,
			.button,
			button,
			input[type="button"],
			input[type="reset"],
			input[type="submit"],
			.woocommerce a.button,
			.woocommerce-page a.button,
			.woocommerce button.button,
			.woocommerce-page button.button,
			.woocommerce input.button,
			.woocommerce-page input.button,
			.woocommerce #respond input#submit,
			.woocommerce-page #respond input#submit,
			.woocommerce #content input.button,
			.woocommerce-page #content input.button,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce #respond input#submit.alt,
			.woocommerce #content input.button.alt,
			.woocommerce-page a.button.alt,
			.woocommerce-page button.button.alt,
			.woocommerce-page input.button.alt,
			.woocommerce-page #respond input#submit.alt,
			.woocommerce-page #content input.button.alt,
			blockquote cite,
			.widget .tagcloud a,
			.widget_shopping_cart .total strong,
			table thead th,
			.woocommerce div.product form.cart div.label label,
			.woocommerce-page div.product form.cart div.label label,
			.woocommerce #content div.product form.cart div.label label,
			.woocommerce-page #content div.product form.cart div.label label,
			.woocommerce span.onsale,
			.woocommerce-page span.onsale,
			.recently_viewed_in_single h2,
			.woocommerce .cart-collaterals .cart_totals table th,
			.woocommerce-page .cart-collaterals .cart_totals table th,
			.woocommerce .cart-collaterals .shipping_calculator h2,
			.woocommerce-page .cart-collaterals .shipping_calculator h2,
			.woocommerce form .form-row label,
			.woocommerce-page form .form-row label,
			.qty,
			.main-slider h1,
			.site-tools,
			#site-navigation ul li a,
			#mobile-main-navigation ul li,
			.post-edit-link,
			.slider_button,
			.go_home,
			.filters_button,
			.woocommerce-ordering,
			.out_of_stock_badge_loop,
			.out_of_stock_badge_single,
			.add_to_wishlist,
			.out-of-stock,
			.wishlist-in-stock,
			.wishlist-out-of-stock,
			.cross-sells h2,
			tr.shipping > td:first-of-type,
			.checkout_login .woocommerce-info,
			.checkout_coupon_box .woocommerce-info,
			/*.cart-subtotal > td:first-of-type,
			.order-total > td:first-of-type,*/
			.check_label_radio,
			.order_details .title,
			.order_details li,
			.customer_details dt,
			.account_view_link,
			.order_details_footer tr td:first-of-type,
			.wpcf7,
			.mobile-navigation
			{
				font-family: <?php echo $mr_tailor_theme_options['secondary_font']['font-family'] ?>;
			}
			
			.main-navigation .megamenu-1-col > ul > li > a,
			.main-navigation .megamenu-2-col > ul > li > a,
			.main-navigation .megamenu-3-col > ul > li > a,
			.main-navigation .megamenu-4-col > ul > li > a
			{
				font-family: <?php echo $mr_tailor_theme_options['secondary_font']['font-family'] ?> !important;
			}		
		<?php endif; ?>

		
		/***************************************************************/
		/* Body (.st-content) ******************************************/
		/***************************************************************/
		
		.st-content {
			
			<?php if ( (isset($mr_tailor_theme_options['main_bg_color'])) && (trim($mr_tailor_theme_options['main_bg_color']) != "" ) ) : ?>
				background-color:<?php echo $mr_tailor_theme_options['main_bg_color'] ?>;
			<?php endif; ?>
			
			<?php if ( (isset($mr_tailor_theme_options['main_bg_image']['url'])) && (trim($mr_tailor_theme_options['main_bg_image']['url']) != "" ) ) : ?>
				background-size: cover;
				background-attachment:fixed; /* creates a weird chrome bug - fix with refreshBackgrounds() function */
			<?php endif; ?>
		}
		
		<?php if ( (isset($mr_tailor_theme_options['main_bg_image']['url'])) && (trim($mr_tailor_theme_options['main_bg_image']['url']) != "" ) ) : ?>
		/* min-width 641px, medium screens */
		@media only screen and (min-width: 40.063em) {
			.st-content {
				background-image: url(<?php echo $mr_tailor_theme_options['main_bg_image']['url'] ?>);
			}
		}
		<?php endif; ?>
				
		/***************************************************************/
		/* Main Color  *************************************************/
		/***************************************************************/
		
		<?php if ( (isset($mr_tailor_theme_options['main_color'])) && (trim($mr_tailor_theme_options['main_color']) != "" ) ) : ?>
		
		.widget .tagcloud a:hover,
		.woocommerce span.onsale,
		.woocommerce-page span.onsale,
		.woocommerce nav.woocommerce-pagination ul li span.current, 
		.woocommerce nav.woocommerce-pagination ul li a:hover, 
		.woocommerce nav.woocommerce-pagination ul li a:focus, 
		.woocommerce #content nav.woocommerce-pagination ul li span.current, 
		.woocommerce #content nav.woocommerce-pagination ul li a:hover, 
		.woocommerce #content nav.woocommerce-pagination ul li a:focus, 
		.woocommerce-page nav.woocommerce-pagination ul li span.current, 
		.woocommerce-page nav.woocommerce-pagination ul li a:hover, 
		.woocommerce-page nav.woocommerce-pagination ul li a:focus, 
		.woocommerce-page #content nav.woocommerce-pagination ul li span.current, 
		.woocommerce-page #content nav.woocommerce-pagination ul li a:hover, 
		.woocommerce-page #content nav.woocommerce-pagination ul li a:focus,
		.woocommerce .widget_layered_nav_filters ul li a,
		.woocommerce-page .widget_layered_nav_filters ul li a,
		.woocommerce .widget_layered_nav ul li.chosen a,
		.woocommerce-page .widget_layered_nav ul li.chosen a,
		.nl-field ul,
		.nl-form .nl-submit,
		.audioplayer-bar-played,
		.audioplayer-volume-adjust div div,
		.select2-results .select2-highlighted,
		.slide-from-right,
		.with_thumb_icon,
		/*begin app.css*/
		.woocommerce-page a.button, .woocommerce-page a.button,
		.woocommerce-page a.button.alt,
		.woocommerce-page button.button,
		.woocommerce-page button.button,
		.woocommerce-page button.button.alt,
		.woocommerce-page input.button,
		.woocommerce-page input.button,
		.woocommerce-page #respond input#submit,
		.woocommerce-page #content input.button,
		.woocommerce-page input.button.alt,
		.woocommerce-page #respond input#submit,
		.woocommerce-page #content input.button,
		.woocommerce-page #content input.button,
		.woocommerce-page #content #respond input#submit,
		.woocommerce-page #respond #content input#submit,
		.woocommerce-page #content input.button,
		.woocommerce-page #content input.button.alt,
		.woocommerce-page a.button.alt,
		.woocommerce-page a.alt.button,
		.woocommerce-page button.button.alt,
		.woocommerce-page button.alt.button,
		.woocommerce-page input.button.alt,
		.woocommerce-page input.alt.button,
		.woocommerce-page #respond input.alt#submit,
		.woocommerce-page #content input.alt.button,
		ul.pagination li.current a,
		ul.pagination li.current a:hover, ul.pagination li.current a:focus,
		.progress .meter,
		.sub-nav dt.active a,
		.sub-nav dd.active a,
		.sub-nav li.active a,
		.top-bar-section ul li > a.button, .top-bar-section ul .woocommerce-page li > a.button, .woocommerce-page .top-bar-section ul li > a.button,
		.top-bar-section ul .woocommerce-page li > a.button.alt,
		.woocommerce-page .top-bar-section ul li > a.button.alt,
		.top-bar-section ul li.active > a,
		.no-js .top-bar-section ul li:active > a
		/*end app.css*/
		{
			background: <?php echo $mr_tailor_theme_options['main_color'] ?>;
		}
		
		.site-tools ul li a,
		.product_after_shop_loop .price,
		.woocommerce-ordering:before,
		.select2-container,
		.big-select,
		select.big-select,
		.select2-dropdown-open.select2-drop-above .select2-choice,
		.select2-dropdown-open.select2-drop-above .select2-choices, 
		.select2-container .select2-choice,
		.yith-wcwl-add-button,
		.yith-wcwl-wishlistaddedbrowse .feedback,
		.yith-wcwl-wishlistexistsbrowse .feedback,
		.shopping_bag_items_number,
		.wishlist_items_number,
		.woocommerce .star-rating span:before,
		.woocommerce-page .star-rating span:before,
		/*begin app.css*/
		.woocommerce-page .woocommerce-breadcrumb a,
		.woocommerce-page .woocommerce-breadcrumb a:hover,
		.breadcrumbs > * a,
		.breadcrumbs > * span,
		.panel.callout a,
		.side-nav li a,
		.has-tip:hover, .has-tip:focus,
		a
		/*end app.css*/
		{
			color: <?php echo $mr_tailor_theme_options['main_color'] ?>;
		}
		
		.products a.button,
		.cart-buttons .update_and_checkout .update_cart,
		.cart-buttons .coupon .apply_coupon,
		.widget.widget_price_filter .price_slider_amount .button,
		#wishlist-offcanvas .button,
		#wishlist-offcanvas input[type="button"],
		#wishlist-offcanvas input[type="reset"],
		#wishlist-offcanvas input[type="submit"],
		/*begin app.css*/
		.tooltip.opened
		/*end app.css*/
		{
			color: <?php echo $mr_tailor_theme_options['main_color'] ?> !important;
		}
		
		/*begin app.css*/
		.label,
		button,
		.button,
		.woocommerce-page a.button, .woocommerce-page a.button,
		.woocommerce-page a.button.alt,
		.woocommerce-page .woocommerce a.button,
		.woocommerce .woocommerce-page a.button,
		.woocommerce-page .woocommerce a.button.alt,
		.woocommerce .woocommerce-page a.button.alt,
		.woocommerce-page button.button,
		.woocommerce-page button.button,
		.woocommerce-page button.button.alt,
		.woocommerce-page .woocommerce button.button,
		.woocommerce .woocommerce-page button.button,
		.woocommerce-page .woocommerce button.button.alt,
		.woocommerce .woocommerce-page button.button.alt,
		.woocommerce-page input.button,
		.woocommerce-page input.button,
		.woocommerce-page #respond input#submit,
		.woocommerce-page #content input.button,
		.woocommerce-page input.button.alt,
		.woocommerce-page .woocommerce input.button,
		.woocommerce .woocommerce-page input.button,
		.woocommerce-page .woocommerce #respond input#submit,
		.woocommerce #respond .woocommerce-page input#submit,
		.woocommerce-page .woocommerce #content input.button,
		.woocommerce #content .woocommerce-page input.button,
		.woocommerce-page .woocommerce input.button.alt,
		.woocommerce .woocommerce-page input.button.alt,
		.woocommerce-page #respond input#submit,
		.woocommerce-page #content input.button,
		.woocommerce-page #content input.button,
		.woocommerce-page #content #respond input#submit,
		.woocommerce-page #respond #content input#submit,
		.woocommerce-page #content input.button,
		.woocommerce-page #content input.button.alt,
		.woocommerce-page #content .woocommerce input.button,
		.woocommerce .woocommerce-page #content input.button,
		.woocommerce-page #content .woocommerce #respond input#submit,
		.woocommerce #respond .woocommerce-page #content input#submit,
		.woocommerce-page .woocommerce #content input.button,
		.woocommerce .woocommerce-page #content input.button,
		.woocommerce-page #content .woocommerce input.button.alt,
		.woocommerce .woocommerce-page #content input.button.alt,
		.woocommerce-page a.button.alt,
		.woocommerce-page a.alt.button,
		.woocommerce-page .woocommerce a.alt.button,
		.woocommerce .woocommerce-page a.alt.button,
		.woocommerce-page button.button.alt,
		.woocommerce-page button.alt.button,
		.woocommerce-page .woocommerce button.alt.button,
		.woocommerce .woocommerce-page button.alt.button,
		.woocommerce-page input.button.alt,
		.woocommerce-page input.alt.button,
		.woocommerce-page #respond input.alt#submit,
		.woocommerce-page #content input.alt.button,
		.woocommerce-page .woocommerce input.alt.button,
		.woocommerce .woocommerce-page input.alt.button,
		.woocommerce-page .woocommerce #respond input.alt#submit,
		.woocommerce #respond .woocommerce-page input.alt#submit,
		.woocommerce-page .woocommerce #content input.alt.button,
		.woocommerce #content .woocommerce-page input.alt.button,
		.woocommerce a.button,
		.woocommerce .woocommerce-page a.button,
		.woocommerce-page .woocommerce a.button,
		.woocommerce .woocommerce-page a.button.alt,
		.woocommerce-page .woocommerce a.button.alt,
		.woocommerce a.button,
		.woocommerce a.button.alt,
		.woocommerce button.button,
		.woocommerce .woocommerce-page button.button,
		.woocommerce-page .woocommerce button.button,
		.woocommerce .woocommerce-page button.button.alt,
		.woocommerce-page .woocommerce button.button.alt,
		.woocommerce button.button,
		.woocommerce button.button.alt,
		.woocommerce input.button,
		.woocommerce .woocommerce-page input.button,
		.woocommerce-page .woocommerce input.button,
		.woocommerce .woocommerce-page #respond input#submit,
		.woocommerce-page #respond .woocommerce input#submit,
		.woocommerce .woocommerce-page #content input.button,
		.woocommerce-page #content .woocommerce input.button,
		.woocommerce .woocommerce-page input.button.alt,
		.woocommerce-page .woocommerce input.button.alt,
		.woocommerce input.button,
		.woocommerce #respond input#submit,
		.woocommerce #content input.button,
		.woocommerce input.button.alt,
		.woocommerce #respond input#submit,
		.woocommerce #content input.button,
		.woocommerce #content .woocommerce-page input.button,
		.woocommerce-page .woocommerce #content input.button,
		.woocommerce #content .woocommerce-page #respond input#submit,
		.woocommerce-page #respond .woocommerce #content input#submit,
		.woocommerce .woocommerce-page #content input.button,
		.woocommerce-page .woocommerce #content input.button,
		.woocommerce #content .woocommerce-page input.button.alt,
		.woocommerce-page .woocommerce #content input.button.alt,
		.woocommerce #content input.button,
		.woocommerce #content #respond input#submit,
		.woocommerce #respond #content input#submit,
		.woocommerce #content input.button,
		.woocommerce #content input.button.alt,
		.woocommerce a.button.alt,
		.woocommerce .woocommerce-page a.alt.button,
		.woocommerce-page .woocommerce a.alt.button,
		.woocommerce a.alt.button,
		.woocommerce button.button.alt,
		.woocommerce .woocommerce-page button.alt.button,
		.woocommerce-page .woocommerce button.alt.button,
		.woocommerce button.alt.button,
		.woocommerce input.button.alt,
		.woocommerce .woocommerce-page input.alt.button,
		.woocommerce-page .woocommerce input.alt.button,
		.woocommerce .woocommerce-page #respond input.alt#submit,
		.woocommerce-page #respond .woocommerce input.alt#submit,
		.woocommerce .woocommerce-page #content input.alt.button,
		.woocommerce-page #content .woocommerce input.alt.button,
		.woocommerce input.alt.button,
		.woocommerce #respond input.alt#submit,
		.woocommerce #content input.alt.button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		.alert-box
		/*end app.css*/
		{
			background-color: <?php echo $mr_tailor_theme_options['main_color'] ?>;
		}
		
		.main-navigation ul ul li a:hover
		{
			border-bottom-color: <?php echo $mr_tailor_theme_options['main_color'] ?>;
		}
		
		.login_header
		{
			border-top-color: <?php echo $mr_tailor_theme_options['main_color'] ?>;			
		}
		
		.cart-buttons .update_and_checkout .update_cart,
		.cart-buttons .coupon .apply_coupon,
		.shopping_bag_items_number,
		.wishlist_items_number,
		.widget .tagcloud a:hover,
		.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
		.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle
		{
			border-color: <?php echo $mr_tailor_theme_options['main_color'] ?>;
		}
		
		.cart-buttons .update_and_checkout .update_cart,
		.cart-buttons .coupon .apply_coupon
		{
			border-color: <?php echo $mr_tailor_theme_options['main_color'] ?> !important;
		}
		
		<?php endif; ?>
				
		
		/***************************************************************/
		/* Top Bar *****************************************************/
		/***************************************************************/

		#site-top-bar,
		#site-navigation-top-bar .sf-menu ul
		{
			<?php if ( (isset($mr_tailor_theme_options['top_bar_background_color'])) && (trim($mr_tailor_theme_options['top_bar_background_color']) != "" ) ) : ?>
				background: <?php echo $mr_tailor_theme_options['top_bar_background_color'] ?>;
			<?php endif; ?>
		}
		
		<?php if ( (isset($mr_tailor_theme_options['top_bar_typography'])) && (trim($mr_tailor_theme_options['top_bar_typography']) != "" ) ) : ?>
		#site-top-bar,
		#site-top-bar a
		{
			color:<?php echo $mr_tailor_theme_options['top_bar_typography'] ?>;
		}
		<?php endif; ?>
		
		
		
		/***************************************************************/
		/* 	Header *****************************************************/
		/***************************************************************/
		
		<?php
		
		if ( (isset($mr_tailor_theme_options['site_logo']['url'])) && (trim($mr_tailor_theme_options['site_logo']['url']) != "" ) ) {
			
			if (is_ssl()) {
				$site_logo = str_replace("http://", "https://", $mr_tailor_theme_options['site_logo']['url']);		
			} else {
				$site_logo = $mr_tailor_theme_options['site_logo']['url'];
			}
			
			//$site_logo_size = getimagesize($site_logo);
			//$site_logo_width = $site_logo_size[0];
			//$site_logo_height = $site_logo_size[1];
		?>
		
		.site-branding {
			height:auto;
			border:0;
			padding:0;
		}
		
		<?php if ( (isset($mr_tailor_theme_options['logo_height'])) && (trim($mr_tailor_theme_options['logo_height']) != "" ) ) { ?>
		<?php $site_logo_height = $mr_tailor_theme_options['logo_height']; ?>
		.site-branding img {
			height:<?php echo $site_logo_height; ?>px;
			width:auto;
		}
		<?php } ?>
		
		@media only screen and (min-width: 40.063em) {
			<?php if ( $site_logo_height < 54 ) { ?>
				
				.site-branding
				{
					padding:<?php echo (54-$site_logo_height)/2; ?>px 0;
				}
				
				#site-navigation
				{
					line-height: 54px;
				}
				
			<?php } else { ?>	
				
				#site-navigation {
					line-height:<?php echo $site_logo_height; ?>px;
				}
				
				.site-header-sticky .site-branding
				{
					padding: 7px 0;
				}
				
			<?php } ?>
		}
		
		/*.site-tools {
			top:<?php //echo $site_logo_height / 2 - 20; ?>px;
		}*/

		<?php
		} else {
		?>
		
		@media only screen and (min-width: 64.063em) {
			#site-navigation {
				line-height:66px; /* 66px/2 */
			}
			
			.site-header-sticky .site-branding
			{
				min-height: 40px;
				padding: 5px 25px;
				margin-top: 7px;
			}

			.site-header-sticky .site-title
			{
				font-size: 24px;
			}
			
		}
		
		<?php
		}
		?>

		<?php if ( (isset($mr_tailor_theme_options['header_paddings'])) && (trim($mr_tailor_theme_options['header_paddings']) != "" ) ) { ?>
		.site-header {
			padding:<?php echo $mr_tailor_theme_options['header_paddings']; ?>px 0;
		}
		<?php } ?>
		
		<?php if ( (isset($mr_tailor_theme_options['main_header_typography']['font-size'])) && (trim($mr_tailor_theme_options['main_header_typography']['font-size']) != "" ) ) : ?>
		.site-header,
		.site-header-sticky,
		#site-navigation
		{
			font-size: <?php echo $mr_tailor_theme_options['main_header_typography']['font-size'] ?>;
		}
		<?php endif; ?>
		
		<?php if ( (isset($mr_tailor_theme_options['main_header_background_color'])) && (trim($mr_tailor_theme_options['main_header_background_color']) != "" ) ) : ?>
		.site-header,
		.site-header-sticky,
		.shopping_bag_items_number,
        .wishlist_items_number
		{
			background: <?php echo $mr_tailor_theme_options['main_header_background_color'] ?>;
		}
		<?php endif; ?>
		
		<?php if ( (isset($mr_tailor_theme_options['main_header_background_transparency'])) && ($mr_tailor_theme_options['main_header_background_transparency'] == "1" ) ) : ?>                        
		.site-header
		{
			background: transparent;
		}
		.shopping_bag_items_number,
        .wishlist_items_number
		{
			background: <?php echo $mr_tailor_theme_options['main_bg_color'] ?>;
		}
		.site-header-sticky .shopping_bag_items_number,
        .site-header-sticky .wishlist_items_number
		{
			background: <?php echo $mr_tailor_theme_options['main_header_background_color'] ?>;
		}
		<?php endif; ?>
		
		<?php if ( (isset($mr_tailor_theme_options['main_header_typography']['color'])) && (trim($mr_tailor_theme_options['main_header_typography']['color']) != "" ) ) : ?>
		.site-header,
		#site-navigation a,
		.site-header-sticky,
		.site-header-sticky a,
        .site-tools ul li a,
        .shopping_bag_items_number,
        .wishlist_items_number,
        .site-title a,
        .widget_product_search .search-but-added,
        .widget_search .search-but-added
		{
			color:<?php echo $mr_tailor_theme_options['main_header_typography']['color'] ?>;
		}
        .shopping_bag_items_number,
        .wishlist_items_number,
        .site-branding
        {
            border-color: <?php echo $mr_tailor_theme_options['main_header_typography']['color'] ?>;
        }
		<?php endif; ?>
		
		
		/***************************************************************/
		/* Footer ******************************************************/
		/***************************************************************/

		#site-footer
		{
			<?php if ( (isset($mr_tailor_theme_options['footer_background_color'])) && (trim($mr_tailor_theme_options['footer_background_color']) != "" ) ) : ?>
				background: <?php echo $mr_tailor_theme_options['footer_background_color'] ?>;
			<?php endif; ?>
		}
		
		<?php if ( (isset($mr_tailor_theme_options['footer_texts_color'])) && (trim($mr_tailor_theme_options['footer_texts_color']) != "" ) ) : ?>
		#site-footer,
		#site-footer .widget-title,
		#site-footer a:hover,
        #site-footer .star-rating span:before,
        #site-footer .star-rating span:before
		{
			color:<?php echo $mr_tailor_theme_options['footer_texts_color'] ?>;
		}
		<?php endif; ?>
		
		<?php if ( (isset($mr_tailor_theme_options['footer_links_color'])) && (trim($mr_tailor_theme_options['footer_links_color']) != "" ) ) : ?>
		#site-footer a
		{
			color:<?php echo $mr_tailor_theme_options['footer_links_color'] ?>;
		}
		<?php endif; ?>

		
		/***************************************************************/
		/* Breadcrumbs *************************************************/
		/***************************************************************/
		
		
		<?php if ( (isset($mr_tailor_theme_options['breadcrumbs'])) && ($mr_tailor_theme_options['breadcrumbs']) == "0" ) : ?>
		.woocommerce .woocommerce-breadcrumb,
		.woocommerce-page .woocommerce-breadcrumb
		{
			display:none;
		}
		<?php endif; ?>
		
		
		/***************************************************************/
		/* Slider ******************************************************/
		/***************************************************************/
		
		<?php
		$slide_counter = 0;
		while($slider_metabox->have_fields('items'))
		{
			$slide_counter++;
		?>
			
			.main-slider .slide_<?php echo $slide_counter; ?> {
				background-image:url(<?php echo ($slider_metabox->get_the_value('imgurl')); ?>);
			}
			
			.main-slider .slide_<?php echo $slide_counter; ?> .main-slider-elements.animated {				
				-webkit-animation-name: <?php echo ($slider_metabox->get_the_value('slide_animation')); ?>;
				-moz-animation-name: <?php echo ($slider_metabox->get_the_value('slide_animation')); ?>;
				-o-animation-name: <?php echo ($slider_metabox->get_the_value('slide_animation')); ?>;
				animation-name: <?php echo ($slider_metabox->get_the_value('slide_animation')); ?>;
			}
			
			<?php if ($slider_metabox->get_the_value('slider_mood') == 'light') : ?>

				.main-slider .slide_<?php echo $slide_counter; ?> h1 {
					color:#000;
				}
				
				.main-slider .slide_<?php echo $slide_counter; ?> h1:after {
					background:#000;
				}
				
				.main-slider .slide_<?php echo $slide_counter; ?> h2 {
					color:#000;
				}
				
				.main-slider .slide_<?php echo $slide_counter; ?> a.slider_button {
					color:#fff;
					background:#000;
				}
				
				.main-slider .slide_<?php echo $slide_counter; ?> a.slider_button:hover {
					color:#000 !important;
					background:#fff !important;
				}
				
				.main-slider .slide_<?php echo $slide_counter; ?> .arrow-left,
				.main-slider .slide_<?php echo $slide_counter; ?> .arrow-right
				{
					color:#000;
				}
				
			<?php endif; ?>
			
		<?php    
		}	
		?>
		
		
		/********************************************************************/
		/* Custom CSS *******************************************************/
		/********************************************************************/
		
		<?php if ( (isset($mr_tailor_theme_options['custom_css'])) && (trim($mr_tailor_theme_options['custom_css']) != "" ) ) : ?>
			<?php echo $mr_tailor_theme_options['custom_css'] ?>
		<?php endif; ?>
	
	</style>

<?php
} //function
} //if

add_action( 'wp_head', 'mr_tailor_custom_styles', 100 );