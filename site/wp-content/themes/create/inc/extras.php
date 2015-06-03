<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Create
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function create_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'create_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function create_body_classes( $classes ) {
	// #1 Adds a class of group-blog to blogs with more than 1 published author.
	// #2 Adds a class of masonry home.php only.
    // #3 Adds a class of content-area-full when widget is not in use.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	
    if ( is_home () ) {
        $classes[] = 'create-masonry';
    }
	
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	    $classes[] = 'no-sidebar-full-width';
	}

	return $classes;
}
add_filter( 'body_class', 'create_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	* Filters wp_title to print a neat <title> tag based on what is being viewed.
	*
	* @param string $title Default title text for current view.
	* @param string $sep Optional separator.
	* @return string The filtered title.
	*/
	function create_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}
		
		global $page, $paged;
		
		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );
		
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}
		
		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
		}
		
		return $title;
		
	}
		
	add_filter( 'wp_title', 'create_wp_title', 10, 2 );
	
	/**
	* Title shim for sites older than WordPress 4.1.
	*
	* @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	* @todo Remove this function when WordPress 4.3 is released.
	*/
	function create_render_title() {
	?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php
	}
	add_action( 'wp_head', 'create_render_title' );
endif;

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function create_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'create_setup_author' );

/**
 * Create excerpt length is set to 30 words.
 */
function create_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'create_excerpt_length', 999 );

/**
 * Create is using [...] string in the excerpt.
 */
function create_excerpt_more( $more ) {
	return '<span class="more-dots"><a href="'. get_permalink( get_the_ID() ) . '">[ . . . ]</span>' . '</a>';
}
add_filter( 'excerpt_more', 'create_excerpt_more' );

if ( ! function_exists( 'create_content_end' ) ) :
/**
 * End Content wrap
 *
 * @since Create 0.2
 */
function create_content_end() { ?>
	</div><!-- #content -->
<?php
}
endif; //create_content_end
add_action( 'create_before_footer', 'create_content_end', 10 );

if ( ! function_exists( 'create_footer_start' ) ) :
/**
 * Start Footer wrap
 *
 * @since Create 0.2
 */
function create_footer_start() { ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
<?php
}
endif; //create_footer_start
add_action( 'create_footer', 'create_footer_start', 10 );

if ( ! function_exists( 'create_footer_end' ) ) :
/**
 * End Footer wrap
 *
 * @since Create 0.2
 */
function create_footer_end() { ?>
	</footer><!-- #colophon -->
<?php
}
endif; //create_footer_end
add_action( 'create_footer', 'create_footer_end', 50 );

if ( ! function_exists( 'create_page_end' ) ) :
/**
 * End Page wrap
 *
 * @since Create 0.2
 */
function create_page_end() { ?>
	</div><!-- #page -->
<?php
}
endif; //create_page_end
add_action( 'create_footer', 'create_page_end', 100 );

if ( ! function_exists( 'create_copyright' ) ) :
/**
* Powered by Text
*
* @since Create 0.2
*/
function create_copyright() { ?>
	<span class="site-copyright">
		<?php 
		printf( _x( '&copy; %1$s %2$s' , '1: Year, 2: Site Title with home URL', 'create' ), date( 'Y' ), '<a href="' . esc_url( home_url( '/' ) ) . '"> ' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );
		?>
	</span>
<?php
}
endif; //create_copyright


if ( ! function_exists( 'create_seperator' ) ) :
/**
 * Seperator
 *
 * @since Create 0.2
 */
function create_seperator() { ?>
	<span class="sep"><?php echo esc_attr( '&nbsp;&bull;&nbsp;' ); ?></span>
<?php
}
endif; //create_seperator

/**
 * Profile
 *
 * @since Create 0.2
 */
function create_profile() { ?>
	<span class="theme-name">
		<?php echo esc_attr( 'Create' ); ?>
	</span>
	<span class="theme-by">
		<?php _ex( 'by', 'attribution', 'create' ); ?>
	</span>
	<span class="theme-author">
		<a href="<?php echo esc_url( 'http://catchthemes.com/' ); ?>" target="_blank">
			<?php echo esc_attr( 'Catch Themes' ); ?>
		</a>
	</span>
<?php	
}

/**
 * Footer Information
 *
 * @since Create 0.2
 */
function create_footer_info() { ?>
	<div class="site-info">
		<?php create_copyright(); ?>
		<?php create_seperator(); ?>
		<?php create_profile(); ?>
	</div><!-- .site-info -->
	
<?php 
}
// Load footer content in  create_footer hook 
add_action( 'create_footer', 'create_footer_info', 20 );