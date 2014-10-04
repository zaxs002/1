<?php

function mr_tailor_fonts() {		
	
	global $mr_tailor_theme_options;
	
	$mr_tailor_customfont = '';
	$google_fonts_counter = 0;
	
	$googlefonts = array(
						$mr_tailor_theme_options['main_font'],
						$mr_tailor_theme_options['secondary_font']
					);
				
	foreach($googlefonts as $googlefont) {
	
		if (!isset($googlefont['google'])) {
			$mr_tailor_customfont = str_replace(' ', '+', $googlefont['font-family']). ':100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic|subset=latin,' . $googlefont['subsets'] . '|' . $mr_tailor_customfont;
			$google_fonts_counter++;
		} else {
			if ($googlefont['google'] == "true") {
				$mr_tailor_customfont = str_replace(' ', '+', $googlefont['font-family']). ':100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic|subset=latin,' . $googlefont['subsets'] . '|' . $mr_tailor_customfont;
				$google_fonts_counter++;
			}
		}
		
	}
			
	if ($google_fonts_counter > 0) wp_enqueue_style( 'mr_tailor-googlefonts', "//fonts.useso.com/css?family=". substr_replace($mr_tailor_customfont ,"",-1), NULL, NULL, 'all' );
	
}
add_action( 'wp_enqueue_scripts', 'mr_tailor_fonts' );
	
?>