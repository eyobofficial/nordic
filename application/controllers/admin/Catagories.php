<?php


/**
 * Catagories Controller: Handles Admin Catagory features
 *
 * LIST OF METHODS
 * ------------------
 * 1. index()	  : Handles the index view of the catagory 
 *
 * 2. all()		  : Displays all Catagories 
 *
 * 3. add()		  : Add New Catagories
 *
 * 4. edit()      : Edit Existing Catagory details (but not the translations)
 *
 * 5. delete()	  : Delete existing Catagory
 *
 * 6. Translation : Handles translations for the a Catagory (i.e. Add, Edit and Delete translations)
 *
 */



/*-------------------------------------------------- CATAGORY CLASS ------------------------------------------------ */
class Catagories extends Admin_Controller {


	/*-------------------------- CONSTRUCTOR METHOD -------------------------------------*/
	public function __construct(){
		parent::__construct();
		$this->load->model(array('Cat_model', 'Cat_langs_model', 'Lang_model'));

		$this->data['page_section'] = 'catagories';
		$this->data['main_view'] = 'catagory/';
	}







	/*-------------------------- INDEX METHOD -------------------------------------*/

	public function index($cat_id = NULL){
		if($cat_id === NULL){

			// Get all catagories
			$this->all();

		}else{

			// Get a catagory by id
		}
	}




	/*-------------------------- ALL METHOD -------------------------------------*/
	/**
	 * Display all Catagories
	 */
	public function all(){
		$this->data['main_view'] .= 'all_catagories_view';
		$this->data['page_title'] = 'All Catagories';


		$this->data['catagories'] = $this->Cat_model->get_all();

		$this->render('admin');
	}




	/*-------------------------- ID METHOD -------------------------------------*/
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



	/*-------------------------- ADD METHOD -------------------------------------*/
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



	/*-------------------------- EDIT METHOD -------------------------------------*/
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



	
	/*-------------------------- DELETE METHOD -------------------------------------*/
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



	/*-------------------------- TRANSLATION METHOD -------------------------------------*/
	/**
	 * Handle Translations of a Catagory
	 */
	public function translation(){

		/**
		 * Method handles 3 cases:
		 * 
		 * Case 1: Add New Translatios
		 * Case 2: Edit Existing Translations
		 * Case 3: Delete Existing Translations
		 */

		// Case 1: Add New Translations
		if($this->input->post('submit_add_trans')){

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

		// Case 2: Edit Existing Translation
		}elseif($this->input->post('submit_edit_trans')){

			// Get Catagory and Translation ID
			$cat_id  = $this->input->post('cat_id');
			$trans_id = $this->input->post('translation_id');

			// Load form validation libarary
			$this->load->library(array('form_validation'));

			// Change error message delimeter
			$this->form_validation->set_error_delimiters('<p class="text-danger bold"><span class="fa fa-exclamation-circle"></span>&nbsp; ', '</p>');

			// Set validation rule
			$this->form_validation->set_rules('cat_title', '&apos;Title&apos;', 'trim|required');


			// Check the validation
			if($this->form_validation->run() == TRUE){

				// Valiation is successful
				$title   = $this->input->post('cat_title');
				$summary = nl2br($this->input->post('cat_desc'));

				$data = array(
						'title'   => $title,
						'summary' => $summary
					);

				$this->Cat_langs_model->save($data, array('id' => $trans_id));
			}
				

			$this->id($cat_id);

		// Case 3: Delete Existing Translation	
		}elseif($this->input->post('delete_trans')){

			// Get Catagory and Translation id
			$cat_id  = $this->input->post('cat_id');
			$trans_id = $this->input->post('translation_id');


			$this->Cat_langs_model->delete(array('id' => $trans_id));
			$this->id($cat_id);

		// Default Case	
		}else{
			$this->all();
		}


	}/***** End translation() method ********/



	









} /***** End Catagories Class *********/