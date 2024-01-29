<?php
/**
 * Colors customizer section
 *
 * @package Kenta
 */

use LottaFramework\Customizer\Controls\CallToAction;
use LottaFramework\Customizer\Controls\ColorPalettes;
use LottaFramework\Customizer\Controls\ColorPicker;
use LottaFramework\Customizer\Controls\Separator;
use LottaFramework\Customizer\Controls\Toggle;
use LottaFramework\Customizer\Section;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Kenta_Colors_Section' ) ) {

	class Kenta_Colors_Section extends Section {

		/**
		 * {@inheritDoc}
		 */
		public function getControls() {
			$palettes = ( new ColorPalettes( 'kenta_color_palettes', [
				'kenta-primary-color'  => __( 'Primary Color', 'kenta' ),
				'kenta-primary-active' => __( 'Primary Active', 'kenta' ),
				'kenta-accent-color'   => __( 'Accent Color', 'kenta' ),
				'kenta-accent-active'  => __( 'Accent Active', 'kenta' ),
				'kenta-base-color'     => __( 'Base Color', 'kenta' ),
				'kenta-base-50'        => __( 'Base 50', 'kenta' ),
				'kenta-base-100'       => __( 'Base 100', 'kenta' ),
				'kenta-base-200'       => __( 'Base 200', 'kenta' ),
				'kenta-base-300'       => __( 'Base 300', 'kenta' ),
			] ) )
				->setLabel( __( 'Color Presets', 'kenta' ) )
				->setDefaultValue( 'preset-1' );

			foreach ( kenta_color_presets() as $id => $preset ) {
				$palettes->addPalette( $id, $preset );
			}

			return [
				$palettes,
				( new ColorPicker( 'kenta_primary_color' ) )
					->setLabel( __( 'Primary Color', 'kenta' ) )
					->enableAlpha()
					->setSwatches( [] )
					->asyncColors( '[data-kenta-theme="light"]', [
						'default' => '--kenta-primary-color',
						'active'  => '--kenta-primary-active',
					] )
					->addColor( 'default', __( 'Default', 'kenta' ), 'var(--kenta-primary-color)' )
					->addColor( 'active', __( 'Active', 'kenta' ), 'var(--kenta-primary-active)' )
				,
				( new ColorPicker( 'kenta_accent_color' ) )
					->setLabel( __( 'Accent Color', 'kenta' ) )
					->enableAlpha()
					->setSwatches( [] )
					->asyncColors( '[data-kenta-theme="light"]', [
						'default' => '--kenta-accent-color',
						'active'  => '--kenta-accent-active',
					] )
					->addColor( 'default', __( 'Default', 'kenta' ), 'var(--kenta-accent-color)' )
					->addColor( 'active', __( 'Active', 'kenta' ), 'var(--kenta-accent-active)' )
				,
				( new ColorPicker( 'kenta_base_color' ) )
					->setLabel( __( 'Base Color', 'kenta' ) )
					->enableAlpha()
					->setSwatches( [] )
					->asyncColors( '[data-kenta-theme="light"]', [
						'default' => '--kenta-base-color',
						'100'     => '--kenta-base-100',
						'200'     => '--kenta-base-200',
						'300'     => '--kenta-base-300',
					] )
					->addColor( '300', __( 'Base 300', 'kenta' ), 'var(--kenta-base-300)' )
					->addColor( '200', __( 'Base 200', 'kenta' ), 'var(--kenta-base-200)' )
					->addColor( '100', __( 'Base 100', 'kenta' ), 'var(--kenta-base-100)' )
					->addColor( 'default', __( 'Base Color', 'kenta' ), 'var(--kenta-base-color)' )
				,
				( new Separator( 'kenta_dark_color_palette_separator' ) ),
				( new CallToAction( 'kenta_edit_color_preset_for_dark_mode' ) )
					->setLabel( __( 'Edit Color Preset For Dark Mode', 'kenta' ) )
					->displayAsButton()
					->expandCustomize( 'kenta_header:theme-switch' )
				,
				kenta_docs_control(
					__( '%sRead Colors Documentation%s', 'kenta' ),
					'https://kentatheme.com/docs/kenta-theme/general-theme-options/colors/',
					'kenta_colors_doc'
				)->hideBackground(),
				( new Separator( 'kenta_gutenberg_color_palette_separator' ) ),
				( new Toggle( 'kenta_color_palette_in_gutenberg' ) )
					->setLabel( __( 'Use Colors in Gutenberg Editor', 'kenta' ) )
					->setDescription( __( "This option allow you to replace the original Gutenberg's color palette with the colors you defined above.", 'kenta' ) )
					->openByDefault()
				,
			];
		}
	}
}

