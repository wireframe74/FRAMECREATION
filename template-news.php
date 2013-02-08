<?php

/* 
Template Name: Latest News
*/

get_header(); ?>


<article class="internalContent">
<header>
	<h1>Latest News</h1>
</header>
  <div class="post-list">	
<?php

	$args = array(
		'cat' => '3, -7',
		'post_type' => 'post',
		'posts_per_page' => 6,
		'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
	);

	query_posts($args);
?>


<?php if (have_posts()) : ?>



<?php
	$c = 0; // set up a counter so we know which post we're currently showing
	$thumbnail = 'landscape-thumb';
?>

<?php while (have_posts()) : the_post(); ?>	


<?php $c++; // increment the counter ?>

<?php

	if( $c % 2 != 0) {
		// we're on an odd post
		$thumbnail = 'landscape-thumb';
	} else {
		$thumbnail = 'portrait-thumb'; 
	}

?>



	<div id="post-<?php the_ID(); ?>" class="post-summary <?php echo $thumbnail; ?>">
		<div class="post-thumb">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail($thumbnail); ?> 
			</a>
   		</div>

	
		<div class="post-desc">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<time datetime="<?php the_date('Y-m-d'); ?>"><?php the_date('Y-m-d'); ?> @ <?php the_time('g:i a'); ?> by  <?php the_author(); ?> </time>

			<?php  
				$trimexcerpt = get_the_excerpt();
				$shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 35, $more = ' ' );
				echo '<p>' . $shortexcerpt .'<a href="' . get_permalink() . '">...more</a></p>';       
			?> 
		</div>
	</div>

<?php endwhile; ?><?php else : ?><?php endif; ?>

<div class="navigation">
  <div class="alignleft"><?php previous_posts_link('&laquo; Newer') ?></div>
  <div class="alignright"><?php next_posts_link('Older &raquo;') ?></div>
</div>



<?php
	wp_reset_query();  // Restore global post data
?>

</article>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
