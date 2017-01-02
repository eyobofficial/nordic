<?php defined('BASEPATH') OR exit('No direct script allowed');


class Admin_Controller extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('Message_model', 'Lang_model'));
		$this->data['admin'] = TRUE;
	}












} /*** End Admin Controller Class ******/