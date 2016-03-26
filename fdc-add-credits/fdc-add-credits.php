<?php

/**
 * Plugin Name: Add your own credits
 * Plugin URI: http://www.caminosantiagodecompostela.com/
 * Description: This plugins adds your own credits to the footer of the blog
 * Version: 0.1
 * Author: Fernando Diaz Caballero
 * Author URI: https://plus.google.com/+FernandoDiazCaballero/
 * License: GPL2
 */

add_action('admin_menu', 'my_plugin_menu');

function my_plugin_menu() {
	add_options_page('Credits Settings', 'Credits Settings', 'administrator', 'credits-settings', 'credits_settings_page');
}

function credits_settings_page() {
	?>

	<div class="wrap">
	<h2>Credits Details</h2>
	
	<form method="post" action="options.php">
	    <?php settings_fields( 'my-plugin-settings-group' ); ?>
	    <?php do_settings_sections( 'my-plugin-settings-group' ); ?>
	    <table class="form-table">
	        <tr valign="top">
	        <th scope="row">Credits Text</th>
	        <td><input type="text" name="credits_text" value="<?php echo esc_attr( get_option('credits_text') ); ?>" /></td>
	        </tr>
	         
	        <tr valign="top">
	        <th scope="row">Credits URL</th>
	        <td><input type="url" name="credits_url" value="<?php echo esc_attr( get_option('credits_url') ); ?>" /></td>
	        </tr>
	        
	       
	    </table>
	    
	    <?php submit_button(); ?>
	 
	</form>
	</div>
	<?php 
}

add_action( 'admin_init', 'my_plugin_settings' );

function my_plugin_settings() {
	register_setting( 'my-plugin-settings-group', 'credits_text' );
	register_setting( 'my-plugin-settings-group', 'credits_url' );
}

add_action('twentyfifteen_credits', 'fdc_credits');

function fdc_credits(){
	echo '<a href="'.get_option('credits_url').'">'.get_option('credits_text').'</a><br>';
}

