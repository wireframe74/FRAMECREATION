<?php

/**

 * The Sidebar containing the primary and secondary widget areas.

 *

 * @package WordPress

 * @subpackage Starkers

 * @since Starkers HTML5 3.0

 */

?>



<aside id="sideBar">

  <ul>

  

  <?php

	/* When we call the dynamic_sidebar() function, it'll spit out

	 * the widgets for that widget area. If it instead returns false,

	 * then the sidebar simply doesn't exist, so we'll hard-code in

	 * some default sidebar stuff just in case.

	 */

	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

	

	



		<?php endif; // end primary widget area ?>

        
<h1>Categories</h1>
<?php wp_list_categories('orderby=name&show_count=1&exclude=7&title_li='); ?> 

        



  </ul>

<?php

	// A second sidebar for widgets, just because.

	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>



			<ul>

				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>

			</ul>



<?php endif; ?>

	

</aside>







