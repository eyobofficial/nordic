<?php defined('BASEPATH') OR exit('No direct script allowed');


class MY_Controller extends CI_Controller {
	
	public $data = array();

	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();

		$this->load->library(array('session'));

		$this->data['site_name']    = $this->config->item('site_name');
		$this->data['tagline']      = $this->config->item('tagline');
		$this->data['author']       = $this->config->item('author');
		$this->data['author_email'] = $this->config->item('author_email');
		$this->data['admin']        = FALSE; 


		
	}


	/**
	 * Render pages
	 */
	public function render($view_profile = 'public'){

		/**
		 * Templates URL
		 */
		$public_template = 'public/templates/public_template';  // Public (Front-End) template url
		$admin_template  = 'admin/templates/admin_template';  // Admin (Back-End) template url

		if(strtolower($view_profile) == 'public'){
			
			$this->load->view($public_template, $this->data);

		}elseif(strtolower($view_profile) == 'admin'){
			$this->load->view($admin_template, $this->data); 

		}else{
			echo show_404();
		}

		
	}




	/**
	 * Render Modals
	 */
	public function modal($modal_id){
		$this->data['modal_id'] = $modal_id;
		$template = 'admin/templates/modal_template';
		$this->load->view($template, $this->data);
	}


	/**
	 * Show pages in provided stack
	 */
	public function display($sections = array()){
		if(!empty($sections)){
			foreach($sections as $section){
				$this->load->view($section, $this->data);
			}
		}
	}











} /*** End of MY_Controller Base Controller ***/