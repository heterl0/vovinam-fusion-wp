<?php
/**
 * @package Real Fitness
 * Setup the WordPress core custom header feature.
 *
 * @uses real_fitness_header_style()
 */
function real_fitness_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'real_fitness_custom_header_args', array(		
		'default-text-color'     => 'fff',
		'width'                  => 2500,
		'height'                 => 280,
		'wp-head-callback'       => 'real_fitness_header_style',		
	) ) );
}
add_action( 'after_setup_theme', 'real_fitness_custom_header_setup' );

if ( ! function_exists( 'real_fitness_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see real_fitness_custom_header_setup().
 */
function real_fitness_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() || get_header_textcolor() ) :
	?>
		.header {
			background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat;
			background-position: center top;
			background-size:cover;
		}
	<?php endif; ?>	



	h1.site-title a, p.site-title a {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_sitetitle_color')); ?>;
	}

	span.site-description {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_sitetagline_color')); ?>;
	}


	.top_header {
		background: <?php echo esc_attr(get_theme_mod('real_fitness_header_topbg_color')); ?> !important;
	}

	.top_header .fa-phone {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_header_phoneicon_color')); ?>;
	}

	.top_header .text-lg-right .phonetxt {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_header_phonetext_color')); ?>;
	}

	.top_header .fa-envelope {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_header_emailicon_color')); ?>;
	}

	.top_header .text-lg-right .emailtxt{
		color: <?php echo esc_attr(get_theme_mod('real_fitness_header_emailtext_color')); ?>;
	}


	.top_header .fa-clock {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_header_timeicon_color')); ?>;
	}

	.top_header .text-lg-right .timetxt{
		color: <?php echo esc_attr(get_theme_mod('real_fitness_header_timetext_color')); ?>;
	}
	
	.main-nav a {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_header_menu_color')); ?>;
	}

	.header {
    	background: rgba(0, 0, 0, 0) linear-gradient( 130deg , #fff 35%, <?php echo esc_attr(get_theme_mod('real_fitness_header_menubg_color')); ?> 35%) repeat scroll 0 0;
	}

	.main-nav ul ul a {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_header_submenu_color')); ?>;
	}

	.main-nav ul ul {
		background: <?php echo esc_attr(get_theme_mod('real_fitness_header_submenubg_color')); ?> !important;
	}

	.fa-shopping-cart {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_header_shopingcarticon_color')); ?>;
	}

	.product-cart a {
		background: <?php echo esc_attr(get_theme_mod('real_fitness_header_shoppingcartbg_color')); ?>;
	}

	.product-cart span {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_header_shoppingcartnumbertxt_color')); ?>;

	}

	.product-cart span {
		background: <?php echo esc_attr(get_theme_mod('real_fitness_header_shoppingcartnumberbg_color')); ?> !important;

	}





	.slider-box h1 {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_slider_heading_color')); ?>;
	}

	.slider-box h2 {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_slider_title_color')); ?>;
	}

	.slider-box p {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_slider_description_color')); ?>;
	}

	.slide-btn a {
		background: <?php echo esc_attr(get_theme_mod('real_fitness_slider_buttonbg_color')); ?>;
	}

	.slide-btn a:hover {
		background: <?php echo esc_attr(get_theme_mod('real_fitness_slider_buttonbghvr_color')); ?>;
	}

	.slide-btn a {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_slider_buttontitle_color')); ?>;
	}

	.slide-btn i {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_slider_buttonicon_color')); ?>;
	}

	.slide-btn i {
		background: <?php echo esc_attr(get_theme_mod('real_fitness_slider_buttoniconbg_color')); ?>;
	}

	.bg-opacity {
		background: <?php echo esc_attr(get_theme_mod('real_fitness_slider_overlay_color')); ?> !important;
	}

	


	#serives_box h3 {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_service_maintext_color')); ?>;
	}

	p.main_text {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_service_maintitle_color')); ?>;
	}

	.services_inner_box {
		background: <?php echo esc_attr(get_theme_mod('real_fitness_service_boxbg_color')); ?>;
	}

	.services_inner_box {
		border-color: <?php echo esc_attr(get_theme_mod('real_fitness_service_boxborder_color')); ?>;
	}

	.services_inner_box h4 a {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_service_title_color')); ?>;
	} 

	.services_inner_box p {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_service_description_color')); ?>;
	}



	
	.copywrap {
		background: <?php echo esc_attr(get_theme_mod('real_fitness_footer_copyrightbg_color')); ?> !important;
	}

	.copywrap a {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_footer_copyright_color')); ?>;
	}

	.copywrap a:hover {
		color: <?php echo esc_attr(get_theme_mod('real_fitness_footer_copyrighthover_color')); ?>;
	}

	</style>
	<?php 
}
endif;