<?php
/**
 * General Customizer options
 *
 * @package Kortez Blog
 */

/**
 * Site Identity
 */
Kirki::add_field( 'kortez-blog', array(
	'label'        => esc_html__( 'Logo Image Width', 'kortez-blog' ),
	'type'         => 'slider',
	'settings'     => 'logo_width',
	'section'      => 'title_tagline',
	'transport'    => 'postMessage',
	'priority'     => '8',
	'default'      => 270,
	'choices'      => array(
		'min'  => 50,
		'max'  => 270,
		'step' => 5,
	),
) );

Kirki::add_field( 'kortez-blog', array(
	'label'        => esc_html__( 'Disable Site Title', 'kortez-blog' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_site_title',
	'section'      => 'title_tagline',
	'priority'     => '10',
	'default'      => false,
) );

Kirki::add_field( 'kortez-blog', array(
	'label'        => esc_html__( 'Disable Site Tagline', 'kortez-blog' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_site_tagline',
	'section'      => 'title_tagline',
	'priority'     => '20',
	'default'      => false,
) );

/**
 * Colors
 */
Kirki::add_field( 'kortez-blog', array(
	'label'        => esc_html__( 'Body Text Color', 'kortez-blog' ),
	'type'         => 'color',
	'settings'     => 'site_body_text_color',
	'section'      => 'colors',
	'default'      => '#333333',
	'priority'     => '20',
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),

) );

Kirki::add_field( 'kortez-blog', array(
	'label'        => esc_html__( 'General Heading Text Color (H1 - H6)', 'kortez-blog' ),
	'type'         => 'color',
	'settings'     => 'site_heading_text_color',
	'section'      => 'colors',
	'default'      => '#030303',
	'priority'     => '30',
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),

) );

/**
 * Sidebar
 */
Kirki::add_section( 'sidebar_options', array(
    'title'          => esc_html__( 'Sidebar', 'kortez-blog' ),
    'capability'     => 'edit_theme_options',
    'priority'       => '98',
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Sidebar Layouts', 'kortez-blog' ),
	'description' => esc_html__( 'Right / Left / Both / None', 'kortez-blog' ),
	'type'        => 'radio-image',
	'settings'    => 'sidebar_settings',
	'section'     => 'sidebar_options',
	'default'     => 'right',
	'choices'  => array(
		'right'      => get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'left'       => get_template_directory_uri() . '/assets/images/left-sidebar.png',
		'right-left' => get_template_directory_uri() . '/assets/images/right-left-sidebar.png',
		'no-sidebar' => get_template_directory_uri() . '/assets/images/no-sidebar.png',
	),
	'priority'	  =>  10,
) );

