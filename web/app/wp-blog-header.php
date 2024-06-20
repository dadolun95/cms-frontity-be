<?php
/**
 * Loads the WordPress environment and template.
 *
 * @package WordPress
 */

if ( ! isset( $wp_did_header ) ) {

	$wp_did_header = true;

	// Load the WordPress library.
	require_once __DIR__ . '../wp/wp-load.php';

	// Set up the WordPress query.
	wp();

    require_once __DIR__ . '/functions.php';

	// Load the theme template.
	require_once ABSPATH . '../wp/' . WPINC . '/template-loader.php';

}
