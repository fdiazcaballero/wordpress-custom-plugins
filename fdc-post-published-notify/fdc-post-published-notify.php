<?php
/**
 * Plugin Name: Post Published, Author notified
 * Plugin URI: http://www.caminosantiagodecompostela.com/
 * Description: This plugin notifies the author when his post has been published
 * Version: 0.1
 * Author: Fernando Diaz Caballero
 * Author URI: https://plus.google.com/+FernandoDiazCaballero/
 * License: GPL2
 */

add_action( 'publish_post', 'fdc_post_published_notification', 10, 2 );

function fdc_post_published_notification( $ID, $post ) {
	$email = get_the_author_meta( 'user_email', $post->post_author );
	$subject = 'Published ' . $post->post_title;
	$message = 'We just published your post: ' . $post->post_title . ' take a look: ' . get_permalink( $ID );
	wp_mail( $email, $subject, $message );
}