Kirki::add_field( 'kortez-blog', array(
	'label'        => esc_html__( 'Disable Sticky Position', 'kortez-blog' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_sticky_sidebar',
	'section'      => 'sidebar_options',
	'default'      => false,
	'priority'	   =>  40,
	'active_callback' => array(
		array(
			'setting'  => 'sidebar_settings',
			'operator' => 'contains',
			'value'    => array( 'right', 'left', 'right-left' ),
		),
	),
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Disable Sidebar in Blog Page', 'kortez-blog' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_sidebar_blog_page',
	'section'     => 'sidebar_options',
	'default'     => false,
	'priority'	  =>  50,
	'active_callback' => array(
		array(
			'setting'  => 'sidebar_settings',
			'operator' => 'contains',
			'value'    => array( 'right', 'left', 'right-left' ),
		),
	),
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Disable Sidebar in Single Post', 'kortez-blog' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_sidebar_single_post',
	'section'     => 'sidebar_options',
	'default'     => false,
	'priority'	  =>  60,
	'active_callback' => array(
		array(
			'setting'  => 'sidebar_settings',
			'operator' => 'contains',
			'value'    => array( 'right', 'left', 'right-left' ),
		),
	),
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Disable Sidebar in Page', 'kortez-blog' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_sidebar_page',
	'section'     => 'sidebar_options',
	'default'     => true,
	'priority'	  =>  70,
	'active_callback' => array(
		array(
			'setting'  => 'sidebar_settings',
			'operator' => 'contains',
			'value'    => array( 'right', 'left', 'right-left' ),
		),
	),
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Disable Sidebar in WooCommerce', 'kortez-blog' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_sidebar_woocommerce_page',
	'section'     => 'sidebar_options',
	'default'     => false,
	'priority'	  =>  80,
	'active_callback' => array(
		array(
			'setting'  => 'sidebar_settings',
			'operator' => 'contains',
			'value'    => array( 'right', 'left', 'right-left' ),
		),
	),
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Disable Sidebar in WooCommerce Shop', 'kortez-blog' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_sidebar_woocommerce_shop',
	'section'     => 'sidebar_options',
	'default'     => false,
	'priority'	  =>  90,
	'active_callback' => array(
		array(
			'setting'  => 'sidebar_settings',
			'operator' => 'contains',
			'value'    => array( 'right', 'left', 'right-left' ),
		),
		array(
			'setting'  => 'disable_sidebar_woocommerce_page',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Disable Sidebar in WooCommerce Single Product', 'kortez-blog' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_sidebar_woocommerce_single',
	'section'     => 'sidebar_options',
	'default'     => false,
	'priority'	  =>  100,
	'active_callback' => array(
		array(
			'setting'  => 'sidebar_settings',
			'operator' => 'contains',
			'value'    => array( 'right', 'left', 'right-left' ),
		),
		array(
			'setting'  => 'disable_sidebar_woocommerce_page',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

/**
 * Preloader
 */
Kirki::add_section( 'preloader_options', array(
    'title'          => esc_html__( 'Preloader', 'kortez-blog' ),
    'capability'     => 'edit_theme_options',
    'priority'       => '170',
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Disable Preloading', 'kortez-blog' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_preloader',
	'section'     => 'preloader_options',
	'default'     => false,
	'priority'    => 10,
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Preloading Animations', 'kortez-blog' ),
	'type'        => 'select',
	'settings'    => 'preloader_animation',
	'section'     => 'preloader_options',
	'default'     => 'animation_one',
	'choices'  => array(
		'animation_one'       => esc_html__( 'Animation One', 'kortez-blog' ),
		'animation_two'       => esc_html__( 'Animation Two', 'kortez-blog' ),
		'animation_three'     => esc_html__( 'Animation Three', 'kortez-blog' ),
		'animation_four'      => esc_html__( 'Animation Four', 'kortez-blog' ),
		'animation_five'      => esc_html__( 'Animation Five', 'kortez-blog' ),
	),
	'priority'    => 20,
) );

Kirki::add_field( 'kortez-blog', array(
	'label'        => esc_html__( 'Image Width', 'kortez-blog' ),
	'type'         => 'slider',
	'settings'     => 'preloader_custom_image_width',
	'section'      => 'preloader_options',
	'transport'    => 'postMessage',
	'default'      => 40,
	'choices'      => array(
		'min'  => 10,
		'max'  => 200,
		'step' => 1,
	),
	'priority'    => 30,
) );

/**
 * Breadcrumbs
 */
Kirki::add_section( 'breadcrumbs_options', array(
    'title'          => esc_html__( 'Breadcrumbs', 'kortez-blog' ),
    'capability'     => 'edit_theme_options',
    'priority'       => '180',
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Breadcrumbs', 'kortez-blog' ),
	'type'        => 'select',
	'settings'    => 'breadcrumbs_controls',
	'section'     => 'breadcrumbs_options',
	'default'     => 'show_in_all_page_post',
	'choices'  => array(
		'disable_in_all_pages'     => esc_html__( 'Disable in all Pages Only', 'kortez-blog' ),
		'disable_in_all_page_post' => esc_html__( 'Disable in all Pages & Posts', 'kortez-blog' ),
		'show_in_all_page_post'    => esc_html__( 'Show in all Pages & Posts', 'kortez-blog' ),
	),
	'priority'    => 10,
) );