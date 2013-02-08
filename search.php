<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
 */

get_header(); ?>

<article class="internalContent">

<?php if ( have_posts() ) : ?>
		<h1><?php printf( __( 'Search Results for: %s', 'starkers' ), '' . get_search_query() . '' ); ?></h1>
			<?php
				get_template_part( 'loop', 'search' );
			?>
<?php else : ?>
		<h1><?php _e( 'Nothing Found', 'starkers' ); ?></h1>
			<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'starkers' ); ?></p>
			<?php get_search_form(); ?>
<?php endif; ?>


</article>

<?php get_footer(); ?>