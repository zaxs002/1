<?php

// [products]

/* All products dropdown */
function products_settings_field($settings, $value) {   
    $attr = array("post_type"=>"product", "orderby"=>"name", "order"=>"asc", 'posts_per_page'   => -1);
    $categories = get_posts($attr); 
    $dependency = vc_generate_dependencies_attributes($settings);
    $data = '<input type="text" value="'.$value.'" name="'.$settings['param_name'].'" class="wpb_vc_param_value wpb-input wpb-select vc_custom_select_custom_val '.$settings['param_name'].' '.$settings['type'].'" id="vc_custom_select_custom_prod">';
    $data .= '<div class="vc_custom_select_custom_wrapper"><ul class="vc_custom_select_custom_vals">';
    $insterted_vals = explode(',', $value);
    foreach($categories as $val) {
        if( in_array($val->ID, $insterted_vals) ) {
          $data .= '<li data-val="'.$val->ID.'">'.$val->post_title.'<button>×</button></li>';
        }
    }
    $data .= '</ul>'; 
    $data .= '<ul class="vc_custom_select_custom">';
    foreach($categories as $val) {
        $selected = '';
        if( in_array($val->ID, $insterted_vals) ) {
          $selected = ' class="selected"';
        }
        $data .= '<li' . $selected . ' data-val="'.$val->ID.'">'.$val->post_title.'</li>';
    }
    $data .= '</ul></div>';
    return $data;
}
add_shortcode_param('products' , 'products_settings_field', get_template_directory_uri() . '/framework/js/wp-admin-visual-composer.js');

vc_map(array(
   "name" 			=> __("Multiple / Specific Products"),
   "category" 		=> __('Products'),
   "description"	=> __(""),
   "base" 			=> "products",
   "class" 			=> "",
   "icon" 			=> "products",
   
   "params" 	=> array(
      
		array(
			"type" => "products",
			"holder" => "div",
			"heading" => __("Products"),
			"param_name" => "ids",
			"description" => __("Select the products you'd like to display.")
		),
		
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> __("Columns"),
			"description"	=> __(""),
			"param_name"	=> "columns",
			"value"			=> "4",
		),
		
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> __("Order By"),
			"description"	=> __(""),
			"param_name"	=> "orderby",
			"value"			=> array(
				"None"	=> "none",
				"ID"	=> "ID",
				"Title"	=> "title",
				"Date"	=> "date",
				"Rand"	=> "rand"
			),
			"std"			=> "date",
		),
		
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> __("Order"),
			"description"	=> __(""),
			"param_name"	=> "order",
			"value"			=> array(
				"Desc"	=> "desc",
				"Asc"	=> "asc"
			),
			"std"			=> "desc",
		),
   )
   
));