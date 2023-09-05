<?php

include(get_stylesheet_directory().'/functions/uploads-customizer-misc.php');

include(get_stylesheet_directory().'/functions/custom-post-types.php');

include(get_stylesheet_directory().'/functions/acf-fields.php');

include(get_theme_root().'/css/gutenberg.php');

include(get_stylesheet_directory().'/functions/gutenberg.php');

// Add everyaction donation script
function register_scripts() {
  wp_enqueue_script( 'custom_form_js', site_url() . '/js/everyactionmembership.js', [], true);
}
add_action( 'wp_enqueue_scripts', 'register_scripts' );

// Add Footer Menu
function register_footer_menu() {
    register_nav_menu('secondary-menu',__( 'Footer Menu' ));
  }
  add_action( 'init', 'register_footer_menu' );

// Queue parent style followed by child/customized style
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'cfi-style', get_theme_root_uri() . '/css/style.css', array(), filemtime(get_theme_root() . '/css/style.css') );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css') ) ;
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', PHP_INT_MAX);

function theme_login_styles() {
    wp_enqueue_style( 'cfi-style', get_theme_root_uri() . '/css/login.css', array(), filemtime(get_theme_root() . '/css/login.css') );
}
add_action( 'login_enqueue_scripts', 'theme_login_styles' );

add_editor_style();

// Add options page
if( function_exists('acf_add_options_sub_page') ) {
	acf_add_options_sub_page('Secular Rescue Options');
}

/**
 * Add `unfiltered_html` capability to editors (or other user roles).
 * On WordPress multisite, `unfiltered_html` is blocked for everyone but super admins. This gives that cap back to editors 
 * and above.
 *
 * @author Justin Tadlock
 * @link   http://themehybrid.com/board/topics/add-unfiltered_html-capability-to-editor-role#post-4629
 * @param  array  $caps    An array of capabilities.
 * @param  string $cap     The capability being requested.
 * @param  int    $user_id The current user's ID.
 */
function my_map_meta_cap( $caps, $cap, $user_id ) {

	if ( 'unfiltered_html' === $cap && user_can( $user_id, 'administrator' || 'editor' ) )
		$caps = array( 'unfiltered_html' );

	return $caps;
}

add_filter( 'map_meta_cap', 'my_map_meta_cap', 1, 3 );
