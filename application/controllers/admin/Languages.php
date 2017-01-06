<?php

class Languages extends Admin_Controller {


	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
		$this->data['main_view'] = 'languages/';
	}



	public function index(){
		$this->all_languages();
	}




	public function all_languages(){
		$this->data['page_section'] = 'settings';
		$this->data['page_title']   = 'languages';

		$this->data['main_view'] .= 'all_languages_view';

		$this->render('admin');
	}









} /****** End of Languages Controller Class *****/