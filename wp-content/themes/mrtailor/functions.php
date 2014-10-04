<?php
/******************************************************************************/
/***************************** Theme Options *********************************/
/******************************************************************************/

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/settings/redux/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/settings/redux/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/settings/mrtailor.config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/settings/mrtailor.config.php' );
}

/******************************************************************************/
/******************************** Includes ************************************/
/******************************************************************************/

include_once('framework/inc/custom-fonts.php'); // Load Custom Fonts
include_once('framework/inc/custom-styles.php'); // Load Custom Styles
include_once('framework/templates/post-meta.php'); // Load Post meta template
include_once('framework/templates/template-tags.php'); // Load Template Tags

//Include metaboxes
define('_TEMPLATEURL', WP_CONTENT_URL . '/themes/' . basename(TEMPLATEPATH));

include_once 'framework/inc/wpalchemy/MetaBox-mod.php';
include_once 'framework/inc/wpalchemy/MediaAccess-mod.php';

add_action( 'init', 'mr_tailor_metabox_styles' ); 
function mr_tailor_metabox_styles()
{
    if ( is_admin() ) 
    { 
        wp_enqueue_style( 'wpalchemy-metabox', _TEMPLATEURL . '/framework/css/wp-admin-metabox.css' );
    }
}

$wpalchemy_media_access = new WPAlchemy_MediaAccess();

//Include metaboxes
include_once 'framework/metaboxes/slider-spec.php';
include_once 'framework/metaboxes/map-spec.php';

//Include shortcodes
include_once('framework/shortcodes/wishlist.php');
include_once('framework/shortcodes/product-categories.php');
include_once('framework/shortcodes/socials.php');
include_once('framework/shortcodes/from-the-blog.php');
include_once('framework/shortcodes/separator.php');
include_once('framework/shortcodes/spacing.php');

/******************************************************************************/
/************************ Plugin recommendations ******************************/
/******************************************************************************/

require_once dirname( __FILE__ ) . '/framework/inc/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'mr_tailor_theme_register_required_plugins' );

function mr_tailor_theme_register_required_plugins() {
	
	$plugins = array(

		//delivered with the theme
		
		array(
			'name'     				=> 'WooCommerce', // The plugin name
			'slug'     				=> 'woocommerce', // The plugin slug (typically the folder name)
			'source'   				=> 'http://downloads.wordpress.org/plugin/woocommerce.2.1.10.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '2.1.10', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'WooCommerce Header Category Image', // The plugin name
			'slug'     				=> 'woocommerce-header-category-image', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/inc/plugins/woocommerce-header-category-image.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Envato Toolkit', // The plugin name
			'slug'     				=> 'envato-wordpress-toolkit-master', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/inc/plugins/envato-wordpress-toolkit-master.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.6.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
            'name'					=> 'Visual Composer', // The plugin name
            'slug'					=> 'js_composer', // The plugin slug (typically the folder name)
            'source'				=> get_stylesheet_directory() . '/inc/plugins/js_composer.zip', // The plugin source
            'required'				=> true, // If false, the plugin is only 'recommended' instead of required
            'version'				=> '4.2.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'			=> '', // If set, overrides default API URL and points to an external URL
        ),
		
		//from WP repository
		
		array(
			'name' 		=> 'Contact Form 7',
			'slug' 		=> 'contact-form-7',
			'required' 	=> false,
			'version' 	=> '3.8.1',
		),
		
		array(
			'name' 		=> 'WP Retina 2x',
			'slug' 		=> 'wp-retina-2x',
			'required' 	=> false,
			'version' 	=> '1.9.4',
		),

	);

	$theme_text_domain = 'mr_tailor';

	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}




/******************************************************************************/
/*************************** Visual Composer **********************************/
/******************************************************************************/

