<?php
/*
Template Name: Для bootstrap
*/
get_header();
?>
<section id="primary" class="content-area col-sm-12 col-md-8 <?php echo esc_attr(unite_get_option( 'site_layout' )); ?>">
		<main id="main" class="site-main" role="main">
<?php		
		
$posts = get_posts( array(
	'numberposts' => 4,
	'category'    => 0,
	'orderby'     => 'date',
	'order'       => 'ASC',
	'include'     => array(),
	'exclude'     => array(),
	'meta_key'    => '',
	'meta_value'  =>'',
	'post_type'   => 'films',
	'suppress_filters' => true, 
) );
?>

<?php
foreach( $posts as $post ){
	setup_postdata($post);
	?>
	<div class="col-md-6">
    <div class="test_item">
	     <?php print the_title();?>
		 <div class=" test_item_img">
		
         <img src="<?php the_post_thumbnail();?>
		 </div>
	<?php the_excerpt(); 
	    echo "<p>Цена билета</p>";?>
		<label for="basic-url">
		<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
		<?php the_field('cost'); ?>
		</label>
		<?php
	   
	   
	   
        echo "<br/>";
		
		echo "<p>Дата премьеры</p>";
        ?>
		<label for="basic-url">
		
		<span class="glyphicon glyphicon-modal-window" aria-hidden="true"></span>
		<?php the_field('release_date'); ?>
		</label>
		<?php
        echo "<br/>";
		// Выводим таксаноми
		?>
		<p>Актеры:</p>
		<?php
		$cur_terms = get_the_terms( $post->ID, 'Actors' );
     if( is_array( $cur_terms ) ){
	foreach( $cur_terms as $cur_term ){
		echo '<a href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>,';
	}
      }
		
		
		?>
		<p><span class="glyphicon glyphicon-qrcode" aria-hidden="true"></span>Жанр:</p>
		<?php
		$cur_terms2 = get_the_terms( $post->ID, 'Genres' );
     if( is_array( $cur_terms2 ) ){
	foreach( $cur_terms2 as $cur_term ){
		echo '<a href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>,';
	}
      }
	  
	  	?>
		<p><span class="glyphicon glyphicon-move" aria-hidden="true"></span>Страна:</p>
		<?php
		$cur_terms3 = get_the_terms( $post->ID, 'Countries' );
     if( is_array( $cur_terms3 ) ){
	foreach( $cur_terms3 as $cur_term ){
		echo '<a href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>,';
	}
      }
		
         		
	?>
    </div>
    </div>
  <?php
 
}
wp_reset_postdata(); // сброс
?>
</div><!-- row -->		

</main><!-- #main -->
	</section><!-- #primary -->
	
	

<?php //get_sidebar(); ?>
<?php get_footer(); ?>