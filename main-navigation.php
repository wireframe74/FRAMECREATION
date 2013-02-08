<div id="mainNavigationMenu" class="select-wrapper">

<select class="search_select select-navigator" id="location">

	<option value="0">MENU...</option>

	<option value="<?php bloginfo('url'); ?>">Home</option>

	<?php 



	

	$menu_items = wp_get_nav_menu_items('Main Navigation');



	foreach ((array) $menu_items as $key => $menu_item) {

		echo '<option value="'.$menu_item->url.'">'.$menu_item->title.'</option>';

	}



?>



</select>

</div>



<div id="CategoryNavigator" class="select-wrapper">

	<select id="CategorySelector" class="select-navigator">

		<option value="0">Categories</option>

	<?php 



	$categories_to_exclude = get_categories('child_of=7');

	$excludes = array('7');

	foreach ($categories_to_exclude as $ex) array_push($excludes, $ex->cat_ID);



	$categories = get_categories(array('exclude' => join(',',$excludes)));



	foreach ($categories as $category) {

		$cat_url = get_bloginfo('url').'/category/'.$category->category_nicename;

		echo '<option value="'.$cat_url.'">'.$category->cat_name.'</option>';

	}



	?>

	</select>

</div>







<nav id="mainNav" class="columnFlt">



<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to the 'starkers_menu' function which can be found in functions.php.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>

<?php wp_nav_menu( array( 'container' => false,  'fallback_cb' => 'starkers_menu', 'theme_location' => 'primary' ) ); ?>

        

        

        

    



	

	

	

</nav>