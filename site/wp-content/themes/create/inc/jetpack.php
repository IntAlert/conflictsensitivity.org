<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Create
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function create_jetpack_setup() {
    add_theme_support( 'infinite-scroll', array(
        'container'      => 'main',
		'footer'         => 'colophon',
		'wrapper'        => false,
	) );
	
    /**
     * Add theme support for site logos
     */
     add_theme_support( 'site-logo', array( 'size' => 'create-site-logo' ) );
	 
    /**
     * Add theme support for responsive videos.
     */
    add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'create_jetpack_setup' );