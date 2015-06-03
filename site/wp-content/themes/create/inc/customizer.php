<?php
/**
 * Create Theme Customizer
 *
 * @package Create
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function create_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	class CreateImportantLinks extends WP_Customize_Control {
        public $type = 'important-links'; 
        
        public function render_content() {
        	//Add Theme instruction, Support Forum, Changelog, Donate link, Review, Facebook, Twitter, Google+, Pinterest links
            $important_links = array(
							'theme_instructions' => array( 
								'link'	=> esc_url( 'http://catchthemes.com/theme-instructions/create/' ),
								'text' 	=> __( 'Theme Instructions', 'create' ),
								),
							'support' => array( 
								'link'	=> esc_url( 'http://catchthemes.com/support/' ),
								'text' 	=> __( 'Support', 'create' ),
								),
							'changelog' => array( 
								'link'	=> esc_url( 'http://catchthemes.com/changelogs/create-theme/' ),
								'text' 	=> __( 'Changelog', 'create' ),
								),
							'donate' => array( 
								'link'	=> esc_url( 'http://catchthemes.com/donate/' ),
								'text' 	=> __( 'Donate Now', 'create' ),
								),
							'review' => array( 
								'link'	=> esc_url( 'https://wordpress.org/support/view/theme-reviews/create' ),
								'text' 	=> __( 'Review', 'create' ),
								),
							'facebook' => array( 
								'link'	=> esc_url( 'https://www.facebook.com/catchthemes/' ),
								'text' 	=> __( 'Facebook', 'create' ),
								),
							'twitter' => array( 
								'link'	=> esc_url( 'https://twitter.com/catchthemes/' ),
								'text' 	=> __( 'Twitter', 'create' ),
								),
							'gplus' => array( 
								'link'	=> esc_url( 'https://plus.google.com/+Catchthemes/' ),
								'text' 	=> __( 'Google+', 'create' ),
								),
							'pinterest' => array( 
								'link'	=> esc_url( 'http://www.pinterest.com/catchthemes/' ),
								'text' 	=> __( 'Pinterest', 'create' ),
								),
							);
			foreach ( $important_links as $important_link) {
				echo '<p><a target="_blank" href="' . $important_link['link'] .'" >' . $important_link['text'] .' </a></p>';
			}
        }
    }

    //Important Links
	$wp_customize->add_section( 'important_links', array(
		'priority' 		=> 999,
		'title'   	 	=> __( 'Important Links', 'create' ),
	) );

	/**
	 * Has dummy Sanitizaition function as it contains no value to be sanitized
	 */
	$wp_customize->add_setting( 'important_links', array(
		'sanitize_callback'	=> 'create_sanitize_important_link',
	) );

	$wp_customize->add_control( new CreateImportantLinks( $wp_customize, 'important_links', array(
        'label'   	=> __( 'Important Links', 'create' ),
         'section'  	=> 'important_links',
        'settings' 	=> 'important_links',
        'type'     	=> 'important_links',
    ) ) );  
    //Important Links End

}
add_action( 'customize_register', 'create_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function create_customize_preview_js() {
	wp_enqueue_script( 'create_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'create_customize_preview_js' );

/**
 * Dummy Sanitizaition function as it contains no value to be sanitized
 */
function create_sanitize_important_link() {
	return false;
}

/**
 * Custom scripts and styles on customize.php for create.
 *
 * @since Create 1.2
 */
function create_customize_scripts() {
	wp_register_script( 'create_customizer_custom', get_template_directory_uri() . '/js/customizer-custom-scripts.js', array( 'jquery' ), '20131028', true );

	$create_misc_links = array(
							'upgrade_link' 				=> esc_url( 'http://catchthemes.com/themes/create-pro/' ),
							'upgrade_text'	 			=> __( 'Upgrade To Pro &raquo;', 'create' ),
						);

	//Add Upgrade Button via localized script
	wp_localize_script( 'create_customizer_custom', 'create_misc_links', $create_misc_links );

	wp_enqueue_script( 'create_customizer_custom' );

	wp_enqueue_style( 'create_customizer_custom', get_template_directory_uri() . '/css/customizer.css');
}
add_action( 'customize_controls_print_footer_scripts', 'create_customize_scripts' );