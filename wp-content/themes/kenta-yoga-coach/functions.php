<?php
/**
 * Theme functions
 *
 * @package Kenta Yoga Coach
 */

// don't call the file directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'KENTA_YOGA_COACH_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'KENTA_YOGA_COACH_VERSION', '1.0.0' );
}

if ( ! defined( 'KENTA_YOGA_COACH_PATH' ) ) {
	define( 'KENTA_YOGA_COACH_PATH', trailingslashit( get_stylesheet_directory() ) );
}

if ( ! defined( 'KENTA_YOGA_COACH_URL' ) ) {
	define( 'KENTA_YOGA_COACH_URL', trailingslashit( get_stylesheet_directory_uri() ) );
}

if ( ! defined( 'KENTA_YOGA_COACH_ASSETS_URL' ) ) {
	define( 'KENTA_YOGA_COACH_ASSETS_URL', KENTA_YOGA_COACH_URL . 'assets/' );
}

// Helper functions
require_once KENTA_YOGA_COACH_PATH . 'helpers.php';
// Customizer settings hook
require_once KENTA_YOGA_COACH_PATH . 'customizer.php';

//
// One click demo import
//
if ( ! function_exists( 'kenta_yoga_coach_demo_slug' ) ) {
	function kenta_yoga_coach_demo_slug() {
		return 'yoga-coach';
	}
}
add_filter( 'kenta_welcome_demo_slug', 'kenta_yoga_coach_demo_slug' );

if ( ! function_exists( 'kenta_yoga_coach_demo_name' ) ) {
	function kenta_yoga_coach_demo_name() {
		return __( 'Yoga Coach', 'kenta-yoga-coach' );
	}
}
add_filter( 'kenta_welcome_demo_name', 'kenta_yoga_coach_demo_name' );

if ( ! function_exists( 'kenta_yoga_coach_demo_screenshot' ) ) {
	function kenta_yoga_coach_demo_screenshot() {
		return KENTA_YOGA_COACH_URL . 'screenshot.png';
	}
}
add_filter( 'kenta_welcome_demo_screenshot', 'kenta_yoga_coach_demo_screenshot' );

//
// Dynamic css cache
//
if ( ! function_exists( 'kenta_yoga_coach_cache_key' ) ) {
	function kenta_yoga_coach_cache_key() {
		return 'kenta_yoga_coach_dynamic_css';
	}
}
add_filter( 'kenta_filter_dynamic_css_cache_key', 'kenta_yoga_coach_cache_key' );

if ( ! function_exists( 'kenta_yoga_coach_cache_version' ) ) {
	function kenta_yoga_coach_cache_version() {
		return KENTA_YOGA_COACH_VERSION;
	}
}
add_filter( 'kenta_filter_cached_dynamic_css_version', 'kenta_yoga_coach_cache_version' );
