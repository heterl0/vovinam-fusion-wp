<?php
/**
 * Skeleton FSE : Block Patterns
 *
 * @since Skeleton FSE 1.0
 */

function skeleton_fse_register_block_patterns() {
	$block_pattern_categories = array(
		'skeleton-fse' => array( 'label' => __( 'Skeleton FSE', 'skeleton-fse' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Skeleton FSE 1.0
	 *
	 */
	$block_pattern_categories = apply_filters( 'skeleton_fse_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties ); // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_pattern_category
		}
	}

	$block_patterns = array(
		'skeleton-fse-header',	
		'skeleton-fse-hero-banner',
		'skeleton-fse-section1',
		'skeleton-fse-section2',
		'skeleton-fse-section3',
		'skeleton-fse-section4',
		'skeleton-fse-section6',
		'skeleton-fse-footer',	
		 
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Skeleton FSE 1.0
	 * 
	 * @param array $block_patterns List of block patterns by name.
	 *
	 */
	$block_patterns = apply_filters( 'skeleton_fse_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/includes/patterns/' . $block_pattern . '.php' );

		register_block_pattern( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_pattern
			'skeleton-fse/' . $block_pattern,
			require $pattern_file // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		);
	}
}
add_action( 'init', 'skeleton_fse_register_block_patterns', 9 );
