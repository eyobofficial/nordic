<?php

class Dashboard extends Admin_Controller {

	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model(array('Message_model', 'Lang_model'));
		$this->data['page_section'] = 'dashboard';
	}


	public function index(){

		/**
		 * Add new language
		 */

		$this->data['inbox'] = $this->Message_model->inbox();
		$this->render('admin');
	}






} /**** End Dashboard Controller  *******/