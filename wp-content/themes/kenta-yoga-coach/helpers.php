<?php
/**
 * Template helpers
 *
 * @package Kenta Yoga Coach
 */

if ( ! function_exists( 'kenta_yoga_coach_asset_url' ) ) {
	/**
	 * Get template assets file url
	 *
	 * @param $asset
	 *
	 * @return string
	 */
	function kenta_yoga_coach_asset_url( $asset ) {
		return KENTA_YOGA_COACH_ASSETS_URL . $asset;
	}
}

if ( ! function_exists( 'kenta_yoga_coach_pattern_markup' ) ) {
	/**
	 * Get pattern markup
	 *
	 * @param $name
	 * @param array $args
	 *
	 * @return false|string
	 */
	function kenta_yoga_coach_pattern_markup( $name, $args = array() ) {
		extract( $args );

		ob_start();
		include KENTA_YOGA_COACH_PATH . 'template-parts/patterns/' . sanitize_title( $name ) . '.php';

		return ob_get_clean();
	}
}

if ( ! function_exists( 'kenta_yoga_coach_starter_template' ) ) {
	/**
	 * Get pattern markup
	 *
	 * @param $name
	 *
	 * @return false|string
	 */
	function kenta_yoga_coach_starter_template( $name ) {
		ob_start();
		include KENTA_YOGA_COACH_PATH . 'template-parts/starter-templates/' . sanitize_title( $name ) . '.php';

		return ob_get_clean();
	}
}
