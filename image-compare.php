<?php
/**
 * Plugin Name: Image Compare
 * Description: This is elementor image comparison plugin.It's help you to compare between two image.
 * Plugin URI:  https://github.com/habibur899/image-compare
 * Version:     1.0.0
 * Author:      Habibur Rahaman
 * Author URI:  https://github.com/habibur899
 * Text Domain: image-compare
 *
 * Elementor tested up to: 3.8.0
 * Elementor Pro tested up to: 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function image_compare_elementor_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/plugin.php' );

	// Run the plugin
	\Elementor_Image_Compare_Addon\Elementor_Image_Compare::instance();

}

add_action( 'plugins_loaded', 'image_compare_elementor_addon' );
