<?php
/**
 * Plugin Name: ITC Starter Example
 * Description: Optional example of a plugin with built frontend assets.
 * Version: 1.0.0
 * Requires PHP: 8.3
 * License: MIT
 */

function itc_starter_example_assets(): void {
	$asset_file = __DIR__ . '/build/index.asset.php';
	$script_file = __DIR__ . '/build/index.js';
	$style_file = __DIR__ . '/build/style-index.css';
	if ( is_file( $asset_file ) && is_file( $script_file ) ) {
		$asset = require $asset_file;
		wp_enqueue_script( 'itc-starter-example', plugins_url( 'build/index.js', __FILE__ ), $asset['dependencies'], $asset['version'], true );
	}
	if ( is_file( $style_file ) ) {
		wp_enqueue_style( 'itc-starter-example', plugins_url( 'build/style-index.css', __FILE__ ), [], (string) filemtime( $style_file ) );
	}
}
add_action( 'wp_enqueue_scripts', 'itc_starter_example_assets' );
