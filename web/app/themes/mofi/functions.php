<?php
/**
 * Mofi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Mofi
 * @since Mofi 1.0
 */


if ( ! function_exists( 'mofi_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Mofi 1.0
	 *
	 * @return void
	 */
	function mofi_support() {

		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );
		add_editor_style( '/assets/css/layout.min.css' );

	}

endif;

add_action( 'after_setup_theme', 'mofi_support' );

if ( ! function_exists( 'mofi_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Mofi 1.0
	 *
	 * @return void
	 */
	function mofi_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'mofi-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'mofi-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'mofi_styles' );

if ( ! function_exists( 'mofi_editor_styles' ) ) :

	/**
	 * Enqueue editor styles.
	 *
	 * @since Mofi 1.0
	 *
	 * @return void
	 */
	function mofi_editor_styles() {
		//add_editor_style( 'editor-style.css' );
	}

endif;

add_action( 'admin_init', 'mofi_editor_styles' );

if ( ! function_exists( 'mofi_editor_scripts' ) ) :
	function mofi_editor_scripts() {
		wp_enqueue_script(
			'mofi-block-script',
			get_template_directory_uri() . '/assets/js/editor.js',
			[
			  'wp-blocks',
			  'wp-dom-ready',
			  'wp-edit-post',
			  'wp-i18n'
			],
			filemtime(get_template_directory() . '/assets/js/editor.js')
		);
	}
endif;

add_action('enqueue_block_editor_assets', 'mofi_editor_scripts' );

require_once get_template_directory() . '/inc/block-styles.php';