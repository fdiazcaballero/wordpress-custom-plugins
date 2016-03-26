<?php
/**
 * Plugin Name: Hide info about wrong login cause
 * Plugin URI: http://www.caminosantiagodecompostela.com/
 * Description: This plugin hides the defaul info provided by WP when the login credentials are wrong, in that way the user doesn't know whether the username is wrong or the password is wrong or both. It makes life a bit more difficult for hackers.
 * Version: 0.1
 * Author: Fernando Diaz Caballero
 * Author URI: https://plus.google.com/+FernandoDiazCaballero/
 * License: GPL2
 */

add_filter('login_errors','login_error_message');

function login_error_message( $error ){
	$error = "Incorrect login information. Click on 'lost your password?' below to recover your credentials";
	return $error;
}