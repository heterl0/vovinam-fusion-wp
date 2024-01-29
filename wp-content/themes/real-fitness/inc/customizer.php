<?php
/**
 * Real Fitness Theme Customizer
 *
 * @package Real Fitness
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function real_fitness_customize_register( $wp_customize ) {

	function real_fitness_sanitize_phone_number( $phone ) {
		return preg_replace( '/[^\d+]/', '', $phone );
	}

	function real_fitness_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	wp_enqueue_style('real-fitness-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	//Logo
    $wp_customize->add_setting('real_fitness_logo_width',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'real_fitness_sanitize_integer'
	));
	$wp_customize->add_control(new Real_Fitness_Slider_Custom_Control( $wp_customize, 'real_fitness_logo_width',array(
		'label'	=> esc_html__('Logo Width','real-fitness'),
		'section'=> 'title_tagline',
		'settings'=>'real_fitness_logo_width',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	$wp_customize->add_setting('real_fitness_title_enable',array(
		'default' => true,
		'sanitize_callback' => 'real_fitness_sanitize_checkbox',
	));
	$wp_customize->add_control( 'real_fitness_title_enable', array(
	   'settings' => 'real_fitness_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','real-fitness'),
	   'type'      => 'checkbox'
	));

	// site title color
	$wp_customize->add_setting('real_fitness_sitetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_sitetitle_color', array(
	   'settings' => 'real_fitness_sitetitle_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Title Color', 'real-fitness'),
	   'type'      => 'color'
	));


	$wp_customize->add_setting('real_fitness_tagline_enable',array(
		'default' => false,
		'sanitize_callback' => 'real_fitness_sanitize_checkbox',
	));
	$wp_customize->add_control( 'real_fitness_tagline_enable', array(
	   'settings' => 'real_fitness_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','real-fitness'),
	   'type'      => 'checkbox'
	));

	// site tagline color
	$wp_customize->add_setting('real_fitness_sitetagline_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_sitetagline_color', array(
	   'settings' => 'real_fitness_sitetagline_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Tagline Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// woocommerce section
	$wp_customize->add_section('real_fitness_woocommerce_page_settings', array(
		'title'    => __('WooCommerce Page Settings', 'real-fitness'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    // shop page sidebar alignment
    $wp_customize->add_setting('real_fitness_shop_page_sidebar_position', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'real_fitness_sanitize_choices',
	));
	$wp_customize->add_control('real_fitness_shop_page_sidebar_position',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Sidebar', 'real-fitness'),
		'section'        => 'real_fitness_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'real-fitness'),
			'Right Sidebar' => __('Right Sidebar', 'real-fitness'),
		),
	));

	//Theme Options
	$wp_customize->add_panel( 'real_fitness_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'real-fitness' ),
	) );

	// Header Section
	$wp_customize->add_section('real_fitness_header_section', array(
        'title' => __('Manage Header Section', 'real-fitness'),
		'description' => __('<p class="sec-title">Manage Header Section</p>','real-fitness'),
        'priority' => null,
		'panel' => 'real_fitness_panel_area',
 	));

 	$wp_customize->add_setting('real_fitness_stickyheader',array(
		'default' => false,
		'sanitize_callback' => 'real_fitness_sanitize_checkbox',
	));

	$wp_customize->add_control( 'real_fitness_stickyheader', array(
	   'section'   => 'real_fitness_header_section',
	   'label'	=> __('Check To Show Sticky Header','real-fitness'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('real_fitness_preloader',array(
		'default' => true,
		'sanitize_callback' => 'real_fitness_sanitize_checkbox',
	));

	$wp_customize->add_control( 'real_fitness_preloader', array(
	   'section'   => 'real_fitness_header_section',
	   'label'	=> __('Check to remove preloader','real-fitness'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('real_fitness_top_bar',array(
		'default' => false,
		'sanitize_callback' => 'real_fitness_sanitize_checkbox',
	));

	$wp_customize->add_control( 'real_fitness_top_bar', array(
	   'section'   => 'real_fitness_header_section',
	   'label'	=> __('Check to remove topbar','real-fitness'),
	   'type'      => 'checkbox'
 	));

 	// header topbg Color
	$wp_customize->add_setting('real_fitness_header_topbg_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_header_topbg_color', array(
	   'settings' => 'real_fitness_header_topbg_color',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('Top BG Color', 'real-fitness'),
	   'type'      => 'color'
	));


	$wp_customize->add_setting('real_fitness_phone_number',array(
		'default' => '',
		'sanitize_callback' => 'real_fitness_sanitize_phone_number',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'real_fitness_phone_number', array(
	   'settings' => 'real_fitness_phone_number',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('Add Phone Number', 'real-fitness'),
	   'type'      => 'text'
	));

	// header Phone Icon Color
	$wp_customize->add_setting('real_fitness_header_phoneicon_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_header_phoneicon_color', array(
	   'settings' => 'real_fitness_header_phoneicon_color',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('Phone Icon Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// header Phone text Color
	$wp_customize->add_setting('real_fitness_header_phonetext_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_header_phonetext_color', array(
	   'settings' => 'real_fitness_header_phonetext_color',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('Phone Text Color', 'real-fitness'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('real_fitness_email_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'real_fitness_email_address', array(
	   'settings' => 'real_fitness_email_address',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('Add Email Address', 'real-fitness'),
	   'type'      => 'text'
	));

	// header email Icon Color
	$wp_customize->add_setting('real_fitness_header_emailicon_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_header_emailicon_color', array(
	   'settings' => 'real_fitness_header_emailicon_color',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('Email Icon Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// header email text Color
	$wp_customize->add_setting('real_fitness_header_emailtext_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_header_emailtext_color', array(
	   'settings' => 'real_fitness_header_emailtext_color',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('Email Text Color', 'real-fitness'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('real_fitness_open_time',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'real_fitness_open_time', array(
	   'settings' => 'real_fitness_open_time',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('Add Opening Time', 'real-fitness'),
	   'type'      => 'text'
	));

	// header time Icon Color
	$wp_customize->add_setting('real_fitness_header_timeicon_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_header_timeicon_color', array(
	   'settings' => 'real_fitness_header_timeicon_color',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('Time Icon Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// header time text Color
	$wp_customize->add_setting('real_fitness_header_timetext_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_header_timetext_color', array(
	   'settings' => 'real_fitness_header_timetext_color',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('Time Text Color', 'real-fitness'),
	   'type'      => 'color'
	));


	// header menu Color
	$wp_customize->add_setting('real_fitness_header_menu_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_header_menu_color', array(
	   'settings' => 'real_fitness_header_menu_color',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('Menu Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// header menubg Color
	$wp_customize->add_setting('real_fitness_header_menubg_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_header_menubg_color', array(
	   'settings' => 'real_fitness_header_menubg_color',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('Menu BG Color', 'real-fitness'),
	   'type'      => 'color'
	));


	// header submenu Color
	$wp_customize->add_setting('real_fitness_header_submenu_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_header_submenu_color', array(
	   'settings' => 'real_fitness_header_submenu_color',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('SubMenu Text Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// header submenubg Color
	$wp_customize->add_setting('real_fitness_header_submenubg_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_header_submenubg_color', array(
	   'settings' => 'real_fitness_header_submenubg_color',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('SubMenu BG Color', 'real-fitness'),
	   'type'      => 'color'
	));


	// header shopingcarticon Color
	$wp_customize->add_setting('real_fitness_header_shopingcarticon_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_header_shopingcarticon_color', array(
	   'settings' => 'real_fitness_header_shopingcarticon_color',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('ShoppingCart Icon Color', 'real-fitness'),
	   'type'      => 'color'
	));


	// header shoppingcartbg Color
	$wp_customize->add_setting('real_fitness_header_shoppingcartbg_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_header_shoppingcartbg_color', array(
	   'settings' => 'real_fitness_header_shoppingcartbg_color',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('ShoppingCart BG Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// header shoppingcartnumbertxt Color
	$wp_customize->add_setting('real_fitness_header_shoppingcartnumbertxt_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_header_shoppingcartnumbertxt_color', array(
	   'settings' => 'real_fitness_header_shoppingcartnumbertxt_color',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('ShoppingCart Number Text Color', 'real-fitness'),
	   'type'      => 'color'
	));


	// header shoppingcartnumberbg Color
	$wp_customize->add_setting('real_fitness_header_shoppingcartnumberbg_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_header_shoppingcartnumberbg_color', array(
	   'settings' => 'real_fitness_header_shoppingcartnumberbg_color',
	   'section'   => 'real_fitness_header_section',
	   'label' => __('ShoppingCart Number BG Color', 'real-fitness'),
	   'type'      => 'color'
	));





	// Home Category Dropdown Section
	$wp_customize->add_section('real_fitness_one_cols_section',array(
		'title'	=> __('Manage Slider Section','real-fitness'),
		'description'	=> __('<p class="sec-title">Manage Slider Section</p> Select Category from the Dropdowns for slider, Also use the given image dimension (1600 x 850).','real-fitness'),
		'priority'	=> null,
		'panel' => 'real_fitness_panel_area'
	));



	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'real_fitness_slidersection', array(
		'default'	=> '0',
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Real_Fitness_Category_Dropdown_Custom_Control( $wp_customize, 'real_fitness_slidersection', array(
		'section' => 'real_fitness_one_cols_section',
		'settings'   => 'real_fitness_slidersection',
	) ) );

	$wp_customize->add_setting( 'real_fitness_slider_count', array(
	  	'capability' => 'edit_theme_options',
	  	'sanitize_callback' => 'real_fitness_sanitize_number_absint',
	  	'default' => 1,
	) );

	//Hide Section
	$wp_customize->add_setting('real_fitness_hide_categorysec',array(
		'default' => false,
		'sanitize_callback' => 'real_fitness_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'real_fitness_hide_categorysec', array(
	   'settings' => 'real_fitness_hide_categorysec',
	   'section'   => 'real_fitness_one_cols_section',
	   'label'     => __('Check To Enable This Section','real-fitness'),
	   'type'      => 'checkbox'
	));


	$wp_customize->add_control( 'real_fitness_slider_count', array(
	  	'settings' => 'real_fitness_slider_count',
	  	'type' => 'number',
	  	'section' => 'real_fitness_one_cols_section',
	  	'label' => __( 'Number Of Slide To Show','real-fitness'),
	) );

	$wp_customize->add_setting('real_fitness_button_text',array(
		'default' => 'GET STARTED',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'real_fitness_button_text', array(
	   'settings' => 'real_fitness_button_text',
	   'section'   => 'real_fitness_one_cols_section',
	   'type'      => 'text'
	));

	$wp_customize->add_setting('real_fitness_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'real_fitness_heading', array(
	   'settings' => 'real_fitness_heading',
	   'section'   => 'real_fitness_one_cols_section',
	   'label' => __('Add Heading Text', 'real-fitness'),
	   'type'      => 'text'
	));

	$wp_customize->add_control( 'real_fitness_button_text', array(
	   'settings' => 'real_fitness_button_text',
	   'section'   => 'real_fitness_one_cols_section',
	   'label' => __('Add Button Text', 'real-fitness'),
	   'type'      => 'text'
	));

	// slider heading Color
	$wp_customize->add_setting('real_fitness_slider_heading_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_slider_heading_color', array(
	   'settings' => 'real_fitness_slider_heading_color',
	   'section'   => 'real_fitness_one_cols_section',
	   'label' => __('Heading Color', 'real-fitness'),
	   'type'      => 'color'
	));


	// slider title Color
	$wp_customize->add_setting('real_fitness_slider_title_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_slider_title_color', array(
	   'settings' => 'real_fitness_slider_title_color',
	   'section'   => 'real_fitness_one_cols_section',
	   'label' => __('Title Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// slider description Color
	$wp_customize->add_setting('real_fitness_slider_description_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_slider_description_color', array(
	   'settings' => 'real_fitness_slider_description_color',
	   'section'   => 'real_fitness_one_cols_section',
	   'label' => __('Description Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// slider buttonbg Color
	$wp_customize->add_setting('real_fitness_slider_buttonbg_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_slider_buttonbg_color', array(
	   'settings' => 'real_fitness_slider_buttonbg_color',
	   'section'   => 'real_fitness_one_cols_section',
	   'label' => __('Button BG Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// slider buttonbghvr Color
	$wp_customize->add_setting('real_fitness_slider_buttonbghvr_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_slider_buttonbghvr_color', array(
	   'settings' => 'real_fitness_slider_buttonbghvr_color',
	   'section'   => 'real_fitness_one_cols_section',
	   'label' => __('Button BG Hover Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// slider buttontitle Color
	$wp_customize->add_setting('real_fitness_slider_buttontitle_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_slider_buttontitle_color', array(
	   'settings' => 'real_fitness_slider_buttontitle_color',
	   'section'   => 'real_fitness_one_cols_section',
	   'label' => __('Button Title Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// slider buttonicon Color
	$wp_customize->add_setting('real_fitness_slider_buttonicon_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_slider_buttonicon_color', array(
	   'settings' => 'real_fitness_slider_buttonicon_color',
	   'section'   => 'real_fitness_one_cols_section',
	   'label' => __('Button Icon Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// slider buttoniconbg Color
	$wp_customize->add_setting('real_fitness_slider_buttoniconbg_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_slider_buttoniconbg_color', array(
	   'settings' => 'real_fitness_slider_buttoniconbg_color',
	   'section'   => 'real_fitness_one_cols_section',
	   'label' => __('Button Icon BG Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// slider overlay Color
	$wp_customize->add_setting('real_fitness_slider_overlay_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_slider_overlay_color', array(
	   'settings' => 'real_fitness_slider_overlay_color',
	   'section'   => 'real_fitness_one_cols_section',
	   'label' => __('Overlay Color', 'real-fitness'),
	   'type'      => 'color'
	));






	// Services Section
	$wp_customize->add_section('real_fitness_below_slider_section', array(
		'title'	=> __('Manage Services Section','real-fitness'),
		'description'	=> __('<p class="sec-title">Manage Services Section</p> Select Pages from the dropdown for Services.','real-fitness'),
		'priority'	=> null,
		'panel' => 'real_fitness_panel_area',
	));


	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'real_fitness_services_cat', array(
		'default'	=> '0',
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Real_Fitness_Category_Dropdown_Custom_Control( $wp_customize, 'real_fitness_services_cat', array(
		'section' => 'real_fitness_below_slider_section',
		'settings'   => 'real_fitness_services_cat',
	) ) );

	$wp_customize->add_setting('real_fitness_disabled_pgboxes',array(
		'default' => false,
		'sanitize_callback' => 'real_fitness_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_disabled_pgboxes', array(
	   'settings' => 'real_fitness_disabled_pgboxes',
	   'section'   => 'real_fitness_below_slider_section',
	   'label'     => __('Check To Enable This Section','real-fitness'),
	   'type'      => 'checkbox'
	));


	$wp_customize->add_setting('real_fitness_main_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'real_fitness_main_text', array(
	   'settings' => 'real_fitness_main_text',
	   'section'   => 'real_fitness_below_slider_section',
	   'label' => __('Add Main Text', 'real-fitness'),
	   'type'      => 'text'
	));

	// service maintext Color
	$wp_customize->add_setting('real_fitness_service_maintext_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_service_maintext_color', array(
	   'settings' => 'real_fitness_service_maintext_color',
	   'section'   => 'real_fitness_below_slider_section',
	   'label' => __('Main Text Color', 'real-fitness'),
	   'type'      => 'color'
	));


	$wp_customize->add_setting('real_fitness_main_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'real_fitness_main_title', array(
	   'settings' => 'real_fitness_main_title',
	   'section'   => 'real_fitness_below_slider_section',
	   'label' => __('Add Main Title', 'real-fitness'),
	   'type'      => 'text'
	));

	// service maintitle Color
	$wp_customize->add_setting('real_fitness_service_maintitle_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_service_maintitle_color', array(
	   'settings' => 'real_fitness_service_maintitle_color',
	   'section'   => 'real_fitness_below_slider_section',
	   'label' => __('Main Title Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// Service boxbg Color
	$wp_customize->add_setting('real_fitness_service_boxbg_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_service_boxbg_color', array(
	   'settings' => 'real_fitness_service_boxbg_color',
	   'section'   => 'real_fitness_below_slider_section',
	   'label' => __('Box BG Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// Service boxborder Color
	$wp_customize->add_setting('real_fitness_service_boxborder_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_service_boxborder_color', array(
	   'settings' => 'real_fitness_service_boxborder_color',
	   'section'   => 'real_fitness_below_slider_section',
	   'label' => __('Box Border Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// Service title Color
	$wp_customize->add_setting('real_fitness_service_title_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_service_title_color', array(
	   'settings' => 'real_fitness_service_title_color',
	   'section'   => 'real_fitness_below_slider_section',
	   'label' => __('Title Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// Service description Color
	$wp_customize->add_setting('real_fitness_service_description_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_service_description_color', array(
	   'settings' => 'real_fitness_service_description_color',
	   'section'   => 'real_fitness_below_slider_section',
	   'label' => __('Description Color', 'real-fitness'),
	   'type'      => 'color'
	));

	//Blog post
	$wp_customize->add_section('real_fitness_blog_post_settings',array(
        'title' => __('Manage Post Section', 'real-fitness'),
        'priority' => null,
        'panel' => 'real_fitness_panel_area'
    ) );

   // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('real_fitness_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'real_fitness_sanitize_choices'
	));
	$wp_customize->add_control('real_fitness_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Theme Post Sidebar Position', 'real-fitness'),
     'description'   => __('This option work for blog page, archive page and search page.', 'real-fitness'),
     'section' => 'real_fitness_blog_post_settings',
     'choices' => array(
         'full' => __('Full','real-fitness'),
         'left' => __('Left','real-fitness'),
         'right' => __('Right','real-fitness'),
         'three-column' => __('Three Columns','real-fitness'),
         'four-column' => __('Four Columns','real-fitness'),
         'grid' => __('Grid Layout','real-fitness')
     ),
	) );

	$wp_customize->add_setting('real_fitness_blog_post_description_option',array(
    	'default'   => 'Full Content', 
        'sanitize_callback' => 'real_fitness_sanitize_choices'
	));
	$wp_customize->add_control('real_fitness_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','real-fitness'),
        'section' => 'real_fitness_blog_post_settings',
        'choices' => array(
            'No Content' => __('No Content','real-fitness'),
            'Excerpt Content' => __('Excerpt Content','real-fitness'),
            'Full Content' => __('Full Content','real-fitness'),
        ),
	) );
	
	// Footer Section
	$wp_customize->add_section('real_fitness_footer', array(
		'title'	=> __('Manage Footer Section','real-fitness'),
		'description'	=> __('<p class="sec-title">Manage Footer Section</p>','real-fitness'),
		'priority'	=> null,
		'panel' => 'real_fitness_panel_area',
	));

	$wp_customize->add_setting('real_fitness_footer_widget', array(
	    'default' => false,
	    'sanitize_callback' => 'real_fitness_sanitize_checkbox',
	));
	$wp_customize->add_control('real_fitness_footer_widget', array(
	    'settings' => 'real_fitness_footer_widget', // Corrected setting name
	    'section'   => 'real_fitness_footer',
	    'label'     => __('Check to Enable Footer Widget', 'real-fitness'),
	    'type'      => 'checkbox',
	));

	$wp_customize->add_setting('real_fitness_copyright_line',array(
		'default' => 'Fitness WordPress Theme',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'real_fitness_copyright_line', array(
	   'section' 	=> 'real_fitness_footer',
	   'label'	 	=> __('Copyright Line','real-fitness'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

    $wp_customize->add_setting('real_fitness_copyright_link',array(
		'default' => 'https://www.theclassictemplates.com/themes/free-fitness-wordpress-theme/',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'real_fitness_copyright_link', array(
	   'section' 	=> 'real_fitness_footer',
	   'label'	 	=> __('Copyright Link','real-fitness'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));


	// footer copyrightbg Color
	$wp_customize->add_setting('real_fitness_footer_copyrightbg_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_footer_copyrightbg_color', array(
	   'settings' => 'real_fitness_footer_copyrightbg_color',
	   'section'   => 'real_fitness_footer',
	   'label' => __('Copyright BG Color', 'real-fitness'),
	   'type'      => 'color'
	));

    // footer copyright Color
	$wp_customize->add_setting('real_fitness_footer_copyright_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_footer_copyright_color', array(
	   'settings' => 'real_fitness_footer_copyright_color',
	   'section'   => 'real_fitness_footer',
	   'label' => __('Copyright Color', 'real-fitness'),
	   'type'      => 'color'
	));

	// footer copyrighthover Color
	$wp_customize->add_setting('real_fitness_footer_copyrighthover_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'real_fitness_footer_copyrighthover_color', array(
	   'settings' => 'real_fitness_footer_copyrighthover_color',
	   'section'   => 'real_fitness_footer',
	   'label' => __('Copyright Hover Color', 'real-fitness'),
	   'type'      => 'color'
	));


	$wp_customize->add_setting('real_fitness_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'real_fitness_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'real_fitness_scroll_hide',array(
        'label'          => __( 'Check To Show Scroll To Top', 'real-fitness' ),
        'section'        => 'real_fitness_footer',
        'settings'       => 'real_fitness_scroll_hide',
        'type'           => 'checkbox',
    )));


	$wp_customize->add_setting('real_fitness_color_scheme_one',array(
		'default' => '#0fbbf3',
		'sanitize_callback' => 'sanitize_hex_color',
	));
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	    $wp_customize,
	    'real_fitness_color_scheme_one',
	    array(
	        'label'      => __( 'Color Scheme 1', 'real-fitness' ),
	        'section'    => 'colors',
	        'settings'   => 'real_fitness_color_scheme_one',
	    ) )
	);

    //Color
	$wp_customize->add_setting('real_fitness_color_scheme_two',array(
		'default' => '#0b1f33',
		'sanitize_callback' => 'sanitize_hex_color',
	));
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	    $wp_customize,
	    'real_fitness_color_scheme_two',
	    array(
	        'label'      => __( 'Color Scheme 2', 'real-fitness' ),
	        'section'    => 'colors',
	        'settings'   => 'real_fitness_color_scheme_two',
	    ) )
	);

	// Google Fonts
	$wp_customize->add_section( 'real_fitness_google_fonts_section', array(
	'title'       => __( 'Google Fonts', 'real-fitness' ),
	'priority'       => 24,
) );

$font_choices = array(
	'' => 'select',
	'Arvo:400,700,400italic,700italic' => 'Arvo',
	'Abril Fatface' => 'Abril Fatface',
	'Acme' => 'Acme',
	'Anton' => 'Anton',
	'Arimo:400,700,400italic,700italic' => 'Arimo',
	'Architects Daughter' => 'Architects Daughter',
	'Arsenal' => 'Arsenal',
	'Alegreya' => 'Alegreya',
	'Alfa Slab One' => 'Alfa Slab One',
	'Averia Serif Libre' => 'Averia Serif Libre',
	'Bitter:400,700,400italic' => 'Bitter',
	'Bangers' => 'Bangers',
	'Boogaloo' => 'Boogaloo',
	'Bad Script' => 'Bad Script',
	'Bree Serif' => 'Bree Serif',
	'BenchNine' => 'BenchNine',
	'Cabin:400,700,400italic' => 'Cabin',
	'Cardo' => 'Cardo',
	'Courgette' => 'Courgette',
	'Cherry Swash' => 'Cherry Swash',
	'Cormorant Garamond' => 'Cormorant Garamond',
	'Crimson Text' => 'Crimson Text',
	'Cuprum' => 'Cuprum',
	'Cookie' => 'Cookie',
	'Chewy' => 'Chewy',
	'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
	'Droid Sans:400,700' => 'Droid Sans',
	'Days One' => 'Days One',
	'Dosis' => 'Dosis',
	'Emilys Candy:' => 'Emilys Candy',
	'Economica' => 'Economica',
	'Fjalla One:400' => 'Fjalla One',
	'Francois One:400' => 'Francois One',
	'Fredoka One' => 'Fredoka One',
	'Frank Ruhl Libre' => 'Frank Ruhl Libre',
	'Gloria Hallelujah' => 'Gloria Hallelujah',
	'Great Vibes' => 'Great Vibes',
	'Josefin Sans:400,300,600,700' => 'Josefin Sans',
	'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
	'Lora:400,700,400italic,700italic' => 'Lora',
	'Lato:400,700,400italic,700italic' => 'Lato',
	'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
	'Montserrat:400,700' => 'Montserrat',
	'Oxygen:400,300,700' => 'Oxygen',
	'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
	'Open Sans:400italic,700italic,400,700' => 'Open Sans',
	'Oswald:400,700' => 'Oswald',
	'PT Serif:400,700' => 'PT Serif',
	'PT Sans:400,700,400italic,700italic' => 'PT Sans',
	'PT Sans Narrow:400,700' => 'PT Sans Narrow',
	'Playfair Display:400,700,400italic' => 'Playfair Display',
	'Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900' => 'Poppins',
	'Roboto:400,400italic,700,700italic' => 'Roboto',
	'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
	'Roboto Slab:400,700' => 'Roboto Slab',
	'Rokkitt:400' => 'Rokkitt',
	'Raleway:400,700' => 'Raleway',
	'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
	'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
	'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
);

$wp_customize->add_setting( 'real_fitness_headings_fonts', array(
	'sanitize_callback' => 'real_fitness_sanitize_fonts',
));
$wp_customize->add_control( 'real_fitness_headings_fonts', array(
	'type' => 'select',
	'description' => __('Select your desired font for the headings.', 'real-fitness'),
	'section' => 'real_fitness_google_fonts_section',
	'choices' => $font_choices
));

$wp_customize->add_setting( 'real_fitness_body_fonts', array(
	'sanitize_callback' => 'real_fitness_sanitize_fonts'
));
$wp_customize->add_control( 'real_fitness_body_fonts', array(
	'type' => 'select',
	'description' => __( 'Select your desired font for the body.', 'real-fitness' ),
	'section' => 'real_fitness_google_fonts_section',
	'choices' => $font_choices
));
}
add_action( 'customize_register', 'real_fitness_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function real_fitness_customize_preview_js() {
	wp_enqueue_script( 'real_fitness_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'real_fitness_customize_preview_js' );
