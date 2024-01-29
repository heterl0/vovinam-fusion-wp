<?php
/**
 * Template part for displaying site info
 *
 * @package Kortez Blog
 */

?>

<div class="site-info">
	<?php echo wp_kses_post( html_entity_decode( esc_html__( 'Copyright &copy; ' , 'kortez-blog' ) ) );
		echo esc_html( date( 'Y' ) . ' ' . get_bloginfo( 'name' ) );
		printf( esc_html__( '. Powered by', 'kortez-blog' ) );
	?>
	<a href="<?php echo esc_url( __( 'https://kortezthemes.com/', 'kortez-blog' ) ); ?>" target="_blank">
		<?php
			printf( esc_html__( 'Kortez Themes', 'kortez-blog' ) );
		?>
	</a>
</div><!-- .site-info -->