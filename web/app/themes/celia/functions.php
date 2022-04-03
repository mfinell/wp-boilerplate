<?php

if ( ! function_exists( 'celia_get_version_string' ) ) :
	function celia_get_version_string( $path ) {
		$theme_version = wp_get_theme()->get( 'Version' );
		return WP_ENV === 'development' ? filemtime( $path ) : ( is_string( $theme_version ) ? $theme_version : false );
	}
endif;

if ( ! function_exists( 'celia_scripts' ) ) :
/**
 * Enqueue scripts.
 *
 * @since Celia 1.0
 *
 * @return void
 */
function celia_scripts() {
	// Register theme stylesheet.
	wp_register_style(
		'celia-style',
		get_stylesheet_uri(), //. '/style.css',
		[],
		celia_get_version_string( get_stylesheet_directory() . '/style.css' )
	);

	// Enqueue theme stylesheet.
	wp_enqueue_style( 'celia-style' );

	wp_enqueue_script(
		'celia-script', 
		get_stylesheet_directory_uri() . '/assets/js/script.js', 
		[],
		celia_get_version_string( get_stylesheet_directory() . '/assets/js/script.js' ), 
		true 
	);
}

endif;

add_action( 'wp_enqueue_scripts', 'celia_scripts' );