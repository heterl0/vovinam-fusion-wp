<?php
/**
 * Customizer settings default value
 *
 * @package Kenta Yoga Coach
 */

if ( ! function_exists( 'kenta_yoga_coach_return_yes' ) ) {
	function kenta_yoga_coach_return_yes() {
		return 'yes';
	}
}

if ( ! function_exists( 'kenta_yoga_coach_return_no' ) ) {
	function kenta_yoga_coach_return_no() {
		return 'no';
	}
}

// Disable site wrap by default
add_filter( 'kenta_enable_site_wrap_default_value', 'kenta_yoga_coach_return_no' );

//
// Sidebar
//
add_filter( 'kenta_post_sidebar_section_default_value', 'kenta_yoga_coach_return_no' );
add_filter( 'kenta_archive_sidebar_section_default_value', 'kenta_yoga_coach_return_no' );

//
// Default color preset
//

if ( ! function_exists( 'kenta_yoga_coach_default_color_presets' ) ) {
	function kenta_yoga_coach_default_color_presets() {
		return 'kenta-yoga-coach';
	}
}
add_filter( 'kenta_color_palettes_default_value', 'kenta_yoga_coach_default_color_presets' );

if ( ! function_exists( 'kenta_yoga_coach_color_presets' ) ) {
	function kenta_yoga_coach_color_presets( $presets ) {
		$presets['kenta-yoga-coach'] = array(
			'kenta-primary-color'  => '#0f766e',
			'kenta-primary-active' => '#0d9488',
			'kenta-accent-color'   => '#181f28',
			'kenta-accent-active'  => '#334155',
			'kenta-base-300'       => '#e2e8f0',
			'kenta-base-200'       => '#f1f5f9',
			'kenta-base-100'       => '#f8fafc',
			'kenta-base-color'     => '#ffffff',
		);

		return $presets;
	}
}
add_filter( 'kenta_filter_color_presets', 'kenta_yoga_coach_color_presets' );

//
// Dark color preset
//
if ( ! function_exists( 'kenta_yoga_coach_dark_base_color' ) ) {
	function kenta_yoga_coach_dark_base_color() {
		return [
			'300'     => '#455268',
			'200'     => '#2d3642',
			'100'     => '#262c36',
			'default' => '#1c202b',
		];
	}
}
add_filter( 'kenta_dark_base_color_default_value', 'kenta_yoga_coach_dark_base_color' );

//
// Global typography
//
if ( ! function_exists( 'kenta_yoga_coach_global_typography' ) ) {
	function kenta_yoga_coach_global_typography() {
		return [
			'family'   => 'pt-sans-caption',
			'fontSize' => '16px',
			'variant'  => '400',
		];
	}
}
add_filter( 'kenta_site_global_typography_default_value', 'kenta_yoga_coach_global_typography' );

//
// Preloader
//
if ( ! function_exists( 'kenta_yoga_coach_preloader_preset' ) ) {
	function kenta_yoga_coach_preloader_preset() {
		return 'preset-5';
	}
}
add_filter( 'kenta_preloader_preset_default_value', 'kenta_yoga_coach_preloader_preset' );

//
// Social Networks
//
if ( ! function_exists( 'kenta_yoga_coach_social_networks' ) ) {
	function kenta_yoga_coach_social_networks() {
		return [
			[
				'visible'  => true,
				'settings' => [
					'color' => [ 'official' => '#557dbc' ],
					'label' => 'Facebook',
					'url'   => '',
					'share' => 'https://www.facebook.com/sharer/sharer.php?u={url}',
					'icon'  => [ 'value' => 'fab fa-facebook', 'library' => 'fa-brands' ]
				],
			],
			[
				'visible'  => true,
				'settings' => [
					'color' => [ 'official' => '#7acdee' ],
					'label' => 'Twitter',
					'url'   => '',
					'share' => 'https://twitter.com/share?url={url}&text={text}',
					'icon'  => [ 'value' => 'fab fa-twitter', 'library' => 'fa-brands' ]
				],
			],
			[
				'visible'  => true,
				'settings' => [
					'color' => [ 'official' => '#ed1376' ],
					'label' => 'Instagram',
					'url'   => '',
					'icon'  => [ 'value' => 'fab fa-instagram', 'library' => 'fa-brands' ]
				],
			],
			[
				'visible'  => true,
				'settings' => [
					'color' => [ 'official' => '#f42e53' ],
					'label' => 'Tiktok',
					'url'   => '',
					'icon'  => [ 'value' => 'fab fa-tiktok', 'library' => 'fa-brands' ]
				],
			],
		];
	}
}
add_filter( 'kenta_social_networks_default_value', 'kenta_yoga_coach_social_networks' );

//
// Archive
//
if ( ! function_exists( 'kenta_yoga_coach_archive_structure' ) ) {
	function kenta_yoga_coach_archive_structure() {
		return [
			[ 'id' => 'thumbnail', 'visible' => true ],
			[ 'id' => 'categories', 'visible' => true ],
			[ 'id' => 'title', 'visible' => true ],
			[ 'id' => 'metas', 'visible' => true ],
			[ 'id' => 'excerpt', 'visible' => true ],
		];
	}
}
add_filter( 'kenta_card_structure_default_value', 'kenta_yoga_coach_archive_structure' );

