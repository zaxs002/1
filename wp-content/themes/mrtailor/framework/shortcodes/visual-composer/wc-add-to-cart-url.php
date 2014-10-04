<?php

// [add_to_cart_url]

vc_map(array(
   "name" 			=> __("Add to Cart URL"),
   "category" 		=> __('Products'),
   "description"	=> __("Description"),
   "base" 			=> "add_to_cart_url",
   "class" 			=> "",
   "icon" 			=> "add_to_cart_url",
   
   "params" 	=> array(
      
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> __("ID"),
			//"description"	=> __(""),
			"param_name"	=> "id",
			"value"			=> "",
		),
		
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> __("SKU"),
			//"description"	=> __(""),
			"param_name"	=> "sku",
			"value"			=> "",
		),

   )
   
));