<?php

// [add_to_cart]

vc_map(array(
   "name"			=> __("Add to Cart Button"),
   "category"		=> __('Products'),
   "description"	=> __(""),
   "base"			=> "add_to_cart",
   "class"			=> "",
   "icon"			=> "add_to_cart",
   
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