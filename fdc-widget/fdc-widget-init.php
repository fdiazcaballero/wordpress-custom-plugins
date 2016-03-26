<?php
/*
 Plugin Name: FDC Widget for text field
 Plugin URI: http://www.caminosantiagodecompostela.com
 Description: A new text field widget
 Version: 1.0
 Author: Fernando Diaz Caballero
 Author URI: http://www.caminosantiagodecompostela.com
 */

require_once "fdc-widget.php";
add_action("widgets_init", function () { register_widget("TextWidget"); });