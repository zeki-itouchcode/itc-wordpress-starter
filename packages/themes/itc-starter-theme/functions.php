<?php
/** ITC Starter Theme assets. */

function itc_starter_theme_setup(): void {
	add_theme_support( 'editor-styles' );
	if ( file_exists( get_theme_file_path( 'build/style-index.css' ) ) ) {
		add_editor_style( 'build/style-index.css' );
	}
}
add_action( 'after_setup_theme', 'itc_starter_theme_setup' );

/** Load a generated entry and its WordPress dependency manifest. */
function itc_starter_theme_enqueue_entry( string $entry ): void {
	$asset_path = get_theme_file_path( 'build/' . $entry . '.asset.php' );
	$script_path = get_theme_file_path( 'build/' . $entry . '.js' );
	if ( ! is_file( $asset_path ) || ! is_file( $script_path ) ) {
		return;
	}
	$asset = require $asset_path;
	wp_enqueue_script( 'itc-starter-' . $entry, get_theme_file_uri( 'build/' . $entry . '.js' ), $asset['dependencies'], $asset['version'], true );
}

function itc_starter_theme_frontend_assets(): void {
	$css = get_theme_file_path( 'build/style-index.css' );
	if ( is_file( $css ) ) {
		wp_enqueue_style( 'itc-starter-theme', get_theme_file_uri( 'build/style-index.css' ), [], (string) filemtime( $css ) );
	}
	itc_starter_theme_enqueue_entry( 'index' );
}
add_action( 'wp_enqueue_scripts', 'itc_starter_theme_frontend_assets' );

function itc_starter_theme_editor_assets(): void {
	$css = get_theme_file_path( 'build/editor.css' );
	if ( is_file( $css ) ) {
		wp_enqueue_style( 'itc-starter-editor', get_theme_file_uri( 'build/editor.css' ), [], (string) filemtime( $css ) );
	}
	itc_starter_theme_enqueue_entry( 'editor' );
}
add_action( 'enqueue_block_editor_assets', 'itc_starter_theme_editor_assets' );
