<?php


/**
 * Events Controller: Handles Admin Events pages and features
 *
 * LIST OF METHODS
 * ------------------
 * 0. constructor   : Load necessary libraries, helpers and models
 *
 * 1. index()	    : Handles the default views of the events page requests
 *
 * 2. all()		    : Displays all events 
 *
 * 3. id()		    : Dispaly a single event
 *
 * 4. add()		    : Displays and process add new event page
 *
 * 5. details()     : Edit event details
 *
 * 6. summary()	    : Edit event description
 *
 * 7. delete()	    : Delete existing Catagory
 *
 * 8. Translation() : Handles translations for the a Catagory (i.e. Add, Edit and Delete translations)
 *
 * 9. Publish()     : Publish and unpublish event
 *
 */




class Events extends Admin_Controller {
	
/*------------------------------------------------- 0) CONSTRUCTOR ---------------------------------------------------------------*/
	public function __construct(){
		parent::__construct();
		$this->load->model(array('Event_model', 'Cat_model', 'Event_langs_model', 'Lang_model'));
		$this->load->library(array('form_validation'));
		$this->data['page_section'] = 'events';
		$this->data['main_view'] = 'events/';
		$this->data['modal_view'] = 'events/modals/';
	}




/*------------------------------------------------- 1) INDEX METHOD ----------------------------------------------------------*/
	public function index($event_id = NULL){
		if($event_id === NULL){

			// Get all catagories
			$this->all();
		}else{
			$this->id($event_id);
		}		
	}


/*-------------------------=----------------------- 2) ALL METHODS --------------------------------------------------------*/

	/**
	 * Display all events 
	 * 
	 * @param 		int
	 *
	 */
	public function all(){
		$this->data['events']     = $this->Event_model->get_all();
		$this->data['main_view'] .= 'all_events_view';
		$this->data['page_title'] = 'All Events';

		$this->render('admin');

	} /****** End of all() **************/





/*---------------------------------------------------- 3) ID METHOD ------------------------------------------------------*/

	/**
	 * Display a single event using event id
	 *
	 * @param 	int
	 *
	 */
	public function id($event_id){

		if($this->Event_model->get($event_id)){
			$event         = $this->Event_model->get($event_id);
			$catagory      = $this->Cat_model->get($event->catagory_id);
			
			$this->data['event']         = $event;
			$this->data['catagory']      = $catagory;
			$this->data['catagories']    = $this->Cat_model->get_all();
			$this->data['translations']  = $this->Event_langs_model->get_where(array('event_id' => $event_id));
			$this->data['all_languages'] = $this->Lang_model->get_all();
			$this->data['main_view']    .= 'event_view';
			$this->data['page_title']    = 'All Events';
			$this->render('admin');

		}else{
			redirect('admin/events');
		}
		
	}/**** End of id() method ****/



/*----------------------------------------------------- 4) ADD METHOD -------------------------------------------------------*/

