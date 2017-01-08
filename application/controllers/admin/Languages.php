<?php

class Languages extends Admin_Controller {


	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model(array('Lang_model'));
		$this->data['main_view'] = 'languages/';
	}



	public function index(){
		$this->all();
	}




	public function all(){

		if($this->input->post('add_lang')){
			$lang_name = strtolower(trim($this->input->post('lang_name')));
			$lang_code = strtoupper(trim($this->input->post('lang_code')));
			$lang_flag = $this->input->post('flag');


			$this->Lang_model->save(array('name' => $lang_name, 'abbr' => $lang_code));
		}


		if($this->input->post('edit_lang')){
			$lang_id   = (int)$this->input->post('lang_id');
			$lang_name = strtolower(trim($this->input->post('lang_name')));
			$lang_code = strtoupper(trim($this->input->post('lang_code')));
			$lang_flag = $this->input->post('flag');


			$this->Lang_model->save(array('name' => $lang_name, 'abbr' => $lang_code), array('id' => $lang_id));
		}



		$this->data['page_section'] = 'settings';
		$this->data['page_title']   = 'languages';

		$this->data['main_view'] .= 'all_languages_view';

		$this->data['langs'] = $this->Lang_model->get_all();

		$this->render('admin');
	}




	/**
	 * Delete a language by id
	 */
	public function delete($lang_id){
		$this->Lang_model->delete(array('id' => $lang_id));

		$this->all();
	}









} /****** End of Languages Controller Class *****/