if ( ! function_exists( 'kenta_yoga_coach_entry_tax_style' ) ) {
	function kenta_yoga_coach_entry_tax_style() {
		return 'badge';
	}
}
add_filter( 'kenta_entry_tax_style_cats_default_value', 'kenta_yoga_coach_entry_tax_style' );

// archive header
if ( ! function_exists( 'kenta_yoga_coach_archive_header_background' ) ) {
	function kenta_yoga_coach_archive_header_background() {
		return [
			'type'  => 'color',
			'color' => 'var(--kenta-base-color)'
		];
	}
}
add_filter( 'kenta_archive_header_background_default_value', 'kenta_yoga_coach_archive_header_background' );

if ( ! function_exists( 'kenta_yoga_coach_archive_title_color' ) ) {
	function kenta_yoga_coach_archive_title_color() {
		return [ 'initial' => 'var(--kenta-accent-color)' ];
	}
}
add_filter( 'kenta_archive_title_color_default_value', 'kenta_yoga_coach_archive_title_color' );

if ( ! function_exists( 'kenta_yoga_coach_archive_description_color' ) ) {
	function kenta_yoga_coach_archive_description_color() {
		return [ 'initial' => 'var(--kenta-accent-active)' ];
	}
}
add_filter( 'kenta_archive_description_color_default_value', 'kenta_yoga_coach_archive_description_color' );

//
// Header elements
//

if ( ! function_exists( 'kenta_yoga_coach_header_primary_row_elements' ) ) {
	function kenta_yoga_coach_header_primary_row_elements() {
		return [
			'desktop' => [
				[
					'elements' => [ 'logo' ],
					'settings' => [ 'width' => '20%' ]
				],
				[
					'elements' => [ 'menu-1' ],
					'settings' => [ 'width' => '60%', 'justify-content' => 'center', 'elements-gap' => '16px' ]
				],
				[
					'elements' => [ 'socials', 'theme-switch', 'search' ],
					'settings' => [ 'width' => '20%', 'justify-content' => 'flex-end', 'elements-gap' => '16px' ]
				],
			],
			'mobile'  => [
				[
					'elements' => [ 'logo' ],
					'settings' => [ 'width' => '70%', ]
				],
				[
					'elements' => [ 'socials', 'theme-switch', 'search', 'trigger' ],
					'settings' => [ 'width' => '30%', 'justify-content' => 'flex-end', 'elements-gap' => '16px' ]
				],
			],
		];
	}
}
add_filter( 'kenta_header_primary_row_default_value', 'kenta_yoga_coach_header_primary_row_elements' );

if ( ! function_exists( 'kenta_yoga_coach_header_socials_icons_color_type' ) ) {
	function kenta_yoga_coach_header_socials_icons_color_type() {
		return 'custom';
	}
}
add_filter( 'kenta_header_el_socials_icons_color_type_default_value', 'kenta_yoga_coach_header_socials_icons_color_type' );

if ( ! function_exists( 'kenta_yoga_coach_builder_row_border' ) ) {
	function kenta_yoga_coach_builder_row_border() {
		return [
			'width' => 1,
			'style' => 'solid',
			'color' => 'var(--kenta-base-300)',
		];
	}
}

// theme switch element
if ( ! function_exists( 'kenta_yoga_coach_theme_switch_icon' ) ) {
	function kenta_yoga_coach_theme_switch_icon() {
		return [
			'value'   => 'fas fa-circle-half-stroke',
			'library' => 'fa-solid',
		];
	}
}
add_filter( 'kenta_header_el_theme_switch_light_icon_default_value', 'kenta_yoga_coach_theme_switch_icon' );
add_filter( 'kenta_header_el_theme_switch_dark_icon_default_value', 'kenta_yoga_coach_theme_switch_icon' );

// search element
if ( ! function_exists( 'kenta_yoga_coach_search_icon' ) ) {
	function kenta_yoga_coach_search_icon() {
		return [
			'value'   => 'fas fa-q',
			'library' => 'fa-solid'
		];
	}
}
add_filter( 'kenta_header_el_search_icon_button_icon_default_value', 'kenta_yoga_coach_search_icon' );

// logo element
if ( ! function_exists( 'kenta_yoga_coach_header_logo_title_typography' ) ) {
	function kenta_yoga_coach_header_logo_title_typography() {
		return [
			'family'        => 'pt-serif',
			'fontSize'      => '18px',
			'variant'       => '700',
			'lineHeight'    => '1.5',
			'textTransform' => 'uppercase',
		];
	}
}
add_filter( 'kenta_header_el_logo_site_title_typography_default_value', 'kenta_yoga_coach_header_logo_title_typography' );

//
// Sticky header
//
add_filter( 'kenta_sticky_header_default_value', 'kenta_yoga_coach_return_yes' );

if ( ! function_exists( 'kenta_yoga_coach_sticky_header_shadow' ) ) {
	function kenta_yoga_coach_sticky_header_shadow() {
		return [
			'enable'     => 'yes',
			'horizontal' => '0px',
			'vertical'   => '10px',
			'blur'       => '10px',
			'spread'     => '0px',
			'color'      => 'rgba(44,62,80,0.05)',
		];
	}
}
add_filter( 'kenta_sticky_header_shadow_default_value', 'kenta_yoga_coach_sticky_header_shadow' );
