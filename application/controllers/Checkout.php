<?php

class Checkout extends Public_Controller {

	
	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();

		/**
		 * Checkout if item to buy is selected
		 */
		if(!isset($this->session->checkout ) OR $this->session->checkout !== TRUE){
			redirect('');
		}


		$this->data['view_url'] = 'templates/checkout/';
		$this->load->library(array('form_validation'));
		$this->load->model(array('User_model'));

	}

	/**
	 * Checkout starting page
	 */
	public function index(){

		if($this->input->post('guest_submit')){
			// Guest login

			$validation_rule = array(
					array('field' => 'first_name', 'label' => 'First Name', 'rules' => 'trim|required'),
					array('field' => 'last_name', 'label' => 'Last Name', 'rules' => 'trim|required'),
					array('field' => 'email', 'label' => 'email', 'rules' => 'trim|required|valid_email'),
				);

			$this->form_validation->set_rules($validation_rule);

			if($this->form_validation->run()){

				$data = array(
					'registered' => FALSE,
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'email'      => $this->input->post('email'),
					'update_me'  => $this->input->post('update_me') == 1 ? TRUE : FALSE,
					);
				

				$this->session->set_userdata('user', $data);

				redirect('test/index', 'auto');
			}else{
				$this->data['page_title'] = 'checkout';

				$this->data['main_view']        = $this->data['view_url'] . 'checkout_view';
				$this->data['checkout_main']    = $this->data['view_url'] . 'step1/checkout_main_view';
				$this->data['checkout_summary'] = $this->data['view_url'] . 'step1/summary_view';

				$this->render();
			}

		}elseif($this->input->post('login_submit')){
			// Login submit
			$validation_rule = array(
					array('field' => 'email', 'label' => 'Email or Username', 'rules' => 'trim|required'),
					array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required'),
				);

			$this->form_validation->set_rules($validation_rule);

			if($this->form_validation->run()){

				if($this->User_model->login($this->input->post('email'), $this->input->post('password'))){
					redirect('test/login', 'auto');
				}else{
					redirect('test/fail', 'auto');
				}

				
			}else{
				$this->data['page_title'] = 'checkout';

				$this->data['main_view']        = $this->data['view_url'] . 'checkout_view';
				$this->data['checkout_main']    = $this->data['view_url'] . 'step1/checkout_main_view';
				$this->data['checkout_summary'] = $this->data['view_url'] . 'step1/summary_view';

				$this->render();
			}


		}else{
			$this->data['page_title'] = 'checkout';

			$this->data['main_view']        = $this->data['view_url'] . 'checkout_view';
			$this->data['checkout_main']    = $this->data['view_url'] . 'step1/checkout_main_view';
			$this->data['checkout_summary'] = $this->data['view_url'] . 'step1/summary_view';

			$this->render();
		}
		
	}


	/**
	 * Step one - Delivery
	 */
	public function Delivery(){
		
	}














} /**** End of Checkout Controller ***/