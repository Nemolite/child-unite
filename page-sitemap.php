<?php
/*
Template Name: Для шорткода
*/
get_header();
?>
<?php
//echo "шорт";

echo do_shortcode('[ufilms_top]');
echo do_shortcode('[ufilms]');
?>
<?
// параметры по умолчанию
$posts = get_posts( array(
	'numberposts' => 5,
	'category'    => 0,
	'orderby'     => 'date',
	'order'       => 'DESC',
	'include'     => array(),
	'exclude'     => array(),
	'meta_key'    => '',
	'meta_value'  =>'',
	'post_type'   => 'films',
	'suppress_filters' => true, 
) );

foreach( $posts as $post ){
	setup_postdata($post);
    echo "<br/>";
		
        print the_title(); 
        the_excerpt();
        the_post_thumbnail();		
		the_content();
		echo "<br/>";
		// ACF
		the_field('cost');
		echo "<br/>";
        the_field('release_date');
        echo "<br/>";		
		echo "<hr>";
		echo "<br/>";
}

wp_reset_postdata(); // сброс
?>

<?php
echo do_shortcode('[ufilms_bottom]');

?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
