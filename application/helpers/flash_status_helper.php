<?php defined("BASEPATH") OR exit("No direct script allowed");

function flash($flash_msg = NULL, $debugg = FALSE){

	// For debugging mode, pass the debugg argument TRUE
	if($debugg == TRUE){
		print_r($flash_msg);
		return NULL;
	}

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


		$output = '';
		$output .= "<div class='panel {$panel_type}'>";
		$output .= "<div class='panel-body'>";


		// If message is sent in an array
		if(is_array($flash_msg['msg'])){
			$msgs = $flash_msg['msg'];

			foreach($msgs as $msg){
				if(empty($msg)){
					continue;
				}

				$output .= "<h4 class='i {$text_type}'><span class='{$icon}'></span>&nbsp; ";
				$output .= $msg;
				$output .= '</h4>';
			}

		}else{ // If message is sent as a string

			$output .= "<h4 class='i {$text_type}'><span class='{$icon}'></span>&nbsp; ";
			$output .= $flash_msg['msg'];
			$output .= '</h4>';
		}


		$output .= '</div></div>';

		return $output;
	}else{
		return NULL;
	}
}