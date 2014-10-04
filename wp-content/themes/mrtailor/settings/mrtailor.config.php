<?php
if ( !class_exists( "ReduxFramework" ) ) {
	return;
}

if ( !class_exists( "Mr_Tailor_Theme_Options" ) ) {
	class Mr_Tailor_Theme_Options {
		public function __construct( ) {

			// Your base config file for Redux
			add_action( 'after_setup_theme', array($this, 'loadConfig') );
			
		}

		public function loadConfig() {
		
		$sections = array (
		
		array (
			
			'title' => __('General', 'mr_tailor_settings'),
			'icon' 	=> 'fa fa-dot-circle-o',
			
			'fields' => array (
				
				array (
					'title' => __('Favicon', 'mr_tailor_settings'),
					'subtitle' => __('<em>Upload your custom Favicon image. <br>.ico or .png file required.</em>', 'mr_tailor_settings'),
					'id' => 'favicon',
					'type' => 'media',
					'default' => array (
						'url' => get_template_directory_uri() . '/favicon.ico',
					),
				),
				
				/*array (
					'title' => __('Debug Mode', 'mr_tailor_settings'),
					'subtitle' => __('<em>Enable /Disable debug mode.<em>', 'mr_tailor_settings'),
					'id' => 'debug_mode',
					'on' => __('Enabled', 'mr_tailor_settings'),
					'off' => __('Disabled', 'mr_tailor_settings'),
					'type' => 'switch',
				),*/
				
			),
			
		),
		
		array (
			
			'title' => __('Header', 'mr_tailor_settings'),
			'icon' 	=> 'fa fa-arrow-circle-o-up',
			
			'fields' => array (
				
				array (
					'id' => 'top_bar_info',
					'icon' => true,
					'type' => 'info',
					'raw' => __('<h3 style="margin: 0;">Top Bar</h3>', 'mr_tailor_settings'),
				),
				
				array (
					'title' => __('Top Bar', 'mr_tailor_settings'),
					'subtitle' => __('<em>Enable / Disable the Top Bar.</em>', 'mr_tailor_settings'),
					'id' => 'top_bar_switch',
					'on' => __('Enabled', 'mr_tailor_settings'),
					'off' => __('Disabled', 'mr_tailor_settings'),
					'type' => 'switch',
					'default' => 1,
				),
				
				array (
					'title' => __('Top Bar Background Color', 'mr_tailor_settings'),
					'subtitle' => __('<em>The Top Bar background color.</em>', 'mr_tailor_settings'),
					'id' => 'top_bar_background_color',
					'type' => 'color',
					'default' => '#314381',
					'required' => array (
						0 => 'top_bar_switch',
						1 => '=',
						2 => 1,
					),
				),
				
				array (
					'title' => __('Top Bar Text Color', 'mr_tailor_settings'),
					'subtitle' => __('<em>Specify the Top Bar Typography.</em>', 'mr_tailor_settings'),
					'id' => 'top_bar_typography',
					'type' => 'color',
					'default' => '#fff',
					'transparent' => false,
					'required' => array (
						0 => 'top_bar_switch',
						1 => '=',
						2 => 1,
					),
				),
				
				array (
					'title' => __('Top Bar Text', 'mr_tailor_settings'),
					'subtitle' => __('<em>Type in your Top Bar info here.</em>', 'mr_tailor_settings'),
					'id' => 'top_bar_text',
					'type' => 'text',
					'default' => 'Free Shipping on All Orders Over $75!',
					'required' => array (
						0 => 'top_bar_switch',
						1 => '=',
						2 => 1,
					),
				),
				
				array (
					'id' => 'main_header_info',
					'icon' => true,
					'type' => 'info',
					'raw' => '<h3 style="margin: 0;">Main Header</h3>',
				),
				
				array (
					'title' => __('Sticky Header', 'mr_tailor_settings'),
					'subtitle' => __('<em>Enable / Disable the Sticky Header.</em>', 'mr_tailor_settings'),
					'id' => 'sticky_header',
					'on' => __('Enabled', 'mr_tailor_settings'),
					'off' => __('Disabled', 'mr_tailor_settings'),
					'type' => 'switch',
					'default' => 1,
				),
				
				array (
					'title' => __('Your Logo', 'mr_tailor_settings'),
					'subtitle' => __('<em>Upload your logo image.</em>', 'mr_tailor_settings'),
					'id' => 'site_logo',
					'type' => 'media',
				),
				
				array (
					'title' => __('Your Retina Logo', 'mr_tailor_settings'),
					'subtitle' => __('<em>Upload a higher-resolution image <br />to be used for retina display devices.</em>', 'mr_tailor_settings'),
					'id' => 'site_logo_retina',
					'type' => 'media',
				),
				
				array(
					'title' => __('Logo Height', 'mr_tailor_settings'),
					'subtitle' => __('<em>Drag the slider to set the logo height.</em>', 'mr_tailor_settings'),
					'id' => 'logo_height',
					'type' => 'slider',
					"default" => 60,
					"min" => 0,
					"step" => 1,
					"max" => 300,
					'display_value' => 'text'
				),
				
				array(
					'title' => __('Header Paddings (Top/Bottom)', 'mr_tailor_settings'),
					'subtitle' => __('<em>Drag the slider to set the paddings of the header.</em>', 'mr_tailor_settings'),
					'id' => 'header_paddings',
					'type' => 'slider',
					"default" => 30,
					"min" => 0,
					"step" => 1,
					"max" => 200,
					'display_value' => 'text'
				),
				
				array (
					'title' => __('Main Header Background Color', 'mr_tailor_settings'),
					'subtitle' => __('<em>The Main Header background color.</em>', 'mr_tailor_settings'),
					'id' => 'main_header_background_color',
					'type' => 'color',
					'transparent' => false,
					'default' => '#ffffff',
				),
				
				array (
					'title' => __('Main Header Transparency', 'mr_tailor_settings'),
					'subtitle' => __('<em>Enable / Disable the Main Header Transparency.</em>', 'mr_tailor_settings'),
					'id' => 'main_header_background_transparency',
					'on' => __('Enabled', 'mr_tailor_settings'),
					'off' => __('Disabled', 'mr_tailor_settings'),
					'type' => 'switch',
					'default' => 0,
				),
				
				array (
					'title' => __('Main Header Typography', 'mr_tailor_settings'),
					'subtitle' => __('<em>Specify the Main Header Typography.</em>', 'mr_tailor_settings'),
					'id' => 'main_header_typography',
					'type' => 'typography',
					'google' => false,
					'line-height' => false,
					'preview' => false,
					'subsets' => false,
					'text-align' => false,
					'font-style' => false,
					'font-weight' => false,
					'font-family' => false,
					'default' => array (
						'font-size' => '13px',
						'units' => 'px',
						'color' => '#000000',
					),
				),
				
				array (
					'title' => __('Main Header Wishlist', 'mr_tailor_settings'),
					'subtitle' => __('<em>Enable / Disable the Wishlist in the Header.</em>', 'mr_tailor_settings'),
					'id' => 'main_header_wishlist',
					'on' => __('Enabled', 'mr_tailor_settings'),
					'off' => __('Disabled', 'mr_tailor_settings'),
					'type' => 'switch',
					'default' => 1,
				),
				
				array (
					'title' => __('Main Header Shopping Bag', 'mr_tailor_settings'),
					'subtitle' => __('<em>Enable / Disable the Shopping Bag in the Header.</em>', 'mr_tailor_settings'),
					'id' => 'main_header_shopping_bag',
					'on' => __('Enabled', 'mr_tailor_settings'),
					'off' => __('Disabled', 'mr_tailor_settings'),
					'type' => 'switch',
					'default' => 1,
				),
				
				array (
					'title' => __('Main Header Search bar', 'mr_tailor_settings'),
					'subtitle' => __('<em>Enable / Disable the Search Bar in the Header.</em>', 'mr_tailor_settings'),
					'id' => 'main_header_search_bar',
					'on' => __('Enabled', 'mr_tailor_settings'),
					'off' => __('Disabled', 'mr_tailor_settings'),
					'type' => 'switch',
					'default' => 1,
				),
				
			),
			
		),
		
		array (
			
			'title' => __('Footer', 'mr_tailor_settings'),
			'icon' 	=> 'fa fa-arrow-circle-o-down',
			
			'fields' => array (
				
				array (
					'title' => __('Footer Background Color', 'mr_tailor_settings'),
					'subtitle' => __('<em>The Top Bar background color.</em>', 'mr_tailor_settings'),
					'id' => 'footer_background_color',
					'type' => 'color',
					'default' => '#262628',
				),
				
				array (
					'title' => __('Footer Text', 'mr_tailor_settings'),
					'subtitle' => __('<em>Specify the Footer Text Color.</em>', 'mr_tailor_settings'),
					'id' => 'footer_texts_color',
					'type' => 'color',
					'transparent' => false,
					'default' => '#c9c9c9',
				),
				
				array (
					'title' => __('Footer Links', 'mr_tailor_settings'),
					'subtitle' => __('<em>Specify the Footer Links Color.</em>', 'mr_tailor_settings'),
					'id' => 'footer_links_color',
					'type' => 'color',
					'transparent' => false,
					'default' => '#fff',
				),
				
				array (
					'title' => __('Footer Credit Card Icons', 'mr_tailor_settings'),
					'subtitle' => __('<em>Upload your custom icons sprite.</em>', 'mr_tailor_settings'),
					'id' => 'credit_card_icons',
					'type' => 'media',
					'default' => array (
						'url' => get_template_directory_uri() . '/framework/images/theme_options/icons/payment_cards.png',
					),
				),
				
				array (
					'title' => __('Footer Copyright Text', 'mr_tailor_settings'),
					'subtitle' => __('<em>Enter your copyright information here.</em>', 'mr_tailor_settings'),
					'id' => 'footer_copyright_text',
					'type' => 'text',
					'default' => '&copy; <a href=\'http://www.getbowtied.com/\'>Get Bowtied</a> - Elite ThemeForest Author.',
				),
				
			),
			
		),
		
		array (
			
			'title' => __('Shop', 'mr_tailor_settings'),
			'icon' 	=> 'fa fa-shopping-cart',
			
			'fields' => array (
				
				array (
					'title' => __('Catalog Mode', 'mr_tailor_settings'),
					'subtitle' => __('<em>Enable / Disable the Catalog Mode.</em>', 'mr_tailor_settings'),
					'desc' => __('<em>When enabled, the feature Turns Off the shopping functionality of WooCommerce.</em>', 'mr_tailor_settings'),
					'id' => 'catalog_mode',
					'on' => __('Enabled', 'mr_tailor_settings'),
					'off' => __('Disabled', 'mr_tailor_settings'),
					'type' => 'switch',
				),
				
				array (
					'title' => __('Breadcrumbs', 'mr_tailor_settings'),
					'subtitle' => __('<em>Enable / Disable the Breadcrumbs.</em>', 'mr_tailor_settings'),
					'id' => 'breadcrumbs',
					'on' => __('Enabled', 'mr_tailor_settings'),
					'off' => __('Disabled', 'mr_tailor_settings'),
					'type' => 'switch',
					'default' => 1,
				),
				
				array (
					'title' => __('Number of Products per Column', 'mr_tailor_settings'),
					'subtitle' => __('<em>Drag the slider to set the number of products per column <br />to be listed on the shop page and catalog pages.</em>', 'mr_tailor_settings'),
					'id' => 'products_per_column',
					'min' => '2',
					'step' => '1',
					'max' => '6',
					'type' => 'slider',
					'default' => '4',
				),
				
				array (
					'title' => __('Number of Products per Page', 'mr_tailor_settings'),
					'subtitle' => __('<em>Drag the slider to set the number of products per page <br />to be listed on the shop page and catalog pages.</em>', 'mr_tailor_settings'),
					'id' => 'products_per_page',
					'min' => '1',
					'step' => '1',
					'max' => '48',
					'type' => 'slider',
					'edit' => '1',
					'default' => '12',
				),
				
				array (
					'title' => __('Product Animation', 'mr_tailor_settings'),
					'subtitle' => __('<em>A list of all the product animations.</em>', 'mr_tailor_settings'),
					'id' => 'products_animation',
					'type' => 'select',
					'options' => array (
						'e0' => 'No Animation',
						'e1' => 'Fade',
						'e2' => 'Move Up',
						'e3' => 'Scale Up',
						'e4' => 'Fall Perspective',
						'e5' => 'Fly',
						'e6' => 'Flip',
						'e7' => 'Helix',
						'e8' => 'PopUp',
					),
					'default' => 'e2',
				),
				
			),
			
		),
		
		array (
			
			'title' => __('Blog', 'mr_tailor_settings'),
			'icon' 	=> 'fa fa-list-alt',
			
			'fields' => array (
				array (
					'title' => __('Blog Layout', 'mr_tailor_settings'),
					'subtitle' => __('<em>Select the layout style for the Blog Listing. <br />The second option will enable the Blog Listing Sidebar.</em>', 'mr_tailor_settings'),
					'id' => 'sidebar_blog_listing',
					'type' => 'image_select',
					'options' => array (
						0 => get_template_directory_uri() . '/framework/images/theme_options/icons/blog_no_sidebar.png',
						1 => get_template_directory_uri() . '/framework/images/theme_options/icons/blog_sidebar.png',
					),
					'default' => 0,
					
				),
				
			),
			
		),
		
		array (
			
			'title' => __('Styling', 'mr_tailor_settings'),
			'icon' 	=> 'fa fa-pencil-square-o',
			
			'fields' => array (
				
				array (
					'title' => __('Main Theme Color', 'mr_tailor_settings'),
					'subtitle' => __('<em>The main color of the site.</em>', 'mr_tailor_settings'),
					'id' => 'main_color',
					'type' => 'color',
					'transparent' => false,
					'default' => '#314381',
				),
				
				array (
					'title' => __('Background Color', 'mr_tailor_settings'),
					'subtitle' => __('<em>The main background color of the site.</em>', 'mr_tailor_settings'),
					'id' => 'main_bg_color',
					'type' => 'color',
					'transparent' => false,
					'default' => '#fff',
				),
				
				array (
					'title' => __('Background Image', 'mr_tailor_settings'),
					'subtitle' => __('<em>Upload a background image or specify an image URL.</em>', 'mr_tailor_settings'),
					'id' => 'main_bg_image',
					'type' => 'media',
					'url' => true,
				),
				
			),
			
		),
		
		array (
			
			'title' => __('Typography', 'mr_tailor_settings'),
			'icon' => 'fa fa-font',
			
			'fields' => array (
				
				array (
					'title' => __('Main Font', 'mr_tailor_settings'),
					'subtitle' => __('<em>Pick the Main Font for your site.</em>', 'mr_tailor_settings'),
					'id' => 'main_font',
					'type' => 'typography',
					'line-height' => false,
					'text-align' => false,
					'font-style' => false,
					'font-weight' => false,
					'font-size' => false,
					'color' => false,
					'default' => array (
						'font-family' => 'Raleway',
						'subsets' => '',
					),
				),
				
				array (
					'title' => __('Secondary Font', 'mr_tailor_settings'),
					'subtitle' => __('<em>Pick the Secondary Font for your site.</em>', 'mr_tailor_settings'),
					'id' => 'secondary_font',
					'type' => 'typography',
					'line-height' => false,
					'text-align' => false,
					'font-style' => false,
					'font-weight' => false,
					'font-size' => false,
					'color' => false,
					'default' => array (
						'font-family' => 'Raleway',
						'subsets' => '',
					),
					
				),
				
			),
			
		),
		
		array (
			
			'title' => __('Social Media', 'mr_tailor_settings'),
			'icon' => 'fa fa-share-square-o',
			
			'fields' => array (
				
				array (
					'title' => __('Facebook', 'mr_tailor_settings'),
					'subtitle' => __('<em>Type your Facebook profile URL here.</em>', 'mr_tailor_settings'),
					'id' => 'facebook_link',
					'type' => 'text',
					'default' => 'https://www.facebook.com/GetBowtied',
				),
				
				array (
					'title' => __('Twitter', 'mr_tailor_settings'),
					'subtitle' => __('<em>Type your Twitter profile URL here.</em>', 'mr_tailor_settings'),
					'id' => 'twitter_link',
					'type' => 'text',
					'default' => 'http://twitter.com/GetBowtied',
				),
				
				array (
					'title' => __('Pinterest', 'mr_tailor_settings'),
					'subtitle' => __('<em>Type your Pinterest profile URL here.</em>', 'mr_tailor_settings'),
					'id' => 'pinterest_link',
					'type' => 'text',
					'default' => 'http://www.pinterest.com/',
				),
				
				array (
					'title' => __('LinkedIn', 'mr_tailor_settings'),
					'subtitle' => __('<em>Type your LinkedIn profile URL here.</em>', 'mr_tailor_settings'),
					'id' => 'linkedin_link',
					'type' => 'text',
				),
				
				array (
					'title' => __('Google+', 'mr_tailor_settings'),
					'subtitle' => __('<em>Type your Google+ profile URL here.</em>', 'mr_tailor_settings'),
					'id' => 'googleplus_link',
					'type' => 'text',
				),
				
				array (
					'title' => __('RSS', 'mr_tailor_settings'),
					'subtitle' => __('<em>Type your RSS Feed URL here.</em>', 'mr_tailor_settings'),
					'id' => 'rss_link',
					'type' => 'text',
				),
				
				array (
					'title' => __('Tumblr', 'mr_tailor_settings'),
					'subtitle' => __('<em>Type your Tumblr URL here.</em>', 'mr_tailor_settings'),
					'id' => 'tumblr_link',
					'type' => 'text',
				),
				
				array (
					'title' => __('Instagram', 'mr_tailor_settings'),
					'subtitle' => __('<em>Type your Instagram profile URL here.</em>', 'mr_tailor_settings'),
					'id' => 'instagram_link',
					'type' => 'text',
					'default' => 'http://instagram.com/getbowtied',
				),
				
				array (
					'title' => __('Youtube', 'mr_tailor_settings'),
					'subtitle' => __('<em>Type your Youtube profile URL here.</em>', 'mr_tailor_settings'),
					'id' => 'youtube_link',
					'type' => 'text',
					'default' => 'https://www.youtube.com/channel/UC88KP4HSF-TnVhPCJLe9P-g',
				),
				
				array (
					'title' => __('Vimeo', 'mr_tailor_settings'),
					'subtitle' => __('<em>Type your Vimeo profile URL here.</em>', 'mr_tailor_settings'),
					'id' => 'vimeo_link',
					'type' => 'text',
				),
				
			),
			
		),
		
		array (
			
			'title' => __('Custom Code', 'mr_tailor_settings'),
			'icon' => 'fa fa-code',
			
			'fields' => array (
				
				array (
					'title' => __('Custom CSS', 'mr_tailor_settings'),
					'subtitle' => __('<em>Paste your custom CSS code here.</em>', 'mr_tailor_settings'),
					'id' => 'custom_css',
					'type' => 'ace_editor',
					'mode' => 'css',
				),
				
				array (
					'title' => __('Header JavaScript Code', 'mr_tailor_settings'),
					'subtitle' => __('<em>Paste your custom JS code here. The code will be added to the header of your site.</em>', 'mr_tailor_settings'),
					'id' => 'header_js',
					'type' => 'ace_editor',
					'mode' => 'javascript',
				),
				
				array (
					'title' => __('Footer JavaScript Code', 'mr_tailor_settings'),
					'subtitle' => __('<em>Here is the place to paste your Google Analytics code or any other JS code you might want to add to be loaded in the footer of your website.</em>', 'mr_tailor_settings'),
					'id' => 'footer_js',
					'type' => 'ace_editor',
					'mode' => 'javascript',
				),
				
			),
			
		),
		
		/*array (
			
			'title' => 'Documentation',
			'icon' => 'fa fa-file-text-o',
		
		),*/
		
	);

			// Change your opt_name to match where you want the data saved.
			$args = array(
				"opt_name" => "mr_tailor_theme_options",
				"menu_title" => "Theme Options",
				"page_priority" => 3,
				"google_api_key" => "AIzaSyDGJehqeZnxz4hABrNgi9KrBTG7ev6rIgY",
				"allow_sub_menu" => false,
				"intro_text" => "",
				"footer_credit" => "&nbsp;",
                'page_slug' => 'theme_options',
			);
			
			// Use this section if this is for a theme. Replace with plugin specific data if it is for a plugin.
			$theme = wp_get_theme();
			$args["display_name"] = $theme->get("Name");
			$args["display_version"] = $theme->get("Version");

			$ReduxFramework = new ReduxFramework($sections, $args);
						
		}	
	
	}
	
	new Mr_Tailor_Theme_Options();
	
}



