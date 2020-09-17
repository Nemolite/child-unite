<?php
/*
Plugin Name: User Post Views
Plugin URI: https://github.com/Nemolite
Description: Вывод списка фильмов
Version: 1.0.0
Author: Nemolite
Author URI: https://github.com/Nemolite
*/
?>

<?php

function postshow(){ 
   /**
 * Setup query to show the ‘services’ post type with ‘8’ posts.
 * Output the title with an excerpt.
 */
    $args = array(  
        'post_type' => 'films',
        'post_status' => 'publish',
        'posts_per_page' => 5, 
        
    );

    $loop = new WP_Query( $args ); 
        
    while ( $loop->have_posts() ) : $loop->the_post();
        //get_template_part( 'userfilms') );
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
    endwhile;

    wp_reset_postdata(); 
    
   
}

add_action( 'show_films', 'postshow' );
?>