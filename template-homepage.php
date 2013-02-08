<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
   Template Name: Home Page
  */

get_header(); ?>

<section id="quote" class="columnFlt">

<?php query_posts(array('showposts' => 1, 'p'=> 16, 'post_type' => 'page')); ?>
<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>	

<?php if( get_field('quote') ) { ?>
<h3><?php the_field( 'quote' ); ?></h3>
<?php } ?>

<?php endwhile; ?><?php else : ?><?php endif; ?>
<?php wp_reset_query(); ?>

</section>



<section id="clients" class="columnFlt">
<h1>Frame Creation Models</h1>	

<?php 

	$model_pages = new WP_Query(array(
		'post_type' => 'page',
		'post_parent' => 2,
		'order' => 'ASC',
		'orderby' => 'ID'
	));

	if($model_pages->have_posts()) {
		while ($model_pages->have_posts()) {
			$model_pages->the_post();

			$post_id = get_the_id();
			$slug = basename(get_permalink());
			echo '<a id="model-'.$slug.'" data-model="'.$post_id.'" class="model-logo" href="'.get_bloginfo('url').'/frame-creation-model/#post-'.$post_id.'">';
			echo '<img src="'.get_field('logo', $post_id).'" alt="'.get_the_title().'">';
			echo '</a>';

			echo '<div class="model-rollover" data-model="'.$post_id.'"><p>'.get_field('rollover_text', $post_id).'</p></div>';
		}
	}



?>
</section>


	
	

<?php include('sidebar-home-page.php'); ?>


<?php get_footer(); ?>
