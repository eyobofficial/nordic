<?php defined("BASEPATH") OR exit("No direct script allowed");

function flash($flash_msg = NULL){


	if(!empty($flash_msg)){
		switch ($flash_msg['status']) {
			case 'success':
				$panel_type = 'panel-success';
				$text_type  = 'text-success';
				$icon       = 'fa fa-check';
				break;

			case 'warning':
				$panel_type = 'panel-warning';
				$text_type  = 'text-warning';
				$icon       = 'fa fa-exclamation-triangle';
				break;

			case 'error':
				$panel_type = 'panel-danger';
				$text_type  = 'text-danger';
				$icon       = 'fa fa-exclamation-circle';
				break;


			default:
				$panel_type = 'panel-info';
				$text_type  = 'text-info';
				$icon       = 'fa fa-info-circle';
				break;
		}


		$output  = "<div class='panel {$panel_type}'>";
		$output .= "<div class='panel-body'>";
		$output .= "<h4 class='i {$text_type}'><span class='{$icon}'></span>&nbsp; ";
		$output .= $flash_msg['msg'];
		$output .= '</h4></div></div>';

		return $output;
	}else{
		return NULL;
	}
}