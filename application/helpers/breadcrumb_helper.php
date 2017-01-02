<?php defined("BASEPATH") OR exit("No direct script allowed");

function breadcrumb($data = array()){
	$output  = '<ol class="breadcrumb">';
		foreach($data as $key => $value){
			$output .= '<li>' . anchor($key, ucwords($value)) . '</li>';	
		}
	$output .= '</ol>';

	return $output;
}