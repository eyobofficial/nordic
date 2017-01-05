<?php

class Events extends Admin_Controller {
	
	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
		$this->data['page_section'] = 'events';
		$this->data['main_view'] = 'events/';
		$this->data['modal_view'] = 'events/modals/';
	}


	public function index($event_id = NULL){
		if($event_id === NULL){

			// Get all catagories
			$this->all();
		}else{
			// Get a catagory by id
		}		
	}


	/**
	 * All Events
	 */
	public function all(){
		$this->data['main_view'] .= 'all_events_view';
		$this->data['page_title'] = 'All Events';

		$this->render('admin');
	}


	/**
	 * An Event
	 */
	public function event(){
		$this->data['main_view']  .= 'event_view';
		$this->data['page_title']  = 'All Events';
		$this->data['modal_view'] .= 'test_modal';
		$this->data['modal_title'] = 'Some Cool Events';
		$this->data['modal_id']    = 'testModal';

		$this->render('admin');
	}



	/**
	 * Add new event
	 */
	public function add(){
		$this->data['main_view'] .= 'add_event_view';
		$this->data['page_title'] = 'Add Event';
		$this->render('admin');
	}



	/**
	 * Edit event details
	 */
	public function event_details(){
		echo "please!";
	}







} /********* End of Events controller class *******/