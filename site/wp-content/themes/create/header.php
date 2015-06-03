<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Create
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
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'create' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
    
    <div class="site-banner">
		<div class="site-branding">
        
		    <nav id="site-navigation" class="main-navigation create-menu" role="navigation">
			    <button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Menu', 'create' ); ?></button>
			    <?php wp_nav_menu( array( 
				    'theme_location' => 'primary' ) 
				    ); 
				?>
		    </nav><!-- #site-navigation -->
        
            <?php if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div><!-- .site-branding -->
        
        <?php if ( has_nav_menu( 'social' ) ) : ?>
            <div class="social-menu">
		        <?php wp_nav_menu( array(
				    'theme_location' => 'social',
				    'depth'          => '1',
				    'link_before'    => '<span class="screen-reader-text">',
				    'link_after'     => '</span>' )
				    );
                ?>
            </div><!-- .social-menu -->       
        <?php endif; ?>
        
        </div><!-- .site-banner -->
       
	</header><!-- #masthead -->

	<div id="content" class="site-content">