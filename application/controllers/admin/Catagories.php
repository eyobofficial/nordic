<?php


class Catagories extends Admin_Controller {

	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model(array('Cat_model', 'Cat_langs_model', 'Lang_model'));

		$this->data['page_section'] = 'catagories';
		$this->data['main_view'] = 'catagory/';
	}


	/**
	 * Index Page
	 */
	public function index($cat_id = NULL){
		if($cat_id === NULL){

			// Get all catagories
			$this->all();

		}else{

			// Get a catagory by id
		}
	}


	/**
	 * Display all Catagories
	 */
	public function all(){
		$this->data['main_view'] .= 'all_catagories_view';
		$this->data['page_title'] = 'All Catagories';


		$this->data['catagories'] = $this->Cat_model->get_all();

		$this->render('admin');
	}


	/**
	 * Display a Catagory
	 */
	public function id($cat_id){
		$this->data['page_title'] = 'All Catagories';


		if($this->Cat_model->get($cat_id)){
			$this->data['catagory']      = $this->Cat_model->get($cat_id);
			$this->data['translations']  = $this->Cat_langs_model->get_where(array('cat_id' => $cat_id));
			$this->data['all_languages'] = $this->Lang_model->get_all();
			$this->data['main_view']    .= 'catagory_view';
			$this->render('admin');
		}else{
			$this->all();
		}
		
	}




	/**
	 * Edit a catagory
	 */
	public function edit(){
		if($this->input->post('submit_details')){

			// Catagory id
			$cat_id = $this->input->post('catagory_id');

			// Load form validation libarary
			$this->load->library(array('form_validation'));

			// Change error message delimeter
			$this->form_validation->set_error_delimiters('<p class="text-danger bold"><span class="fa fa-exclamation-circle"></span>&nbsp; ', '</p>');

			// Set validation rule
			$this->form_validation->set_rules('cat_title', '&apos;Catagory Title&apos;', 'trim|required');


			/**
			 * Check validations
			 */
			if($this->form_validation->run() == TRUE){
				// Validation Success
				$cat_title = $this->input->post('cat_title');
				$cat_desc  = nl2br($this->input->post('cat_desc'));

				$this->Cat_model->save(
					array('default_title' => $cat_title, 'default_summary' => $cat_desc),
					array('id' => $cat_id)
					);

				$this->id($cat_id);

			}else{
				// Validation failed - Redirect to page
				$this->id($this->input->post($cat_id));
			}

		}elseif($this->input->post('submit_photo')){
			echo "photo";
		}else{
			$this->all();
		}

	} // End of edit() method



	/**
	 * Add new catagory
	 */
	public function add(){

		if($this->input->post('submit')){

			// Load form validation libarary
			$this->load->library(array('form_validation'));

			// Change error message delimeter
			$this->form_validation->set_error_delimiters('<p class="text-danger bold"><span class="fa fa-exclamation-circle"></span>&nbsp; ', '</p>');

			// Set validation rule
			$this->form_validation->set_rules('cat_title', '&apos;Title&apos;', 'trim|required|max_length[20]');


			// Check the validation
			if($this->form_validation->run() == TRUE){
				// Valiation is successful
				

				// Retrieve from POST global variables
				$cat_title = $this->input->post(trim('cat_title'));
				$cat_desc  = nl2br($this->input->post(trim('cat_desc')));


				// Insert 'title' & 'summary' into 'Catagories' table of database
				$this->Cat_model->save(array('default_title' => $cat_title, 'default_summary' => $cat_desc));
						

				// Redirect to All Catagories page
				$this->all();

			}else{
				// Validation failed
				$this->data['main_view'] .= 'add_catagory_view';
				$this->data['page_title'] = 'Add Catagory';
				$this->render('admin');
			}

		}else{
			$this->data['main_view'] .= 'add_catagory_view';
			$this->data['page_title'] = 'Add Catagory';
			$this->render('admin');
		}

	}





	/**
	 * Add new translations
	 */
	public function translation(){
		if($this->input->post('submit_lang')){

			// Get catagory id
			$cat_id  = $this->input->post('cat_id');

			// Load form validation libarary
			$this->load->library(array('form_validation'));

			// Change error message delimeter
			$this->form_validation->set_error_delimiters('<p class="text-danger bold"><span class="fa fa-exclamation-circle"></span>&nbsp; ', '</p>');

			// Set validation rule
			$this->form_validation->set_rules('cat_title', '&apos;Title&apos;', 'trim|required');


			// Check the validation
			if($this->form_validation->run() == TRUE){

				// Valiation is successful
				$lang_id = $this->input->post('lang');
				$title   = $this->input->post('cat_title');
				$summary = nl2br($this->input->post('cat_desc'));

				$data = array(
						'cat_id'  => $cat_id,
						'lang_id' => $lang_id,
						'title'   => $title,
						'summary' => $summary
					);

				$this->Cat_langs_model->save($data);
			}
				

			$this->id($cat_id);

		}else{
			$this->all();
		}

	}/***** End add_lang() method ********/



	/**
	 * Delete catagory
	 */
	public function delete($cat_id = NULL){
		if($cat_id == NULL){
			$this->all();

		}else{
			$this->Cat_langs_model->delete(array('cat_id' => $cat_id));
			$this->Cat_model->delete(array('id' => $cat_id));			
			$this->all();
		}
	}









} /***** End Catagories Class *********/