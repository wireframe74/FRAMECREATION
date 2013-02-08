<?php

/* 

Template Name: 3 Columns

*/



get_header(); ?>





<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>	



<article id="internalContent" <?php post_class('columnFlt  threeCol internalContent'); ?>>





  <div class="column">

   <?php the_field('column_1'); ?>

  </div>



  <div class="column big-col">

   <?php the_field('column_2'); ?>

        

<?php if( get_field('downloadable_pdf') ): ?>
    <div class="download-list">
    <?php while( has_sub_field('downloadable_pdf') ): ?>
      <div class="download">

        <div class='download-thumb'>

          <a class="thumb thumb-portrait" target="_blank" href="<?php the_sub_field('download_item'); ?>"><img src="<?php the_sub_field('download_thumbnail'); ?>" alt="click to download"></a>

        </div>

        <div class="download-desc"><?php the_sub_field('download_description'); ?></div>

      </div>
    <?php endwhile; ?>
    </div>
<?php endif; ?>
<!--END DOWNLOAD LIST -->

<?php if (get_field('people')): ?>
  <div class="person-list">
   <h1>Key People</h1>
   
    <?php while(has_sub_field('people')): ?>
      <div class="person">
        <div class="person-thumb">
            <img src="<?php the_sub_field('person_image') ?>">
        </div>
        <div class="person-desc">
          <h2><?php the_sub_field('person_name') ?></h2>
          <p><?php the_sub_field('person_description') ?></p>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>

  </div>

  

  <!-- END COL 2 -->

  

  

  



  <div class="column last-col">

   <?php the_field('column_3'); ?>

 <?php endwhile; ?><?php else : ?><?php endif; ?>

<?php wp_reset_query(); ?>



 </div>

</article>

	

	





	

	







<?php get_footer(); ?>