if (class_exists('WPBakeryVisualComposerAbstract')) {
	if(function_exists('vc_set_as_theme')) vc_set_as_theme($notifier = false);	
	vc_disable_frontend();
	
	// Modify and remove existing shortcodes from VC
	include_once('framework/shortcodes/visual-composer/custom_vc.php');
	
	// VC Templates
	$vc_templates_dir = get_template_directory() . '/framework/shortcodes/visual-composer/vc_templates/';
	vc_set_template_dir($vc_templates_dir);
	
	// Add new shortcodes to VC
	include_once('framework/shortcodes/visual-composer/from-the-blog.php');
	include_once('framework/shortcodes/visual-composer/social-media-profiles.php');
	
	// Add new Shop shortcodes to VC
	if (class_exists('WooCommerce')) {
		include_once('framework/shortcodes/visual-composer/wc-recent-products.php');
		include_once('framework/shortcodes/visual-composer/wc-featured-products.php');
		include_once('framework/shortcodes/visual-composer/wc-products-by-category.php');
		include_once('framework/shortcodes/visual-composer/wc-products-by-attribute.php');
		include_once('framework/shortcodes/visual-composer/wc-product-by-id-sku.php');
		include_once('framework/shortcodes/visual-composer/wc-products-by-ids-skus.php');
		include_once('framework/shortcodes/visual-composer/wc-sale-products.php');
		include_once('framework/shortcodes/visual-composer/wc-top-rated-products.php');
		include_once('framework/shortcodes/visual-composer/wc-best-selling-products.php');
		include_once('framework/shortcodes/visual-composer/wc-add-to-cart-button.php');
		include_once('framework/shortcodes/visual-composer/wc-product-categories.php');
		include_once('framework/shortcodes/visual-composer/wc-product-categories-grid.php');
	}
	
	// Add new Options
	function add_vc_text_separator_no_border() {
		$param = WPBMap::getParam('vc_text_separator', 'style');
		$param['value'][__('No Border', 'js_composer')] = 'no_border';
		WPBMap::mutateParam('vc_text_separator', $param);
	}
	add_action('init', 'add_vc_text_separator_no_border');
	
	// Remove vc_teaser
	if (is_admin()) :
		function remove_vc_teaser() {
			remove_meta_box('vc_teaser', '' , 'side');
		}
		add_action( 'admin_head', 'remove_vc_teaser' );
	endif;

}


/******************************************************************************/
/****************************** Ajax url **************************************/
/******************************************************************************/

add_action('wp_head','mrtailor_ajaxurl');
function mrtailor_ajaxurl() {
?>
    <script type="text/javascript">
        var mrtailor_ajaxurl = '<?php echo admin_url('admin-ajax.php', 'relative'); ?>';
    </script>
<?php
}

/******************************************************************************/
/************************ Ajax calls ******************************************/
/******************************************************************************/

//ajax on shopping bag items number
if (class_exists('WooCommerce')) {
	function refresh_shopping_bag_items_number() {
		global $woocommerce;
		echo $woocommerce->cart->cart_contents_count;
		die();
	}
	add_action( 'wp_ajax_refresh_shopping_bag_items_number', 'refresh_shopping_bag_items_number' );
	add_action( 'wp_ajax_nopriv_refresh_shopping_bag_items_number', 'refresh_shopping_bag_items_number' );
}

//ajax on wishlist items number
if (class_exists('YITH_WCWL')) {
	function refresh_wishlist_items_number() {
		global $yith_wcwl;
		echo yith_wcwl_count_products();
		die();
	}
	add_action( 'wp_ajax_refresh_wishlist_items_number', 'refresh_wishlist_items_number' );
	add_action( 'wp_ajax_nopriv_refresh_wishlist_items_number', 'refresh_wishlist_items_number' );
}



/******************************************************************************/
/*********************** mr_tailor setup **************************************/
/******************************************************************************/


