<?php
/*
Plugin Name: Dot 41q on pages
Plugin URI: https://github.com/mfjohansson/41q-extension
Description: This plugin adds .41q URL extension to the 41q site
Author: Magnus Johansson
Version: 0.1
Author URI: http://mfjohansson.nu
*/

include 'functions.php';

add_action('init', '41q_pages', -1);
register_activation_hook(__FILE__, 'active');
register_deactivation_hook(__FILE__, 'deactive');

function active()  {
	global $wp_rewrite;
	if (!strpos($wp_rewrite->get_page_permastruct(), '.41q')) {
		$wp_rewrite->page_structure = $wp_rewrite->page_structure . '.41q';
	}
	$wp_rewrite->flush_rules();
}

function deactive() {
	global $wp_rewrite;
	$wp_rewrite->page_structure = str_replace('.41q', '', $wp_rewrite->page_structure);
	$wp_rewrite->flush_rules();
}