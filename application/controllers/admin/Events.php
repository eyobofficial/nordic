<?php

class Events extends Admin_Controller {
	
	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
		//$this->data['admin_section'] = 'manage events';
	}


	public function index(){

		/**
		 * Add new language
		 */

		$this->data['inbox'] = $this->Message_model->inbox();
		$this->render('admin');
	}

}