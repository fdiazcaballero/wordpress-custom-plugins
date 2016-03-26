<?php
/*
 Plugin Name: FDC Contact Form Plugin
 Plugin URI: http://www.caminosantiagodecompostela.com
 Description: Simple WordPress Contact Form plugin
 Version: 1.0
 Author: Fernando Diaz Caballero
 Author URI: http://www.caminosantiagodecompostela.com
 */



function html_form_code() {
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	echo '<p>';
	echo 'Your Name (required) <br>';
	echo '<input type="text" name="fdc-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["fdc-name"] ) ? esc_attr( $_POST["fdc-name"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Your Email (required) <br>';
	echo '<input type="email" name="fdc-email" value="' . ( isset( $_POST["fdc-email"] ) ? esc_attr( $_POST["fdc-email"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Subject (required) <br>';
	echo '<input type="text" name="fdc-subject" pattern="[a-zA-Z ]+" value="' . ( isset( $_POST["fdc-subject"] ) ? esc_attr( $_POST["fdc-subject"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Your Message (required) <br>';
	echo '<textarea rows="10" cols="35" name="fdc-message">' . ( isset( $_POST["fdc-message"] ) ? esc_attr( $_POST["fdc-message"] ) : '' ) . '</textarea>';
	echo '</p>';
	echo '<p><input type="submit" name="fdc-submitted" value="Send"/></p>';
	echo '</form>';

}

function deliver_mail() {

	// if the submit button is clicked, send the email
	if ( isset( $_POST['fdc-submitted'] ) ) {

		// sanitize form values
		$name    = sanitize_text_field( $_POST["fdc-name"] );
		$email   = sanitize_email( $_POST["fdc-email"] );
		$subject = sanitize_text_field( $_POST["fdc-subject"] );
		$message = esc_textarea( $_POST["fdc-message"] );

		// get the blog administrator's email address
		$to = get_option( 'admin_email' );

		$headers = "From: $name <$email>" . "\r\n";

		// If email has been process for sending, display a success message
		if ( wp_mail( $to, $subject, $message, $headers ) ) {
			echo '<div>';
			echo '<p>Thanks for contacting me, expect a response soon.</p>';
			echo '</div>';
		} else {
			echo 'An unexpected error occurred';
		}
	}
}

function fdc_shortcode() {
	ob_start();
	
	html_form_code();
	deliver_mail();

	return ob_get_clean();
}

add_shortcode( 'fdc_contact_form', 'fdc_shortcode' );






?>