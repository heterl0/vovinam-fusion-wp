<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Real Fitness
 */
?>
<div id="footer">
	<?php 
    $footer_widget_enabled = get_theme_mod('real_fitness_footer_widget', false);
    
    if ($footer_widget_enabled !== false && $footer_widget_enabled !== '') { ?>

        <div class="footer-widget">
            <div class="container">
                <?php if (!dynamic_sidebar('footer-1')) : ?>
                <?php endif; // end footer widget area ?>
                      
                <?php if (!dynamic_sidebar('footer-2')) : ?>
                <?php endif; // end footer widget area ?>
              
                <?php if (!dynamic_sidebar('footer-3')) : ?>
                <?php endif; // end footer widget area ?>
                
                <?php if (!dynamic_sidebar('footer-4')) : ?>
                <?php endif; // end footer widget area ?>
            </div>
        </div>
    <?php } ?>
    <div class="clear"></div>

	<div class="copywrap text-center">
		<div class="container">
		  <p class="p-0"><a href="<?php echo esc_html(get_theme_mod('real_fitness_copyright_link',__('https://www.theclassictemplates.com/themes/free-fitness-wordpress-theme/','real-fitness'))); ?>" target="_blank"><?php echo esc_html(get_theme_mod('real_fitness_copyright_line',__('Fitness WordPress Theme','real-fitness'))); ?></a> <?php echo esc_html('By Classic Templates','real-fitness'); ?></p>
		</div>
	</div>
	
</div>

<?php if(get_theme_mod('real_fitness_scroll_hide',false)){ ?>
   <a id="button"><?php esc_html_e('TOP', 'real-fitness'); ?></a>
  <?php } ?>

<?php wp_footer(); ?>
</body>
</html>

