<?php
/**
 * Pages Customizer options
 *
 * @package Kortez Blog
 */

/**
 * Pages
 */
Kirki::add_section( 'pages_options', array(
    'title'          => esc_html__( 'Pages', 'kortez-blog' ),
    'capability'     => 'edit_theme_options',
    'priority'       => '150',
) );

Kirki::add_field( 'kortez-blog',  array(
    'label'       => esc_html__( 'Page Title', 'kortez-blog' ),
    'type'        => 'select',
    'settings'    => 'disable_page_title',
    'section'     => 'pages_options',
    'default'     => 'disable_front_page',
    'choices'     => array(
        'disable_all_pages'   => esc_html__( 'Disable from all', 'kortez-blog' ),
        'enable_all_pages'    => esc_html__( 'Enable in all', 'kortez-blog' ),
        'disable_front_page'  => esc_html__( 'Disable from frontpage only', 'kortez-blog' ),
    ),
    'priority'    => 10,
) );

Kirki::add_field( 'kortez-blog',  array(
    'label'       => esc_html__( 'Page Title Position', 'kortez-blog' ),
    'type'        => 'select',
    'settings'    => 'page_title_position',
    'section'     => 'pages_options',
    'default'     => 'above_feature_image',
    'choices'     => array(
        'below_feature_image' => esc_html__( 'Below Feature Image', 'kortez-blog' ),
        'above_feature_image' => esc_html__( 'Top of the Page', 'kortez-blog' ),
    ),
    'priority'    => 20,
) );

Kirki::add_field( 'kortez-blog', array(
    'label'       => esc_html__( 'Feature Image', 'kortez-blog' ),
    'type'        => 'select',
    'settings'    => 'page_feature_image',
    'section'     => 'pages_options',
    'default'     => 'show_in_all_pages',
    'choices' => array(
        'show_in_all_pages'    => esc_html__( 'Show in all Pages', 'kortez-blog' ),
        'disable_in_all_pages' => esc_html__( 'Disable in all Pages', 'kortez-blog' ),
        'disable_in_frontpage' => esc_html__( 'Disable in Frontpage only', 'kortez-blog' ),
        'show_in_frontpage'    => esc_html__( 'Show in Frontpage only', 'kortez-blog' ),
    ),
    'priority'    => 30,
) );

Kirki::add_field( 'kortez-blog', array(
    'label'       => esc_html__( 'Choose Image Size', 'kortez-blog' ),
    'type'        => 'select',
    'settings'    => 'render_pages_image_size',
    'section'     => 'pages_options',
    'default'     => 'kortez-blog-1370-550',
    'placeholder' => esc_html__( 'Select Image Size', 'kortez-blog' ),
    'choices'     => kortez_blog_get_intermediate_image_sizes(),
    'priority'    => 40,
    'active_callback' => array(
        array(
            array(
                'setting'  => 'page_feature_image',
                'operator' => 'contains',
                'value'    => array( 'show_in_all_pages', 'show_in_frontpage', 'disable_in_frontpage' ),
            ),
        ),
    ),
) );

/**
 * 404 Error Page
 */
Kirki::add_section( 'error404_options', array(
    'title'          => esc_html__( '404 Page', 'kortez-blog' ),
    'capability'     => 'edit_theme_options',
    'priority'       => '160',
) );

Kirki::add_field( 'kortez-blog', array(
    'label'       => esc_html__( 'Image', 'kortez-blog' ),
    'description' => esc_html__( 'Recommended image size 360x200 pixel.', 'kortez-blog' ),
    'type'        => 'image',
    'settings'    => 'error404_image',
    'section'     => 'error404_options',
    'default'     => '',
    'choices'     => array(
        'save_as' => 'id',
    ),
    'priority'    => 10,
) );
Kirki::add_field( 'kortez-blog', array(
    'label'       => esc_html__( 'Choose Image Size', 'kortez-blog' ),
    'type'        => 'select',
    'settings'    => 'render_error404_image_size',
    'section'     => 'error404_options',
    'default'     => 'full',
    'placeholder' => esc_html__( 'Select Image Size', 'kortez-blog' ),
    'choices'     => kortez_blog_get_intermediate_image_sizes(),
    'priority'    => 20,
) );