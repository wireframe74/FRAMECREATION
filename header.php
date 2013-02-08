<?php
/**

 * The Header for our theme.
 *
 * Displays all of the <head> section
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>




<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title><?php

    global $page, $paged;

    wp_title( '|', true, 'right' );
    bloginfo( 'name' );


    $site_description = get_bloginfo( 'description', 'display' );


    if ( $site_description && ( is_home() || is_front_page() ) )

        echo " | $site_description";



    if ( $paged >= 2 || $page >= 2 )
        echo ' | ' . sprintf( __( 'Page %s', 'starkers' ), max( $paged, $page ) );



 ?></title>

<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<link rel="stylesheet" type="text/css" media="screen and (max-width: 1200px)" href="<?php bloginfo('template_directory'); ?>/css/1024px.css" />

<link rel="stylesheet" type="text/css" media="screen and (max-width: 1023px)" href="<?php bloginfo('template_directory'); ?>/css/600px.css" />

<link rel="stylesheet" type="text/css" media="screen and (max-width: 480px)" href="<?php bloginfo('template_directory'); ?>/css/320px.css" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
<script>window.site_url = '<?php bloginfo('url'); ?>';</script>
<?php

    /* We add some JavaScript to pages with the comment form

     * to support sites with threaded comments (when in use).



     */



    if ( is_singular() && get_option( 'thread_comments' ) )



        wp_enqueue_script( 'comment-reply' );



    /* Always have wp_head() just before the closing </head>


     * tag of your theme, or you will break many plugins, which


     * generally use this hook to add elements to <head> such


     * as styles, scripts, and meta tags.

     */

    wp_head();



?>

<script src="<?php bloginfo('template_directory'); ?>/js/jquery.toc.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/framecreation.js"></script>
</head>







<body <?php body_class(); ?>>



<div style="display:none" class="fancybox-hidden">





<div id="fancyboxID-1">


<?php query_posts(array('showposts' => 1, 'p'=> 29, 'post_type' => 'page')); ?>

<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>	

<?php the_content(); ?>

<?php endwhile; ?><?php else : ?><?php endif; ?>
<?php wp_reset_query(); ?>


</div>

<div id="fancyboxID-2">
	<div class="mailing_list_form">
	<h1>Join our Mailing List</h1>
	<p>Sign up to our newsletter to recieve updates on news, events, latest case studies and research on the Frame Creation model and associated theory.</p>
	<form method="POST">
		<div class="control-group">
		<input type="text" placeholder="Name" required>
		</div>

		<div class="control-group">
		<input type="email" placeholder="email" required>
		</div>

		<button type="submit">Sign Up!</button>
	</form>
	</div>


</div>

</div>
 <!--[if lt IE 7]>

            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>

        <![endif]-->
        <!-- Add your site or application content here -->

   <div id="wrapper">
   	<header id="header">	

	<h1 id="logo"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

	<section id="rightLinks">			

		<h3 id="search_link"><a href="<?php bloginfo('url'); ?>/search">Search</a></h3>	
		<?php get_search_form(); ?>

		<h3 id="contact_link"><a href="#fancyboxID-1" class="fancybox">Contact</a></h3>	

		<h3 id="mailing_link"><a href="#fancyboxID-2" class="fancybox">Mailing List</a></h3>	
		</section>

</header>

<div id="content">


<?php include ('main-navigation.php');  ?>



