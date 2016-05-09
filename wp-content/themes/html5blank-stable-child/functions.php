<?php

add_action('wp_enqueue_scripts', 'my_style_method');
function my_style_method() {

	//sets it
	wp_register_style('style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all');
	// fires it
	wp_enqueue_style('style'); //enqueue it
}  

add_action('wp_enqueue_scripts', 'my_method');
function my_method() {
    //sets it
	// wp_register_script('custom-script', get_stylesheet_directory_uri() . '/html5blank-stable-child/scripts/bootstrap.min.js', array('jquery'), true );
	
	wp_register_script('custom-script', get_stylesheet_directory_uri() . '/scripts/custom.js', true );
	// fires it
	wp_enqueue_script('custom-script'); //enqueue it
}