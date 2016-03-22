<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bigbossburgers
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<!-- Skip to Content button disabled
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'bigbossburgers' ); ?></a>
	-->
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<div class="site-title"><a href="http://bigbossburgers.com/" rel="home">BIG BOSS BURGERS</a></div>
			<!-- CUSTOM HEADER so disabled header loop
			<?php //Post loop
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?> -->
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<!-- Button for header -->
			<button type="button" class="menu-toggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Div for left side of header -->
            <div class="menu-primary-menu-left-container">
            	<ul id="menu-primary-menu-left" class="menu nav-menu">
            		<li id="menu-item-1" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-6 current_page_item menu-item-1">
            			<a href="http://phoenix.sheridanc.on.ca/~ccit3433/index.php/story/">Story</a></li>
					<li id="menu-item-2" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2">
						<a href="http://phoenix.sheridanc.on.ca/~ccit3433/index.php/blog/">Blog</a></li>
					
				</ul>		
			</div>
			<!-- Div for right side of header -->
			<div class="menu-primary-menu-right-container">
				<ul id="menu-primary-menu-right" class="menu">
					<li id="menu-item-4" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4">
						<a href="http://phoenix.sheridanc.on.ca/~ccit3433/index.php/food-2/">Food</a></li>
					<li id="menu-item-5" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5">
						<a href="http://phoenix.sheridanc.on.ca/~ccit3433/index.php/drink/">Drink</a></li>
					<li id="menu-item-6" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6">
						<a href="http://phoenix.sheridanc.on.ca/~ccit3433/index.php/meet-2/">Meet</a></li>
				</ul>
			</div>     
			 
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