	/**
	 * Add a new event 
	 *
	 */
	public function add(){
		if($this->input->post('submit_add')){

			// Change error message delimeter
			$this->form_validation->set_error_delimiters('<p class="text-danger bold"><span class="fa fa-exclamation-circle"></span>&nbsp; ', '</p>');

			// Set validation rule
			$this->form_validation->set_rules('event_title', '&apos;Event Title&apos;', 'trim|required|max_length[20]');
			$this->form_validation->set_rules('event_catagory', '&apos;Event Catagory&apos;', 'required');

			// Check the validation
			if($this->form_validation->run() == TRUE){
				// Valiation is successful

				// Retrieve from POST global variables
				$event_title = $this->input->post(trim('event_title'));
				$event_cat   = $this->input->post(trim('event_catagory'));


				// Insert 'event title' & 'event catagory' into 'events' table of database
				$event_id = $this->Event_model->save(array(
											'default_title' => $event_title, 
											'catagory_id'   => (int)$event_cat,
											));

				// Success flash session message
				$status = array(
								'status' => 'success',
								'msg'    =>  'You have successfully created a new Event'
							);

				$this->session->set_flashdata('flash_msg', $status);
						

				// Redirect to newly created event
				redirect('admin/events/id/' . $event_id);

			}else{
				// Validation failed
				$this->data['catagories'] = $this->Cat_model->get_all();
				$this->data['main_view'] .= 'add_event_view';
				$this->data['page_title'] = 'Add Event';
				$this->render('admin');
			}

		}else{
			$this->data['catagories'] = $this->Cat_model->get_all();

			$this->data['main_view'] .= 'add_event_view';
			$this->data['page_title'] = 'Add Event';
			$this->render('admin');
		}
		
	}


/*-----------------------------------------------------5) DETAILS METHOD ------------------------------------------------*/
	/**
	 * Edit event details
	 *
	 * @param  	int 
	 *
	 */
	public function details($event_id){

		if($this->input->post('submit_details')){

			// Change error message delimeter
			$this->form_validation->set_error_delimiters('<p class="text-danger bold"><span class="fa fa-exclamation-circle"></span>&nbsp; ', '</p>');

			// Set validation rule
			$this->form_validation->set_rules('event_title', '&apos;Event Title&apos;', 'trim|required');
			$this->form_validation->set_rules('event_catagory', '&apos;Event Catagory&apos;', 'required');
			$this->form_validation->set_rules('city', '&apos;Event Title&apos;', 'trim|required');


			// Check the validation
			if($this->form_validation->run() == TRUE){
				// Valiation is successful

				// Retrieve from POST global variables
				$event_title = $this->input->post(trim('event_title'));
				$event_cat   = (int)$this->input->post('event_catagory');
				$event_venue  = $this->input->post(trim('event_venue'));
				$event_city  = $this->input->post(trim('city'));



				// Update details
				$this->Event_model->save(array(
											'default_title' => $event_title, 
											'catagory_id'   => (int)$event_cat,
											'venue'         => $event_venue,
											'city'          => $event_city
											), 
										array(
											'id' => $event_id
											));

				// Success flash session message
				$status = array(
								'status' => 'success',
								'msg'    =>  'You have successfully updated the Event details'
							);

				$this->session->set_flashdata('flash_msg', $status);


				// Redirect to event home page
				redirect('admin/events/id/' . $event_id);

			}else{
				$this->id($event_id);
			}
		}else{
			// Redirect to event home page
			redirect('admin/events/id/' . $event_id);
		}
	
	} /******* End details() Method ************/






/*--------------------------------------------------- 6) SUMMARY METHOD -----------------------------------------------------------------*/

	/**
	 * Edit the event description 
	 *
	 * @param 	int
	 *
	 */
	public function summary($event_id){
		if($this->input->post('submit_summary')){
			$summary = (string)trim($this->input->post('event_desc'));
			//$summary = nl2br($summary); 

			$this->Event_model->save(array('summary' => $summary), array('id' => $event_id));

			// Success flash session message
			$status = array(
							'status' => 'success',
							'msg'    =>  'You have successfully updated the Event description'
						);

			$this->session->set_flashdata('flash_msg', $status);
		}

		// Redirect to event home page
		redirect('admin/events/id/' . $event_id);


	} /***** End of summary() method *****/






/*--------------------------------------------------- 7) DELETE METHOD ------------------------------------------------------------*/

	/**
	 * Delete an event 
	 * 
	 */
	public function delete($event_id = NULL){
		if($event_id == NULL){
			redirect('admin/events');
		}else{
			$this->Event_langs_model->delete(array('event_id' => $event_id));
			$this->Event_model->delete(array('id' => $event_id));

			// Success flash session message
			$status = array(
							'status' => 'success',
							'msg'    =>  'You have successfully deleted an Event'
						);

			$this->session->set_flashdata('flash_msg', $status);

			// Redirect to all events page
			redirect('admin/events');
		}

	} /******** End delete() method **********/





/*------------------------------------------------------ 8) TRANSLATION METHOD ------------------------------------------------------*/

