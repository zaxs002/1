<?php

// [best_selling_products]

vc_map(array(
   "name" 			=> __("Best Selling Products"),
   "category" 		=> __('Products'),
   "description"	=> __(""),
   "base" 			=> "best_selling_products",
   "class" 			=> "",
   "icon" 			=> "best_selling_products",
   
   "params" 	=> array(
      
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> __("Number of Products"),
			//"description"	=> __(""),
			"param_name"	=> "per_page",
			"value"			=> "4",
		),
		
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> __("Columns"),
			//"description"	=> __(""),
			"param_name"	=> "columns",
			"value"			=> "4",
		),
   )
   
));