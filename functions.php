<?php
/**
 * Moina Wp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Moina Wp
 */

if ( ! defined( 'MOINA_WP_VERSION' ) ) {
	$moina_wp_theme = wp_get_theme();
	define( 'MOINA_WP_VERSION', $moina_wp_theme->get( 'Version' ) );
}


/**
 * Enqueue scripts and styles.
 */
function moina_wp_scripts() {
    wp_enqueue_style( 'moina-wp-parent-style', get_template_directory_uri() . '/style.css',array('bootstrap','slicknav','moina-default-block','moina-style'), '', 'all');
    wp_enqueue_style( 'moina-wp-main-style',get_stylesheet_directory_uri() . '/assets/css/main-style.css',array(), MOINA_WP_VERSION, 'all');
}
add_action( 'wp_enqueue_scripts', 'moina_wp_scripts' );

/**
 * Custom excerpt length.
 */
function moina_wp_excerpt_length( $length ) {
    if ( is_admin() ) return $length;
    return 36;
}
add_filter( 'excerpt_length', 'moina_wp_excerpt_length', 999 );