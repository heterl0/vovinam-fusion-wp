<?php
/**
 * Real Fitness functions and definitions
 *
 * @package Real Fitness
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'real_fitness_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function real_fitness_setup() {
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 680;
	load_theme_textdomain( 'real-fitness', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header', array(
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'real-fitness' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_editor_style( 'editor-style.css' );
}
endif; // real_fitness_setup
add_action( 'after_setup_theme', 'real_fitness_setup' );

function real_fitness_the_breadcrumb() {
    echo '<div class="breadcrumb my-3">';

    if (!is_home()) {
        echo '<a class="home-main align-self-center" href="' . esc_url(home_url()) . '">';
        bloginfo('name');
        echo "</a>";

        if (is_category() || is_single()) {
            the_category(' , ');
            if (is_single()) {
                echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
            }
        } elseif (is_page()) {
            echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
        }
    }

    echo '</div>';
}

function real_fitness_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'real-fitness' ),
		'description'   => __( 'Appears on blog page sidebar', 'real-fitness' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'real-fitness' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'real-fitness' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'real-fitness' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'real-fitness' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'real-fitness' ),
		'description'   => __( 'Appears on shop page', 'real-fitness' ),
		'id'            => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'real-fitness' ),
		'description'   => __( 'Appears on footer', 'real-fitness' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-1 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'real-fitness' ),
		'description'   => __( 'Appears on footer', 'real-fitness' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-2 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'real-fitness' ),
		'description'   => __( 'Appears on footer', 'real-fitness' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'real-fitness' ),
		'description'   => __( 'Appears on footer', 'real-fitness' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-4 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

}
add_action( 'widgets_init', 'real_fitness_widgets_init' );

function real_fitness_scripts() {
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri())."/css/bootstrap.css" );
	wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri())."/css/owl.carousel.css" );
	wp_enqueue_style( 'real-fitness-basic-style', get_stylesheet_uri() );
	wp_style_add_data('real-fitness-basic-style', 'rtl', 'replace');
	wp_enqueue_style( 'real-fitness-responsive', esc_url(get_template_directory_uri())."/css/responsive.css" );
	wp_enqueue_style( 'real-fitness-default', esc_url(get_template_directory_uri())."/css/default.css" );
	wp_enqueue_script( 'owl.carousel-js', esc_url(get_template_directory_uri()). '/js/owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()). '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'real-fitness-theme', esc_url(get_template_directory_uri()) . '/js/theme.js' );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri())."/css/fontawesome-all.css" );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	require get_parent_theme_file_path( '/inc/color-scheme/custom-color-control.php' );
	wp_add_inline_style( 'real-fitness-basic-style',$real_fitness_color_scheme_css );

	// font-family
	$real_fitness_headings_font = esc_html(get_theme_mod('real_fitness_headings_fonts'));
	$real_fitness_body_font = esc_html(get_theme_mod('real_fitness_body_fonts'));

	if ($real_fitness_headings_font) {
	    wp_enqueue_style('real-fitness-headings-fonts', 'https://fonts.googleapis.com/css?family=' . urlencode($real_fitness_headings_font));
	} else {
	    wp_enqueue_style('poppins-headings', 'https://fonts.googleapis.com/css?family=Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
	}

	if ($real_fitness_body_font) {
	    wp_enqueue_style('real-fitness-body-fonts', 'https://fonts.googleapis.com/css?family=' . urlencode($real_fitness_body_font));
	} else {
	    wp_enqueue_style('poppins-body', 'https://fonts.googleapis.com/css?family=Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
	}
	
}
add_action( 'wp_enqueue_scripts', 'real_fitness_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Theme Info Page.
 */
require get_template_directory() . '/inc/addon.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/gfonts.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/upgrade-to-pro.php';

// select
require get_template_directory() . '/inc/select/category-dropdown-custom-control.php';


if ( ! defined( 'REAL_FITNESS_THEME_PAGE' ) ) {
define('REAL_FITNESS_THEME_PAGE',__('https://www.theclassictemplates.com/themes/','real-fitness'));
}
if ( ! defined( 'REAL_FITNESS_SUPPORT' ) ) {
define('REAL_FITNESS_SUPPORT',__('https://wordpress.org/support/theme/real-fitness','real-fitness'));
}
if ( ! defined( 'REAL_FITNESS_REVIEW' ) ) {
define('REAL_FITNESS_REVIEW',__('https://wordpress.org/support/theme/real-fitness/reviews/#new-post','real-fitness'));
}
if ( ! defined( 'REAL_FITNESS_PRO_DEMO' ) ) {
define('REAL_FITNESS_PRO_DEMO',__('https://www.theclassictemplates.com/demo/real-fitness/','real-fitness'));
}
if ( ! defined( 'REAL_FITNESS_PREMIUM_PAGE' ) ) {
define('REAL_FITNESS_PREMIUM_PAGE',__('https://www.theclassictemplates.com/wp-themes/fitness-wordpress-theme/','real-fitness'));
}
if ( ! defined( 'REAL_FITNESS_THEME_DOCUMENTATION' ) ) {
define('REAL_FITNESS_THEME_DOCUMENTATION',__('http://theclassictemplates.com/documentation/real-fitness-free/','real-fitness'));
}

if ( ! function_exists( 'real_fitness_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function real_fitness_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

//sanitize number field
function real_fitness_sanitize_number_absint( $number, $setting ) {
  // Ensure $number is an absolute integer (whole number, zero or greater).
  $number = absint( $number );

  // If the input is an absolute integer, return it; otherwise, return the default
  return ( $number ? $number : $setting->default );
}

/*radio button sanitization*/
function real_fitness_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

if ( ! function_exists( 'real_fitness_sanitize_integer' ) ) {
	function real_fitness_sanitize_integer( $input ) {
		return (int) $input;
	}
}


// Footer Link
define('REAL_FITNESS_FOOTER_LINK',__('https://theclassictemplates.com/themes/free-fitness-wordpress-theme/','real-fitness'));
