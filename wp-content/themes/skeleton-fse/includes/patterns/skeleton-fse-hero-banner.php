<?php
/**
 * Hero Banner
 */
return array(
	'title'      => __( 'Hero Banner', 'skeleton-fse' ),
	'categories' => array( 'skeleton-fse' ),
	'blockTypes' => array( 'core/template-part/skeleton-fse' ),
	'content'    => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","bottom":"0px"}}},"backgroundColor":"foreground","className":"skeleton-fse-banner","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group skeleton-fse-banner has-foreground-background-color has-background" style="padding-top:0px;padding-bottom:0px"><!-- wp:image {"id":537,"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"topLeft":"15px","topRight":"15px","bottomLeft":"0px","bottomRight":"0px"}}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="'.esc_url(get_template_directory_uri()).'/assets/images/banner-img.jpg" alt="" class="wp-image-537" style="border-top-left-radius:15px;border-top-right-radius:15px;border-bottom-left-radius:0px;border-bottom-right-radius:0px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"skeleton-fse-banner-content","layout":{"type":"constrained"}} -->
<div class="wp-block-group skeleton-fse-banner-content"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"57px","fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"right":"290px","left":"290px"}}},"textColor":"background"} -->
<h2 class="wp-block-heading has-text-align-center has-background-color has-text-color" style="padding-right:290px;padding-left:290px;font-size:57px;font-style:normal;font-weight:600">Welcome To Skeleton WordPress Theme</h2>
<!-- /wp:heading -->

<!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"center"},"style":{"typography":{"fontSize":"17px","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"35px"},"blockGap":"0"}}} -->
<div class="wp-block-buttons alignwide has-custom-font-size" style="margin-top:35px;font-size:17px;font-style:normal;font-weight:500"><!-- wp:button {"textAlign":"center","backgroundColor":"tertiarygb","textColor":"tertiary","style":{"spacing":{"padding":{"left":"var:preset|spacing|60","right":"var:preset|spacing|60","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-tertiary-color has-tertiarygb-background-color has-text-color has-background has-text-align-center wp-element-button" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--60)">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
);