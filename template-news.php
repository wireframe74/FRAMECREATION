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

$thumbnail = 'landscape-thumb'

?>





<?php while (have_posts()) : the_post(); ?>	

 

<?php

$c++; // increment the counter

?>

     

<?php

if( $c % 2 != 0) {

	// we're on an odd post

$thumbnail = 'landscape-thumb';

} else {

$thumbnail = 'portrait-thumb'; }

?>





    <div id="post-<?php the_ID(); ?>" class="post-summary <?php echo $thumbnail; ?>">

   

   







       

       

       <div class="post-thumb">

<a href="<?php the_permalink(); ?>">
 <?php the_post_thumbnail($thumbnail); ?> 
</a>
   </div>

      

  

      

      <div class="post-desc">

        <h2><?php the_title(); ?></h2>

        <time datetime="<?php the_date('Y-m-d'); ?>"><?php the_date('Y-m-d'); ?> @ <?php the_time('g:i a'); ?> by  <?php the_author(); ?> </time>

<?php  



/* GET A VARIABLE OF WHAT IS TO BE THE EXCERPT */

$trimexcerpt = get_the_excerpt();



/* APPLY THE WP TRIM WORDS AND STORE IN VARIABLE */

$shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 35, $more = ' ' );

 

/* ECHO EXCERPT VARIABLE */

echo '<p>' . $shortexcerpt .'<a href="' . get_permalink() . '">Read More</a></p>';       

?> 



      </div>

    </div>







<?php endwhile; ?><?php else : ?><?php endif; ?>







<div class="navigation">

  <div class="alignleft"><?php previous_posts_link('&laquo; Older') ?></div>

  <div class="alignright"><?php next_posts_link('Newer &raquo;') ?></div>

</div>

<?php

wp_reset_query();  // Restore global post data

?>



















</article>

	





	

	



<?php get_sidebar(); ?>



<?php get_footer(); ?>

