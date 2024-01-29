<?php
/**
* Load widget components
*
* @since Kortez Blog 1.0.0
*/
require_once get_parent_theme_file_path( '/inc/widgets/class-base-widget.php' );
require_once get_parent_theme_file_path( '/inc/widgets/latest-posts.php' );
require_once get_parent_theme_file_path( '/inc/widgets/author.php' );
/**
 * Register widgets
 *
 * @since Kortez Blog 1.0.0
 */
/**
* Load all the widgets
* @since Kortez Blog 1.0.0
*/
function kortez_blog_register_widget() {

	$widgets = array(
		'kortez_blog_Latest_Posts_Widget',
		'kortez_blog_Author_Widget',
	);

	foreach ( $widgets as $key => $value) {
    	register_widget( $value );
	}
}
add_action( 'widgets_init', 'kortez_blog_register_widget' );