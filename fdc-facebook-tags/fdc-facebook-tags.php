<?php
/**
* Plugin Name: Facebook Open Graph Tags for Wordpress
* Plugin URI: http://www.caminosantiagodecompostela.com/
* Description: This plugin adds the useful Facebook Open Graph tags to every sigle post.
* Version: 0.1
* Author: Fernando Diaz Caballero
* Author URI: https://plus.google.com/+FernandoDiazCaballero/
* License: GPL2
*/

add_action( 'wp_head', 'fdc_facebook_tags' );
function fdc_facebook_tags() {
	
		?>
    <meta property="og:title" content="<?php the_title() ?>" />
    <meta property="og:site_name" content="<?php bloginfo( 'name' ) ?>" />
    <meta property="og:url" content="<?php the_permalink() ?>" />
    <meta property="og:description" content="<?php the_excerpt() ?>" />
    <meta property="og:type" content="article" />
    
    <?php 
      if ( has_post_thumbnail() ) :
        $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); 
    ?>
      <meta property="og:image" content="<?php echo $image[0]; ?>"/>  
    <?php endif; ?>
    
  <?php
  
}