	/**
	 * Add, edit and delete event translations
	 * Method handles 3 cases:
	 * 
	 * Case 1: Add New Translatios
	 * Case 2: Edit Existing Translations
	 * Case 3: Delete Existing Translations
	 */
	public function translation(){

		// Case 1: Add New Translations
		if($this->input->post('submit_add_trans')){

			// Get event id
			$event_id  = $this->input->post('event_id');


			// Change error message delimeter
			$this->form_validation->set_error_delimiters('<p class="text-danger bold"><span class="fa fa-exclamation-circle"></span>&nbsp; ', '</p>');

			// Set validation rule
			$this->form_validation->set_rules('event_title', '&apos;Title&apos;', 'trim|required');
			$this->form_validation->set_rules('lang', '&apos;Language&apos;', 'required');


			// Check the validation
			if($this->form_validation->run() == TRUE){

				// Valiation is successful
				$lang_id = $this->input->post('lang');
				$title   = $this->input->post('event_title');
				$summary = $this->input->post('event_desc');

				$data = array(
						'event_id'  => $event_id,
						'lang_id'   => $lang_id,
						'title'     => $title,
						'summary'   => $summary
					);

				$this->Event_langs_model->save($data);

				// Success flash session message
				$status = array(
								'status' => 'success',
								'msg'    =>  'You have successfully created a new translation for the Event'
							);

				$this->session->set_flashdata('flash_msg', $status);

				// Redirect to the event
				redirect('admin/events/id/' . $event_id);

			}else{
				// Validation Failed
				$this->id($event_id);
			}
						

		// Case 2: Edit Existing Translation
		}elseif($this->input->post('submit_edit_trans')){

			// Get Event and Translation ID
			$event_id  = $this->input->post('event_id');
			$trans_id  = $this->input->post('translation_id');

			// Change error message delimeter
			$this->form_validation->set_error_delimiters('<p class="text-danger bold"><span class="fa fa-exclamation-circle"></span>&nbsp; ', '</p>');

			// Set validation rule
			$this->form_validation->set_rules('event_title', '&apos;Title&apos;', 'trim|required');


			// Check the validation
			if($this->form_validation->run() == TRUE){

				// Valiation is successful
				$title   = $this->input->post('event_title');
				$summary = $this->input->post('event_desc');

				$data = array(
						'title'   => $title,
						'summary' => $summary
					);

				$this->Event_langs_model->save($data, array('id' => $trans_id));

				// Success flash session message
				$status = array(
								'status' => 'success',
								'msg'    =>  'You have successfully updated the translation for this Event'
							);

				$this->session->set_flashdata('flash_msg', $status);


				redirect('admin/events/id/' . $event_id);

			}else{
				// Validation Failed
				$this->id($event_id);
			}

		// Case 3: Delete Existing Translation	
		}elseif($this->input->post('delete_trans')){

			// Get Catagory and Translation id
			$event_id  = $this->input->post('event_id');
			$trans_id  = $this->input->post('translation_id');


			$this->Event_langs_model->delete(array('id' => $trans_id));

			// Success flash session message
			$status = array(
							'status' => 'success',
							'msg'    =>  'You have successfully deleted a translation.'
						);

			$this->session->set_flashdata('flash_msg', $status);


			redirect('admin/events/id/' . $event_id);

		// Default Case	
		}else{
			redirect('admin/events');
		}


	}/***** End translation() method ********/



/*--------------------------------------------------- 7) DELETE METHOD ------------------------------------------------------------*/

	/**
	 * Delete an event 
	 * 
	 */
	public function publish($event_id){

		$event = $this->Event_model->get($event_id);

		// If the event is published, Unpublish it
		if($event->publish == 1){

			$publish_action = 0;
			$publish_msg    = 'unpublished';

		// If the event is Unpublished
		}else{

			$publish_action = 1;
			$publish_msg    = 'published';
		}


		$this->Event_model->save(array('publish' => $publish_action), array('id' => $event_id));

		// Success flash session message
		$status = array(
						'status' => 'success',
						'msg'    =>  'You have successfully ' . $publish_msg . ' the Event.'
					);

		$this->session->set_flashdata('flash_msg', $status);


		redirect('admin/events/id/' . $event_id);
	}






} /********* End of Events controller class *******/