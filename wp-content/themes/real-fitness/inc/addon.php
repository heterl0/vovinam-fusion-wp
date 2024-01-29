<?php
/*
 * @package Real Fitness
 */

function real_fitness_admin_enqueue_scripts() {
	wp_enqueue_style( 'real-fitness-admin-style', esc_url( get_template_directory_uri() ).'/css/addon.css' );
}
add_action( 'admin_enqueue_scripts', 'real_fitness_admin_enqueue_scripts' );

add_action('after_switch_theme', 'real_fitness_options');

function real_fitness_options () {
	global $pagenow;
	if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
		wp_redirect( admin_url( 'themes.php?page=real-fitness' ) );
		exit;
	}
}

function real_fitness_theme_info_menu_link() {

	$theme = wp_get_theme();
	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'real-fitness' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ),
		esc_html__( 'Theme Info', 'real-fitness' ),'edit_theme_options','real-fitness','real_fitness_theme_info_page'
	);
}
add_action( 'admin_menu', 'real_fitness_theme_info_menu_link' );

function real_fitness_theme_info_page() {

	$theme = wp_get_theme();
	?>
<div class="wrap theme-info-wrap">
	<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'real-fitness' ), esc_html($theme->display( 'Name', 'real-fitness'  )),esc_html($theme->display( 'Version', 'real-fitness' ))); ?>
	</h1>
	<p class="theme-description">
	<?php esc_html_e( 'Do you want to configure this theme? Look no further, our easy-to-follow theme documentation will walk you through it.', 'real-fitness' ); ?>
	</p>
	<hr>
	<div class="important-links clearfix">
		<p><strong><?php esc_html_e( 'Theme Links', 'real-fitness' ); ?>:</strong>
			<a href="<?php echo esc_url( REAL_FITNESS_THEME_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'real-fitness' ); ?></a>
			<a href="<?php echo esc_url( REAL_FITNESS_SUPPORT ); ?>" target="_blank"><?php esc_html_e( 'Contact Us', 'real-fitness' ); ?></a>
			<a href="<?php echo esc_url( REAL_FITNESS_REVIEW ); ?>" target="_blank"><?php esc_html_e( 'Rate This Theme', 'real-fitness' ); ?></a>
			<a href="<?php echo esc_url( REAL_FITNESS_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e( 'Premium Demo', 'real-fitness' ); ?></a>
			<a href="<?php echo esc_url( REAL_FITNESS_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Go To Premium', 'real-fitness' ); ?></a>
			<a href="<?php echo esc_url( REAL_FITNESS_THEME_DOCUMENTATION ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'real-fitness' ); ?></a>
		</p>
	</div>
	<hr>
	<div id="getting-started">
		<h3><?php printf( esc_html__( 'Getting started with %s', 'real-fitness' ), 
		esc_html($theme->display( 'Name', 'real-fitness' ))); ?></h3>
		<div class="columns-wrapper clearfix">
			<div class="column column-half clearfix">
				<div class="section">
					<h4><?php esc_html_e( 'Theme Description', 'real-fitness' ); ?></h4>
					<div class="theme-description-1"><?php echo esc_html($theme->display( 'Description' )); ?></div>
				</div>
			</div>
			<div class="column column-half clearfix">
				<img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" alt=""/>
				<div class="section">
					<h4><?php esc_html_e( 'Theme Options', 'real-fitness' ); ?></h4>
					<p class="about">
					<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'real-fitness' ),esc_html($theme->display( 'Name', 'real-fitness' ))); ?></p>
					<p>
					<a target="_blank" href="<?php echo esc_url( wp_customize_url() ); ?>" class="button button-primary"><?php esc_html_e( 'Customize Theme', 'real-fitness' ); ?></a>
					<a href="<?php echo esc_url( REAL_FITNESS_PREMIUM_PAGE ); ?>" target="_blank" class="button button-secondary premium-btn"><?php esc_html_e( 'Checkout Premium', 'real-fitness' ); ?></a></p>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div id="theme-author">
	  <p><?php
		printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'real-fitness' ),
			esc_html($theme->display( 'Name', 'real-fitness' )),
			'<a target="_blank" href="' . esc_url( 'https://www.theclassictemplates.com/', 'real-fitness' ) . '">classictemplate</a>',
			'<a target="_blank" href="' . esc_url( REAL_FITNESS_REVIEW ) . '" title="' . esc_attr__( 'Rate it', 'real-fitness' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'real-fitness' ) . '</a>'
		)
		?></p>
	</div>
</div>
<?php
}
