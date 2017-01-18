<?php

class Events extends Admin_Controller {
	
	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model(array('Event_model', 'Cat_model', 'Event_langs_model', 'Lang_model'));
		$this->load->library(array('form_validation'));
		$this->data['page_section'] = 'events';
		$this->data['main_view'] = 'events/';
		$this->data['modal_view'] = 'events/modals/';
	}


	public function index($event_id = NULL){
		if($event_id === NULL){

			// Get all catagories
			$this->all();
		}else{
			$this->id($event_id);
		}		
	}


	/**
	 * All Events
	 */
	public function all(){
		$this->data['events']     = $this->Event_model->get_all();
		$this->data['main_view'] .= 'all_events_view';
		$this->data['page_title'] = 'All Events';

		$this->render('admin');
	}


	/*-------------------------- ID METHOD -------------------------------------*/
	/**
	 * Display a Catagory
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
		
	}/**** End id() method ****/




	/**
	 * Add new event
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



	/**
	 * Edit event details
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
				// Redirect to event home page
				redirect('admin/events/id/' . $event_id);

			}else{
				$this->id($event_id);
			}
		}else{
			// Redirect to event home page
			redirect('admin/events/id/' . $event_id);
		}
	
	}







} /********* End of Events controller class *******/