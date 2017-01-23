<?php defined('BASEPATH') OR exit('No direct scrip is allowed');


class Public_Controller extends MY_Controller {

	public function __construct(){
		parent::__construct();


		/**
		 * Load necessary models, libraries and helpers
		 */
		$this->load->library(array('Translate'));



		$this->data['langs'] = $this->Lang_model->get_all();

		/**
		 * Setup currency
		 */
		if(!isset($this->session->currency_id)){
			$this->session->set_userdata('currency_id', 1);
		}

		$this->data['all_currency'] = $this->Currency_model->get_all();
	}





	public function translate_default_language(){
		echo 'Somethidng';
	}

} /*** End of Public_Controller ***/