<?php
/**
 * Theme Switch element
 *
 * @package Kenta
 */

use LottaFramework\Customizer\Controls\ColorPicker;
use LottaFramework\Customizer\Controls\Icons;
use LottaFramework\Customizer\Controls\ImageUploader;
use LottaFramework\Customizer\Controls\Separator;
use LottaFramework\Customizer\Controls\Tabs;
use LottaFramework\Customizer\Controls\Toggle;
use LottaFramework\Customizer\GenericBuilder\Element;
use LottaFramework\Facades\CZ;
use LottaFramework\Icons\IconsManager;
use LottaFramework\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if ( ! class_exists( 'Kenta_Theme_Switch_Element' ) ) {

	class Kenta_Theme_Switch_Element extends Element {

		use Kenta_Icon_Button_Controls;

		/**
		 * {@inheritDoc}
		 */
		public function getControls() {

			return [
				( new Tabs() )
					->setActiveTab( 'scheme' )
					->addTab( 'scheme', __( 'Dark Scheme', 'kenta' ), [
						( new ColorPicker( 'kenta_dark_primary_color' ) )
							->setLabel( __( 'Primary Color', 'kenta' ) )
							->enableAlpha()
							->setSwatches( [] )
							->asyncColors( '[data-kenta-theme="dark"]', [
								'default' => '--kenta-dark-primary-color',
								'active'  => '--kenta-dark-primary-active',
							] )
							->addColor( 'default', __( 'Default', 'kenta' ), \LottaFramework\Css::INITIAL_VALUE )
							->addColor( 'active', __( 'Active', 'kenta' ), \LottaFramework\Css::INITIAL_VALUE )
						,
						( new ColorPicker( 'kenta_dark_accent_color' ) )
							->setLabel( __( 'Accent Color', 'kenta' ) )
							->enableAlpha()
							->setSwatches( [] )
							->asyncColors( '[data-kenta-theme="dark"]', [
								'default' => '--kenta-dark-accent-color',
								'active'  => '--kenta-dark-accent-active',
							] )
							->addColor( 'default', __( 'Default', 'kenta' ), '#fefefe' )
							->addColor( 'active', __( 'Active', 'kenta' ), '#c2c3c8' )
						,
						( new ColorPicker( 'kenta_dark_base_color' ) )
							->setLabel( __( 'Base Color', 'kenta' ) )
							->enableAlpha()
							->setSwatches( [] )
							->asyncColors( '[data-kenta-theme="dark"]', [
								'default' => '--kenta-dark-base-color',
								'100'     => '--kenta-dark-base-100',
								'200'     => '--kenta-dark-base-200',
								'300'     => '--kenta-dark-base-300',
							] )
							->addColor( '300', __( 'Base 300', 'kenta' ), '#656571' )
							->addColor( '200', __( 'Base 200', 'kenta' ), '#484852' )
							->addColor( '100', __( 'Base 100', 'kenta' ), '#32323a' )
							->addColor( 'default', __( 'Base Color', 'kenta' ), '#26262d' )
						,

						( new Separator() ),
						( new Toggle( 'kenta_default_dark_scheme' ) )
							->setLabel( __( 'Use Dark Scheme As Default', 'kenta' ) )
							->closeByDefault()
						,
						( new Toggle( 'kenta_save_color_scheme' ) )
							->setLabel( __( 'Save User Color Scheme', 'kenta' ) )
							->setDescription( __( "Save the user's color scheme to the cookie and refresh the page without losing current color scheme.", 'kenta' ) )
							->openByDefault()
						,
						( new Toggle( 'kenta_enable_dark_scheme_logo' ) )
							->setLabel( __( 'Logo For Dark Scheme', 'kenta' ) )
							->selectiveRefresh( '.kenta-site-header', 'kenta_header_render' )
							->closeByDefault()
						,
						( new \LottaFramework\Customizer\Controls\Condition() )
							->setCondition( [ 'kenta_enable_dark_scheme_logo' => 'yes' ] )
							->setControls( [
								( new ImageUploader( 'kenta_dark_scheme_logo' ) )
									->setLabel( __( 'Logo', 'kenta' ) )
									->setDefaultValue( '' )
									->selectiveRefresh( '.kenta-site-header', 'kenta_header_render' )
								,
							] )
					] )
					->addTab( 'icon', __( 'Icon', 'kenta' ), array_merge( [
						( new Icons( $this->getSlug( 'light_icon' ) ) )
							->setLabel( __( 'Light Icon', 'kenta' ) )
							->selectiveRefresh( ...$this->selectiveRefresh() )
							->setDefaultValue( [
								'value'   => 'fas fa-sun',
								'library' => 'fa-solid',
							] )
						,
						( new Icons( $this->getSlug( 'dark_icon' ) ) )
							->setLabel( __( 'Dark Icon', 'kenta' ) )
							->selectiveRefresh( ...$this->selectiveRefresh() )
							->setDefaultValue( [
								'value'   => 'fas fa-moon',
								'library' => 'fa-solid',
							] )
						,
						( new Separator() ),
					],
						$this->getIconControls( [
							'render-callback' => $this->selectiveRefresh(),
							'selector'        => ".{$this->slug}"
						] ),
						$this->getIconStyleControls( [
							'selector' => ".{$this->slug}"
						] )
					) )
			];
		}

		/**
		 * {@inheritDoc}
		 */
		public function enqueue_frontend_scripts() {
			// Add button dynamic css
			add_filter( 'kenta_filter_dynamic_css', function ( $css ) {
				$css[".{$this->slug}"] = $this->getIconButtonCss();

				return $css;
			} );
		}

		/**
		 * {@inheritDoc}
		 */
		public function render( $attrs = [] ) {
			$preset = $this->getIconButtonPreset( CZ::get( $this->getSlug( 'icon_button_preset' ) ) );
			$shape  = CZ::get( $this->getSlug( 'icon_button_icon_shape' ), $preset );
			$fill   = CZ::get( $this->getSlug( 'icon_button_shape_fill_type' ), $preset );

			$attrs['class'] = Utils::clsx( [
				'kenta-theme-switch',
				'kenta-icon-button',
				'kenta-icon-button-' . $shape,
				'kenta-icon-button-' . $fill => $shape !== 'none',
				$this->slug
			], $attrs['class'] ?? [] );

			foreach ( $attrs as $attr => $value ) {
				$this->add_render_attribute( 'theme-switch', $attr, $value );
			}
			?>
            <button type="button" <?php $this->print_attribute_string( 'theme-switch' ); ?>>
	            <span class="light-mode">
				<?php IconsManager::print( CZ::get( $this->getSlug( 'light_icon' ) ) ); ?>
	            </span>
                <span class="dark-mode">
				<?php IconsManager::print( CZ::get( $this->getSlug( 'dark_icon' ) ) ); ?>
	            </span>
            </button>
			<?php
		}
	}
}
