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


	/*--------------------------0) CONSTRUCTOR METHOD -------------------------------------*/
	public function __construct(){
		parent::__construct();

		$this->upload_path .= 'cats/';
		$this->load->model(array('Cat_model', 'Cat_langs_model', 'Lang_model', 'Event_model'));

		$this->data['page_section'] = 'catagories';
		$this->data['main_view'] = 'catagory/';
	}







	/*-------------------------- 1) INDEX METHOD -------------------------------------*/

	public function index($cat_id = NULL){
		if($cat_id === NULL){

			// Get all catagories
			$this->all();

		}else{

			// Get a catagory by id
			$this->id($cat_id);
		}
	}




	/*-------------------------- 2) ALL METHOD -------------------------------------*/
	/**
	 * Display all Catagories
	 */
	public function all(){
		$this->data['main_view'] .= 'all_catagories_view';
		$this->data['page_title'] = 'All Catagories';


		$this->data['catagories'] = $this->Cat_model->get_all();

		$this->render('admin');
	}




	/*-------------------------- 3) ID METHOD -------------------------------------*/
	/**
	 * Display a Catagory
	 */
	public function id($cat_id){
		$this->data['page_title'] = 'All Catagories';


		if($this->Cat_model->get($cat_id)){
			$this->data['catagory']      = $this->Cat_model->get($cat_id);
			$this->data['default_photo'] = $this->_photo_path($cat_id) . 'default_photo.jpg';
			$this->data['event_count']   = $this->Event_model->num_rows(array('catagory_id' => $cat_id));
			$this->data['translations']  = $this->Cat_langs_model->get_where(array('cat_id' => $cat_id));
			$this->data['all_languages'] = $this->Lang_model->get_all();
			$this->data['main_view']    .= 'catagory_view';
			$this->render('admin');
		}else{
			redirect('admin/catagories');
		}
		
	}



	/*-------------------------- 4) ADD METHOD -------------------------------------*/
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


				// Prep data for insertion
				$data = array('default_title' => $cat_title,
							  'default_summary' => $cat_desc
							);

				// Insert 'title' & 'summary' into 'Catagories' table of database
				if($cat_id = $this->Cat_model->save($data)){

					// Create upload director
					$cat_dir = $this->upload_path . 'cat' . $cat_id . '/';
					
					mkdir($dir_path, 0777, TRUE);

					// Success flash session message
					$status = array(
									'status' => 'success',
									'msg'    =>  'You successfully created a new Catagory'
								);

					$this->session->set_flashdata('flash_msg', $status);

				}
						
				
				// Redirect to All Catagories page
				redirect('admin/catagories/');

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



	/*-------------------------- 5) EDIT METHOD -------------------------------------*/
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

				// Success flash session message
				$status = array(
								'status' => 'success',
								'msg'    =>  'You have successfully updated the Catagory'
							);

				$this->session->set_flashdata('flash_msg', $status);

				redirect('admin/catagories/id/' . $cat_id);

			}else{
				// Validation failed - Redirect to page
				$this->id($this->input->post($cat_id));
			}

		}elseif($this->input->post('submit_photo')){
			echo "photo";
		}else{

			redirect('admin/catagories');
		}

	} // End of edit() method



	
	/*-------------------------- 6) DELETE METHOD -------------------------------------*/
	/**
	 * Delete catagory
	 */
	public function delete($cat_id = NULL){
		if($cat_id == NULL){
			redirect('admin/catagories');

		}else{

			// Check if the catagory contain events
			if($this->Event_model->num_rows(array('catagory_id' => $cat_id)) > 0){

				// Fail flash session message
				$status = array(
								'status' => 'error',
								'msg'    =>  'The Catagory you are trying to delete contains some Events. Please first delete the Events before attempting to delete the Catagory.'
							);

				$this->session->set_flashdata('flash_msg', $status);

				redirect('admin/catagories/id/' . $cat_id);
			}

			
			$this->Cat_langs_model->delete(array('cat_id' => $cat_id));
			$this->Cat_model->delete(array('id' => $cat_id));

			// Success flash session message
			$status = array(
							'status' => 'success',
							'msg'    =>  'You have successfully deleted a Catagory.'
						);

			$this->session->set_flashdata('flash_msg', $status);

			redirect('admin/catagories');
		}
	} 



	/*-------------------------- 7) TRANSLATION METHOD -------------------------------------*/
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

				// Success flash session message
				$status = array(
								'status' => 'success',
								'msg'    => 'You have successfully add a new Translation',
							);

				$this->session->set_flashdata('flash_msg', $status);

				redirect('admin/catagories/id/' . $cat_id);

			}else{
				// Validation Failed
				$this->id($cat_id);
			}
				
			

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

				// Success flash session message
				$status = array(
								'status' => 'success',
								'msg'    =>  'You have successfully updated the Translation'
							);

				$this->session->set_flashdata('flash_msg', $status);

				redirect('admin/catagories/id/' . $cat_id);

			}else{
				// Validation Failed
				$this->id($cat_id);
			}
				

		// Case 3: Delete Existing Translation	
		}elseif($this->input->post('delete_trans')){

			// Get Catagory and Translation id
			$cat_id  = $this->input->post('cat_id');
			$trans_id = $this->input->post('translation_id');


			$this->Cat_langs_model->delete(array('id' => $trans_id));

			// Success flash session message
			$status = array(
							'status' => 'success',
							'msg'    =>  'You successfully deleted a Translation'
						);

			$this->session->set_flashdata('flash_msg', $status);
			redirect('admin/catagories/id/' . $cat_id);

		// Default Case	
		}else{
			redirect('admin/catagories');
		}


	}/***** End translation() method ********/





	/*----------------------------------------- 8) DO UPLOAD METHOD -------------------------------------*/

	/**
	 * Upload a default catagory photo
	 */
	public function photo($cat_id){

		$config['upload_path']          = $this->upload_path . 'cat' . $cat_id. '/';
	    $config['allowed_types']        = 'jpg';
	    $config['max_size']             = 5000;
	    $config['file_name']            = 'default_photo';
	    $config['overwrite']            = TRUE;
	    $config['file_ext_tolower']     = TRUE;


	    $this->load->library('upload', $config);

	    $upload_field = 'cat_photo';

	    if ( ! $this->upload->do_upload($upload_field)){
	            $error = array('error' => $this->upload->display_errors());

	            // Error flash session message
	            $status = array(
	            				'status' => 'error',
	            				'msg'    =>  $this->upload->display_errors('<span>', '</span>')
	            			);

	            $this->session->set_flashdata('flash_msg', $status);
	           
	    }else{
	            $data = array('upload_data' => $this->upload->data());

	           // Error flash session message
	           $status = array(
	           				'status' => 'success',
	           				'msg'    =>  'You have successfully uploaded a default photo'
	           			);

	           $this->session->set_flashdata('flash_msg', $status);
	    }

	    redirect('admin/catagories/id/' . $cat_id);
	} /****** End of do_upload() method **********/






	protected function _photo_path($cat_id){
		return $this->upload_path . 'cat' . $cat_id . '/';
	}


	









} /***** End Catagories Class *********/