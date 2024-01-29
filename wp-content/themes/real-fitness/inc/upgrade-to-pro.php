<?php
/**
 * Upgrade to pro options
 */
function real_fitness_upgrade_pro_options( $wp_customize ) {

	$wp_customize->add_section(
		'upgrade_premium',
		array(
			'title'    => __( 'About Real Fitness', 'real-fitness' ),
			'priority' => 1,
		)
	);

	class Real_Fitness_Pro_Button_Customize_Control extends WP_Customize_Control {
		public $type = 'upgrade_premium';

		function render_content() {
			?>
			<div class="pro_info">
				<ul>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( REAL_FITNESS_THEME_PAGE ); ?>" target="_blank"><i class="dashicons dashicons-admin-appearance"></i><?php esc_html_e( 'Theme Page', 'real-fitness' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( REAL_FITNESS_SUPPORT ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-lightbulb"></i><?php esc_html_e( 'Support Forum', 'real-fitness' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( REAL_FITNESS_REVIEW ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-star-filled"></i><?php esc_html_e( 'Rate Us', 'real-fitness' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( REAL_FITNESS_PRO_DEMO ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-awards"></i><?php esc_html_e( 'Premium Demo', 'real-fitness' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( REAL_FITNESS_PREMIUM_PAGE ); ?>" target="_blank"><i class="dashicons dashicons-cart"></i><?php esc_html_e( 'Upgrade Pro', 'real-fitness' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( REAL_FITNESS_THEME_DOCUMENTATION ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-visibility"></i><?php esc_html_e( 'Theme Documentation', 'real-fitness' ); ?> </a></li>
				</ul>
			</div>
			<?php
		}
	}

	$wp_customize->add_setting(
		'pro_info_buttons',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'real_fitness_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new Real_Fitness_Pro_Button_Customize_Control(
			$wp_customize,
			'pro_info_buttons',
			array(
				'section' => 'upgrade_premium',
			)
		)
	);
}
add_action( 'customize_register', 'real_fitness_upgrade_pro_options' );