if ( ! function_exists( 'mr_tailor_setup' ) ) :
function mr_tailor_setup() {
	
	global $mr_tailor_theme_options;
	
	/** Theme support **/
	add_theme_support( 'menus' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio' ) );
	add_theme_support( 'woocommerce');
	function custom_header_custom_bg() {
		add_theme_support( 'custom-header' );
		add_theme_support( 'custom-background' );
	}
	
	/** Add Image Sizes **/
	$shop_catalog_image_size = get_option( 'shop_catalog_image_size' );
	$shop_single_image_size = get_option( 'shop_single_image_size' );
	add_image_size('product_small_thumbnail', (int)$shop_catalog_image_size['width']/3, (int)$shop_catalog_image_size['height']/3, $shop_catalog_image_size['crop']); // made from shop_catalog_image_size
	add_image_size('shop_single_small_thumbnail', (int)$shop_single_image_size['width']/3, (int)$shop_single_image_size['height']/3, $shop_single_image_size['crop']); // made from shop_single_image_size

	//add_image_size('default_gallery_img', 300, 300, true);
	//add_image_size('product_small_thumbnail', 100, 100, true);
	
	/** Register menus **/ 
	register_nav_menus( array(
		'top-bar-navigation' => __( 'Top Bar Navigation', 'mr_tailor' ),
		'main-navigation' => __( 'Main Navigation', 'mr_tailor' ),
	) );

	/** Theme textdomain **/
	load_theme_textdomain( 'mr_tailor', get_template_directory() . '/languages' );
	
	/** WooCommerce Number of products displayed per page **/
	if ( (isset($mr_tailor_theme_options['products_per_page'])) ) {
		add_filter( 'loop_shop_per_page', create_function( '$cols', 'return ' . $mr_tailor_theme_options['products_per_page'] . ';' ), 20 );
	}

}
endif; // mr_tailor_setup
add_action( 'after_setup_theme', 'mr_tailor_setup' );




/******************************************************************************/
/*********************** Enable excerpts **************************************/
/******************************************************************************/

add_action('init', 'mr_tailor_post_type_support');
function mr_tailor_post_type_support() {
	add_post_type_support( 'page', 'excerpt' );
}






/******************************************************************************/
/**************************** Enqueue styles **********************************/
/******************************************************************************/

// frontend
function mr_tailor_styles() {
	
	global $mr_tailor_theme_options;
	
	wp_enqueue_style('mr_tailor-default-style', get_stylesheet_uri());
	
	wp_enqueue_style('mr_tailor-framework-styles', get_template_directory_uri() . '/framework/css/defaults.css', array(), '1.0', 'all' );
	wp_enqueue_style('mr_tailor-styles', get_template_directory_uri() . '/css/styles.css', array(), '1.0', 'all' );
	wp_enqueue_style('mr_tailor-responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0', 'all' );
	//wp_enqueue_style('mr_tailor-mediaelementplayer', get_template_directory_uri() . '/framework/css/mediaelementplayer.css', array('mediaelement', 'wp-mediaelement'), '1.0', 'all' );
	if ( (isset($mr_tailor_theme_options['debug_mode'])) && ($mr_tailor_theme_options['debug_mode'] == "1" ) ) {
		wp_enqueue_style('mr_tailor-debug', get_template_directory_uri() . '/framework/css/debug.css', array(), '1.0', 'all' );
	}
	
	if (file_exists(dirname( __FILE__ ) . '/_theme-explorer/css/theme-explorer.css')) {
		wp_enqueue_style('mr_tailor-theme-explorer', get_template_directory_uri() . '/_theme-explorer/css/theme-explorer.css', array(), '1.0', 'all' );
	}

}
add_action( 'wp_enqueue_scripts', 'mr_tailor_styles', 99 );


// admin area
function mr_tailor_admin_styles() {
    if ( is_admin() ) {
        
		wp_enqueue_style("mr_tailor_admin_styles", get_template_directory_uri() . "/framework/css/wp-admin-custom.css", false, "1.0", "all");
		
		if (class_exists('WPBakeryVisualComposerAbstract')) { 
			wp_enqueue_style('mr_tailor_visual_composer', get_template_directory_uri() .'/framework/css/visual-composer.css', false, "1.0", 'all');
		}
    }
}
add_action( 'admin_enqueue_scripts', 'mr_tailor_admin_styles' );





/******************************************************************************/
/*************************** Enqueue scripts **********************************/
/******************************************************************************/

// frontend
function mr_tailor_scripts() {
	
	/** In Header **/
	wp_enqueue_script('mr_tailor-modernizr', get_template_directory_uri() . '/framework/js/modernizr.custom.js', '', '2.6.3', FALSE);
	
	/** In Footer **/
	wp_enqueue_script('mr_tailor-foundation', get_template_directory_uri() . '/framework/js/foundation.min.js', array('jquery'), '5.2.0', TRUE);
	wp_enqueue_script('mr_tailor-foundation-interchange', get_template_directory_uri() . '/framework/js/foundation.interchange.js', array('jquery'), '5.2.0', TRUE);
	wp_enqueue_script('mr_tailor-touchswipe', get_template_directory_uri() . '/framework/js/jquery.touchSwipe.min.js', array('jquery'), '1.6.5', TRUE);
	wp_enqueue_script('mr_tailor-fitvids', get_template_directory_uri() . '/framework/js/jquery.fitvids.js', array('jquery'), '1.0.3', TRUE);
	wp_enqueue_script('mr_tailor-idangerous-swiper', get_template_directory_uri() . '/framework/js/idangerous.swiper.min.js', array('jquery'), '2.5.1', TRUE);
	wp_enqueue_script('mr_tailor-owl', get_template_directory_uri() . '/framework/js/owl.carousel.min.js', array('jquery'), '1.3.1', TRUE);
	wp_enqueue_script('mr_tailor-fresco', get_template_directory_uri() . '/framework/js/fresco.js', array('jquery'), '1.3.0', TRUE);
	wp_enqueue_script('mr_tailor-audioplayer', get_template_directory_uri() . '/framework/js/audioplayer.min.js', array('jquery'), NULL, TRUE);
	wp_enqueue_script('mr_tailor-nanoscroller', get_template_directory_uri() . '/framework/js/jquery.nanoscroller.min.js', array('jquery'), '0.7.6', TRUE);
	wp_enqueue_script('mr_tailor-framework-scripts', get_template_directory_uri() . '/framework/js/scripts.js', array('jquery'), '1.0', TRUE);
	wp_enqueue_script('mr_tailor-select2', get_template_directory_uri() . '/framework/js/select2.js', array('jquery'), '3.4.5', TRUE);
	wp_enqueue_script('mr_tailor-scroll_to', get_template_directory_uri() . '/framework/js/jquery.scroll_to.js', array('jquery'), '1.4.5', TRUE);
	wp_enqueue_script('mr_tailor-stellar', get_template_directory_uri() . '/framework/js/jquery.stellar.min.js', array('jquery'), '0.6.2', TRUE);
	wp_enqueue_script('mr_tailor-snapscroll', get_template_directory_uri() . '/framework/js/jquery.snapscroll.min.js', array('jquery'), '1.6.1', TRUE);
	wp_enqueue_script('mr_tailor-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0', TRUE);
	
	if (file_exists(dirname( __FILE__ ) . '/_theme-explorer/js/theme-explorer.js')) {
		wp_enqueue_script('mr_tailor-theme-explorer', get_template_directory_uri() . '/_theme-explorer/js/theme-explorer.js', array('jquery'), '1.0.0', TRUE);
	}
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'mr_tailor_scripts', 99 );






/*********************************************************************************************/
/******************************** Fix empty title on homepage  *******************************/
/*********************************************************************************************/

add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
	if( empty( $title ) && ( is_home() || is_front_page() ) ) {
		return __( 'Home', 'mr_tailor' ) . ' | ' . get_bloginfo( 'description' );
	}
	return $title;
}





