<?php defined('BASEPATH') OR exit('No direct script allowed');


class Admin_Controller extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('Message_model', 'Lang_model'));
		$this->load->helper(array('nav'));
		$this->data['admin'] = TRUE;
		$this->data['page_title'] = '';
	}












} /*** End Admin Controller Class ******/