<?php
/**
 * Create functions and definitions
 *
 * @package Create
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 650; /* pixels */
}

if ( ! function_exists( 'create_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function create_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Create, use a find and replace
	 * to change 'create' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'create', get_template_directory() . '/languages' );
	
	// Create styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', create_fonts_url() ) );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	// Set default size.
	set_post_thumbnail_size( 650, 488, true );
	
	// Add default size for single pages.
	add_image_size( 'create-single', '650', '9999', false );

	// Add default size for homepage.
	add_image_size( 'create-home', '261', '196', true );

	// Add default size for homepage.
	add_image_size( 'create-header', '1024', '350', true );
		
	// Add default logo size for Jetpack.
	add_image_size( 'create-site-logo', '300', '9999', false );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'create' ),
		'social'  => __( 'Social Menu', 'create' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'create_custom_background_args', array(
		'default-color'       => 'f5f5f5',
		'default-attachment'  => 'fixed',
		'default-repeat'      => 'no-repeat',
		'default-image'       => '%s/images/default-background.jpg',
	) ) );

	/**
	 * Setup title support for theme
	 * Supported from WordPress version 4.1 onwards 
	 * More Info: https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 */
	add_theme_support( 'title-tag' );
}
endif; // create_setup
add_action( 'after_setup_theme', 'create_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function create_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'create' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'create' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Intro Widget', 'create' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional widget that appears only on your default homepage.', 'create' ),
		'before_widget' => '<aside id="%1$s" class="widget-intro %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'create_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function create_scripts() {
	
	// Enqueue masonry	
	wp_enqueue_script( 'masonry');

	// Localize script (only few lines in helpers.js)
    wp_localize_script( 'create-helpers', 'create-vars', array(  
 	    'author'   => __( 'Your Name', 'create' ), 
 	    'email'    => __( 'E-mail', 'create' ),
		'url'      => __( 'Website', 'create' ),
		'comment'  => __( 'Your Comment', 'create' ) 
 	) );	
	
	// Enqueue default style
	wp_enqueue_style( 'create-style', get_stylesheet_uri() );
	
	// Google fonts
	wp_enqueue_style( 'create-fonts', create_fonts_url(), array(), '1.0.0' );
	
	//For genericons
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/css/genericons/genericons.css', false, '3.3' );
	
    // JS helpers (This is also the place where we call the jQuery in array)
	wp_enqueue_script( 'create-helpers', get_template_directory_uri() . '/js/helpers.js', array( 'jquery' ), '1.0.0', true );

	// Mobile navigation
	wp_enqueue_script( 'create-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true );
	
	// Skip link fix
	wp_enqueue_script( 'create-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.0.0', true );

	// Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'create_scripts' );

/**
 * Register Google fonts.
 *
 */
function create_fonts_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by chosen font(s), translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'create' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Bitter:400,700,400italic|Josefin Sans:400,400italic|Varela:400' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 */
function create_admin_fonts() {
	wp_enqueue_style( 'create-font', create_fonts_url(), array(), '1.0.0' );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'create_admin_fonts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';