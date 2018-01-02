<?php
// Enqueue all styles and scripts

function mod_enqueue() {

	// Load Javascript
	wp_register_script('mod-scripts', get_stylesheet_directory_uri() . '/library/js/scripts.js', array('jquery'), false, true);
	wp_enqueue_script('mod-scripts');

	// Load Stylesheets
	wp_enqueue_style('mod-styles', get_stylesheet_directory_uri() . '/library/styles/style.css');

}
add_action( 'wp_enqueue_scripts', 'mod_enqueue' );
