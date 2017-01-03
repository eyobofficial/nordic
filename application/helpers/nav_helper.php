<?php

/**
 * Nav helper module is used for side navigation logic
 */


function is_active($section, $menu_title){
	return isset($section) && (strtolower($section) == strtolower($menu_title));
}



function open_menu($section, $menu_title, $classes = array()){

	$link_string = '<li ';

	if(is_active($section, $menu_title)){
		$classes[] = 'active';
	}

	if(!empty($classes)){
		$class_string = implode($classes);		
		$link_string .= ' class="' . $class_string . '"';
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