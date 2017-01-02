<?php defined('BASEPATH') OR exit('No direct script is allowed');


class Currency {

	protected $ci;
	protected $currency;

	public function __construct(){
		//parent::__construct();
		$this->ci =& get_instance();
		$this->ci->load->model(array('Currency_model'));
		$this->ci->load->library('session');
		$this->currency = $this->ci->Currency_model->get($this->ci->session->id);
	}


	public function code(){
		return $this->currency->code;
	}



	public function convert($amount){

		$amount = (float)$amount;

		return $amount * $this->currency->rate;

	}



	public function convert_back($amount){

		$amount = (float)$amount;

		return $amount / $this->currency->rate;

	}












} /**** End Currency library ***********/