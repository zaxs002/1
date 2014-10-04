<?php

// [top_rated_products]

vc_map(array(
   "name" 			=> __("Top Rated Products"),
   "category" 		=> __('Products'),
   "description"	=> __(""),
   "base" 			=> "top_rated_products",
   "class" 			=> "",
   "icon" 			=> "top_rated_products",
   
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
		
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> __("Order By"),
			//"description"	=> __(""),
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
			//"description"	=> __(""),
			"param_name"	=> "order",
			"value"			=> array(
				"Desc"	=> "desc",
				"Asc"	=> "asc"
			),
			"std"			=> "desc",
		),
   )
   
));