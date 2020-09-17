<?php
/**
 *  Для дочерной темы
 * _s functions and definitions
 *
 * @package unite
 */
 
 function test_short_code( $atts ) {
	$params = shortcode_atts( array(  
		'anchor' => 'Nemolite', 
		'url' => 'https://github.com/Nemolite', 
	), $atts );
	return "<a href='{$params['url']}' target='_blank'>{$params['anchor']}</a>";
}
add_shortcode( 'ufilms', 'test_short_code' );


function test_short_code_top( $atts ) {
	
	return "
	<section id='primary' class='content-area col-sm-12 col-md-8'>
		<main id='main' class='site-main' role='main'>
	";
}
add_shortcode( 'ufilms_top', 'test_short_code_top' );

function test_short_code_bottom( $atts ) {
	
	return "
	</main><!-- #main -->
	</section><!-- #primary -->
	";
}
add_shortcode( 'ufilms_bottom', 'test_short_code_bottom' );


function test_short_code_main( $atts ) {
	
	return "";
		
}
add_shortcode( 'ufilms_bottom', 'test_short_code_main' );