/******************************************************************************/
/****** Register widgetized area and update sidebar with default widgets ******/
/******************************************************************************/

function mr_tailor_widgets_init() {
	
	$sidebars_widgets = wp_get_sidebars_widgets();	
	$footer_area_widgets_counter = "0";	
	if (isset($sidebars_widgets['footer-widget-area'])) $footer_area_widgets_counter  = count($sidebars_widgets['footer-widget-area']);
	
	switch ($footer_area_widgets_counter) {
		case 0:
			$footer_area_widgets_columns ='large-12';
			break;
		case 1:
			$footer_area_widgets_columns ='large-12 medium-12 small-12';
			break;
		case 2:
			$footer_area_widgets_columns ='large-6 medium-6 small-12';
			break;
		case 3:
			$footer_area_widgets_columns ='large-4 medium-6 small-12';
			break;
		case 4:
			$footer_area_widgets_columns ='large-3 medium-6 small-12';
			break;
		case 5:
			$footer_area_widgets_columns ='footer-5-columns large-2 medium-6 small-12';
			break;
		case 6:
			$footer_area_widgets_columns ='large-2 medium-6 small-12';
			break;
		default:
			$footer_area_widgets_columns ='large-2 medium-6 small-12';
	}
	
	//default sidebar
	register_sidebar(array(
		'name'          => __( 'Sidebar', 'mr_tailor' ),
		'id'            => 'default-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	
	//footer widget area
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'mr_tailor' ),
		'id'            => 'footer-widget-area',
		'before_widget' => '<div class="' . $footer_area_widgets_columns . ' columns"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	//catalog widget area
	register_sidebar( array(
		'name'          => __( 'Shop Sidebar (Off-Canvas)', 'mr_tailor' ),
		'id'            => 'catalog-widget-area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'mr_tailor_widgets_init' );






/******************************************************************************/
/****** Add Fresco to Galleries ***********************************************/
/******************************************************************************/

add_filter( 'wp_get_attachment_link', 'sant_prettyadd', 10, 6);
function sant_prettyadd ($content, $id, $size, $permalink, $icon, $text) {
    if ($permalink) {
    	return $content;    
    }
    $content = preg_replace("/<a/","<a class=\"fresco\" data-fresco-group=\"\"", $content, 1);
    return $content;
}




//Adds gallery shortcode defaults of size="medium" and columns="2"
/*
function custom_gallery_atts( $out, $pairs, $atts ) {
   
    $atts = shortcode_atts( array(
        'size' => 'default_gallery_img',
    ), $atts );

    $out['size'] = $atts['size'];

    return $out;

}
add_filter( 'shortcode_atts_gallery', 'custom_gallery_atts', 10, 3 );
*/



/******************************************************************************/
/****** Add Font Awesome to Redux *********************************************/
/******************************************************************************/

function newIconFont() {

    wp_register_style(
        'redux-font-awesome',
        '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css',
        array(),
        time(),
        'all'
    );  
    wp_enqueue_style( 'redux-font-awesome' );
}
// This example assumes the opt_name is set to mr_tailor_theme_options.
add_action( 'redux/page/mr_tailor_theme_options/enqueue', 'newIconFont' );





/******************************************************************************/
/* WooCommerce Update Number of Items in the cart *****************************/
/******************************************************************************/

add_action('woocommerce_ajax_added_to_cart', 'mr_tailor_ajax_added_to_cart');
function mr_tailor_ajax_added_to_cart() {

	add_filter('add_to_cart_fragments', 'mr_tailor_shopping_bag_items_number');
	function mr_tailor_shopping_bag_items_number( $fragments ) 
	{
		global $woocommerce;
		ob_start(); ?>

		<script>
		(function($){
			$('.shopping-bag-button').trigger('click');
		})(jQuery);
		</script>
        
        <span class="shopping_bag_items_number animated flipYSmall"><?php echo $woocommerce->cart->cart_contents_count; ?></span>

		<?php
		$fragments['.shopping_bag_items_number'] = ob_get_clean();
		return $fragments;
	}

}



/******************************************************************************/
/* WooCommerce Number of Related Products *************************************/
/******************************************************************************/

function woocommerce_output_related_products() {
	$atts = array(
		'posts_per_page' => '12',
		'orderby'        => 'rand'
	);
	woocommerce_related_products($atts);
}



/******************************************************************************/
/* WooCommerce Add data-src & lazyOwl to Thumbnails ***************************/
/******************************************************************************/
function woocommerce_get_product_thumbnail( $size = 'product_small_thumbnail', $placeholder_width = 0, $placeholder_height = 0  ) {
	global $post;

	if ( has_post_thumbnail() ) {
		$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'shop_catalog' );
		return get_the_post_thumbnail( $post->ID, $size, array('data-src' => $image_src[0], 'class' => 'lazyOwl') );
	} elseif ( wc_placeholder_img_src() ) {
		return wc_placeholder_img( $size );
	}
}

function woocommerce_subcategory_thumbnail( $category ) {
	$small_thumbnail_size  	= apply_filters( 'single_product_small_thumbnail_size', 'product_small_thumbnail' );
	$thumbnail_size  		= apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' );
	$dimensions    			= wc_get_image_size( $small_thumbnail_size );
	$thumbnail_id  			= get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );

	if ( $thumbnail_id ) {
		$image_small = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size  );
		$image_small = $image_small[0];
		$image = wp_get_attachment_image_src( $thumbnail_id, $thumbnail_size  );
		$image = $image[0];
	} else {
		$image = $image_small = wc_placeholder_img_src();
		
	}

	if ( $image_small )
		echo '<img data-src="' . esc_url( $image ) . '" class="lazyOwl" src="' . esc_url( $image_small ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_url( $dimensions['height'] ) . '" />';
}





/******************************************************************************/
/* WooCommerce Wrap Oembed Stuff **********************************************/
/******************************************************************************/
add_filter('embed_oembed_html', 'mr_tailor_embed_oembed_html', 99, 4);
function mr_tailor_embed_oembed_html($html, $url, $attr, $post_id) {
	return '<div class="video-container">' . $html . '</div>';
}




/******************************************************************************/
/****** Overwrite WooCommerce Widgets *****************************************/
/******************************************************************************/
 

function overwride_woocommerce_widgets() { 
	if ( class_exists( 'WC_Widget_Cart' ) ) {
		include_once( 'framework/widgets/woocommerce-cart.php' ); 
		register_widget( 'mr_tailor_WC_Widget_Cart' );
	}
}
add_action( 'widgets_init', 'overwride_woocommerce_widgets', 15 );




/******************************************************************************/
/****** WooCommerce Wishlist YITH Ajax Hook ***********************************/
/******************************************************************************/

if (class_exists('YITH_WCWL')) {
	function wishlist_shortcode_offcanvas() {
		echo do_shortcode('[mr_tailor_yith_wcwl_wishlist]');
		die;
	}
	add_action('wp_ajax_wishlist_shortcode', 'wishlist_shortcode_offcanvas');
	add_action('wp_ajax_nopriv_wishlist_shortcode', 'wishlist_shortcode_offcanvas');
}




/******************************************************************************/
/****** Set woocommerce images sizes ******************************************/
/******************************************************************************/

/**
 * Hook in on activation
 */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'mr_tailor_woocommerce_image_dimensions', 1 );

/**
 * Define image sizes
 */
function mr_tailor_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '350',	// px
		'height'	=> '435',	// px
		'crop'		=> 1 		// true
	);

	$single = array(
		'width' 	=> '570',	// px
		'height'	=> '708',	// px
		'crop'		=> 1 		// true
	);

	$thumbnail = array(
		'width' 	=> '70',	// px
		'height'	=> '87',	// px
		'crop'		=> 1 		// false
	);

	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}




/********************************************************************************/
if ( ! isset( $content_width ) ) $content_width = 640; /* pixels */