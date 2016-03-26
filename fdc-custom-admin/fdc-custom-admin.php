<?php
/*
Plugin Name: FDC Custom Admin
Plugin URI: http://www.caminosantiagodecompostela.com
Description: Customizes Administrator experience
Version: 1.0
Author: Fernando Diaz Caballero
Author URI: http://www.caminosantiagodecompostela.com
*/

// login page logo
function custom_login_logo() {
	echo '<style>
			h1 a, h1 a:hover, h1 a:focus { 
			font-size: 1.4em; 
			font-weight: normal; 
			text-align: center; 
			text-indent: 0; 
			line-height: 1.1em; 
			text-decoration: none; 
			color: #dadada; 
			text-shadow: 0 -1px 1px #666, 0 1px 1px #fff; 
			background-image: none !important; }
			</style>';
}
add_action('login_head', 'custom_login_logo');

// remove administration page header logo
function remove_admin_logo() {
	echo '<style>img#header-logo { display: none; }</style>';
}
add_action('admin_head', 'remove_admin_logo');