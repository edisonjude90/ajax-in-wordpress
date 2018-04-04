<?php
/**
 * Plugin Name: Simple Ajax Call
 * Description: Make a ajax call 
 * Version: 1.0.0
 * Author: Edison
 * 
 * 
 */

add_action( 'wp_enqueue_scripts', 'ajax_test_enqueue_scripts' );

function ajax_test_enqueue_scripts() {

	// CSS file included
	wp_enqueue_style( 'test', plugins_url( '/css/test.css', __FILE__ ) ); 

	//  JS File included, it will load after jquery library is loaded.
	wp_enqueue_script( 'test', plugins_url( '/js/test_ajax.js', __FILE__ ), array('jquery'), '1.0', true ); 

	// including local variables to used in js
	wp_localize_script( 'test', 'jsLocal', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	));

}

add_action( 'wp_ajax_nopriv_simple_ajax_call', 'simple_ajax_call' ); // for users not logged in 
add_action( 'wp_ajax_simple_ajax_call', 'simple_ajax_call' ); // for users logged in 

function simple_ajax_call() {
	echo "The value passed is " . $_POST['id'];
	die();
}

function test_shortcode() { 
	include("simple-page.php");
}
add_shortcode( 'test_shortcode_page', 'test_shortcode' ); // including short code in wordpress.


?>
