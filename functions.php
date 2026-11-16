<?php
/**
 * Theme setup for Urbique.
 *
 * @package Urbique
 * @author  Chand Parvani <chandparvani93@gmail.com>
 */

if ( ! function_exists( 'urbique_setup' ) ) {
	/**
	 * Set up theme defaults.
	 *
	 * @return void
	 */
	function urbique_setup() {
		load_theme_textdomain( 'urbique', get_template_directory() . '/languages' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'style.css' );
	}
}
add_action( 'after_setup_theme', 'urbique_setup' );

/**
 * Register a small set of semantic block style variations.
 *
 * @return void
 */
function urbique_register_block_styles() {
	register_block_style(
		'core/group',
		array(
			'name'  => 'outline',
			'label' => __( 'Outline', 'urbique' ),
		)
	);
	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'eyebrow',
			'label' => __( 'Eyebrow', 'urbique' ),
		)
	);
}
add_action( 'init', 'urbique_register_block_styles' );


/**
 * Enqueue theme stylesheet on the frontend.
 *
 * @return void
 */
function urbique_enqueue_styles() {
	$style_path = get_stylesheet_directory() . '/style.css';

	wp_enqueue_style(
		'urbique-style',
		get_stylesheet_uri(),
		array(),
		file_exists( $style_path ) ? filemtime( $style_path ) : wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'urbique_enqueue_styles' );
