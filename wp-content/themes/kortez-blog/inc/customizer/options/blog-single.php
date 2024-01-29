<?php
/**
 * Single Post Customizer options
 *
 * @package Kortez Blog
 */

/**
 * Single Post
 */
Kirki::add_section( 'single_post_options', array(
    'title'          => esc_html__( 'Single Post', 'kortez-blog' ),
    'capability'     => 'edit_theme_options',
    'priority'       => '140',
) );

Kirki::add_field( 'kortez-blog',  array(
	'label'       => esc_html__( 'Post Title', 'kortez-blog' ),
	'type'        => 'select',
	'settings'    => 'disable_single_post_title',
	'section'     => 'single_post_options',
	'default'     => 'enable_all_pages',
	'choices'     => array(
		'enable_all_pages'    => esc_html__( 'Enable in all', 'kortez-blog' ),
		'disable_all_pages'   => esc_html__( 'Disable from all', 'kortez-blog' ),
	),
	'priority'    => 10,
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Feature Image', 'kortez-blog' ),
	'type'        => 'select',
	'settings'    => 'single_feature_image',
	'section'     => 'single_post_options',
	'default'     => 'show_in_all_pages',
	'choices' => array(
		'show_in_all_pages'    => esc_html__( 'Show in all Pages', 'kortez-blog' ),
		'disable_in_all_pages' => esc_html__( 'Disable in all Pages', 'kortez-blog' ),
	),
	'priority'    => 30,
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Disable Date', 'kortez-blog' ),
	'type'        => 'checkbox',
	'settings'    => 'hide_single_post_date',
	'section'     => 'single_post_options',
	'default'     => false,
	'priority'    => 90,
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Disable Comments Link', 'kortez-blog' ),
	'type'        => 'checkbox',
	'settings'    => 'hide_single_post_comment',
	'section'     => 'single_post_options',
	'default'     => false,
	'priority'    => 100,
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Disable category', 'kortez-blog' ),
	'type'        => 'checkbox',
	'settings'    => 'hide_single_post_category',
	'section'     => 'single_post_options',
	'default'     => false,
	'priority'    => 110,
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Disable Tag Links', 'kortez-blog' ),
	'type'        => 'checkbox',
	'settings'    => 'hide_single_post_tag_links',
	'section'     => 'single_post_options',
	'default'     => false,
	'priority'    => 120,
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Disable Author', 'kortez-blog' ),
	'type'        => 'checkbox',
	'settings'    => 'hide_single_post_author',
	'section'     => 'single_post_options',
	'default'     => false,
	'priority'    => 130,
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Author Section Title', 'kortez-blog' ),
	'type'        => 'text',
	'settings'    => 'single_post_author_title',
	'section'     => 'single_post_options',
	'default'     => '',
	'priority'    => 140,
	'active_callback' => array(
		array(
			'setting'  => 'hide_single_post_author',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Disable Related Posts', 'kortez-blog' ),
	'type'        => 'checkbox',
	'settings'    => 'hide_related_posts',
	'section'     => 'single_post_options',
	'default'     => false,
	'priority'    => 150,
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Related Posts Section Title', 'kortez-blog' ),
	'type'        => 'text',
	'settings'    => 'related_posts_title',
	'section'     => 'single_post_options',
	'default'     => '',
	'priority'    => 160,
	'active_callback' => array(
		array(
			'setting'  => 'hide_related_posts',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Choose Image Size', 'kortez-blog' ),
	'description' => esc_html__( 'For related posts.', 'kortez-blog' ),
	'type'        => 'select',
	'settings'    => 'render_related_post_image_size',
	'section'     => 'single_post_options',
	'default'     => 'kortez-blog-420-300',
	'placeholder' => esc_html__( 'Select Image Size', 'kortez-blog' ),
	'choices'     => kortez_blog_get_intermediate_image_sizes(),
	'priority'    => 170,
	'active_callback' => array(
		array(
			'setting'  => 'hide_related_posts',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez-blog', array(
	'label'       => esc_html__( 'Related Posts Items', 'kortez-blog' ),
	'description' => esc_html__( 'Total number of related posts to show.', 'kortez-blog' ),
	'type'        => 'number',
	'settings'    => 'related_posts_count',
	'section'     => 'single_post_options',
	'default'     => 4,
	'choices' => array(
		'min' => '1',
		'max' => '12',
		'step' => '1',
	),
	'priority'    => 180,
	'active_callback' => array(
		array(
			'setting'  => 'hide_related_posts',
			'operator' => '==',
			'value'    => false,
		),
	),
) );