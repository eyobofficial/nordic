<?php

class Test extends Public_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('Ticket_model', 'Event_model', 'Lang_model'));
		$this->load->library(array('translate'));
		$this->session->set_userdata('lang', 99);
	}



	public function index(){

		$langs = $this->Lang_model->get_all();
		$this->data['langs'] = $langs;

		$this->load->view('public/test_view', $this->data);
	}




	public function my_link(){
		echo uri_string('test');
	}



} /***** End Test ********/