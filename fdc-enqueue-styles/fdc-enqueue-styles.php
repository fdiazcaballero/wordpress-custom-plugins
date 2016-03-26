<?php
/**
 * Plugin Name: Enqueue your styles
 * Plugin URI: http://www.caminosantiagodecompostela.com/
 * Description: Enqueue your custom styles
 * Version: 0.1
 * Author: Fernando Diaz Caballero
 * Author URI: https://plus.google.com/+FernandoDiazCaballero/
 * License: GPL2
 */

add_action( 'wp_enqueue_scripts', 'my_enqueued_assets' );

function my_enqueued_assets() {
	wp_enqueue_style( 'my-font-Roboto', '//fonts.googleapis.com/css?family=Roboto' );
}

function my_theme_add_editor_styles() {
	add_editor_style( './mystyle.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );