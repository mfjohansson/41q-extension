<?php

function q41q_pages() {
	global $wp_rewrite;
	if (!strpos($wp_rewrite->get_page_permastruct(), '.41q')){
		$wp_rewrite->page_structure = $wp_rewrite->page_structure . '.41q';
	}
}

add_filter('user_trailingslashit', 'no_page_slash', 66, 2);

function no_page_slash($string, $type) {
	global $wp_rewrite;
	if ($wp_rewrite->using_permalinks() && $wp_rewrite->use_trailing_slashes == true && $type == 'page'){
		return untrailingslashit($string);
	} else {
		return $string;
	}
}