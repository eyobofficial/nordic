<?php

/**
 * Nav helper module is used for side navigation logic
 */


function is_active($section, $menu_title){
	return isset($section) && (strtolower($section) == strtolower($menu_title));
}



function check_nav($test_msg = 'Tessssst'){
	global $page_section;

	return $page_section;
}



function open_menu($section, $menu_title){

	$link_string  = '';    // Initialize
	$link_string .= '<li ';

	if(is_active($section, $menu_title)){
		$link_string .= ' class="active" ';
	}

	$link_string .= '>';

	return $link_string;
}


function close_menu(){
	return '</li>';
}


function open_submenu($section, $subsection, $menu_title){
	if(is_active($section, $menu_title)){
		return open_menu($subsection, $menu_title);
	}
}


function close_submenu(){
	return '</li>';
}