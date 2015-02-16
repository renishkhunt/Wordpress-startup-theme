<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package matwordtheme
 */
?><!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title('|', true, 'right');?></title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/apple-touch-icon.png">
	<?php wp_head();?>
</head>

<body <?php body_class();?>>
<div id="page" class="hfeed site">
	<div class="container">
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php print matword_admin_header_image(); ?>
		</div>

		<nav class="navbar navbar-default">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    	<div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			    </div>
			    
			    <?php
		            wp_nav_menu( array(
		                'menu'              => 'wordcomat',
		                'theme_location'    => 'wordcomat',
		                'depth'             => 2,
		                'container'         => 'div',
		                'container_class'   => 'collapse navbar-collapse',
		        		'container_id'      => 'bs-example-navbar-collapse-1',
		                'menu_class'        => 'nav navbar-nav',
		                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		                'walker'            => new wp_bootstrap_navwalker())
		            );
		        ?>

		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
