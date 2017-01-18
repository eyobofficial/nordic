<?php

class Events extends Public_Controller {

	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model(array('Event_model', 'Cat_model', 'Ticket_model'));
		$this->load->helper(array('breadcrumb'));
	}



	public function index(){

		//$this->data['featured_events'] = $this->Event_model->get_where(array('featured' => 1));
		$this->data['featured_events'] = $this->Event_model->get_featured();
		$this->data['recent_events']   = $this->Event_model->get_all();




		$this->data['page_title'] = "home";

		$this->data['main_view'] = "events/home_view";

		$this->render();
	}


	/**
	 * Event catagories
	 */
	public function catagory($catagory_id = NULL){

		if($catagory_id == NULL OR ! $this->Cat_model->row_exists(array('id' => $catagory_id))){
			$this->data['page_title'] = "events";
			$this->data['heading'] = "all events";

			$this->data['events'] = $this->Event_model->get_all();

		}else{
			$catagory = $this->Cat_model->get($catagory_id);

			$this->data['page_title'] = $catagory->name;
			$this->data['heading'] = $catagory->name . " Events";

			$this->data['events'] = $this->Event_model->get_where(array('id' => $catagory_id));
		}


		$this->data['main_view'] = "events/events_view";
		$this->render();

	}


	/**
	 * Display a single event by id
	 */
	public function id($event_id = NULL){

		// If 'buy now' form is submitted
		if($this->input->post('quantity')){
			$event  = $this->Event_model->get($this->input->post('id'));
			$ticket = $this->Ticket_model->get($this->input->post('id'));

			$data = array();


			$data['checkout']   = TRUE;
			$data['quantity']   = $this->input->post('quantity');
			$data['event']      = $this->Event_model->get($this->input->post('id'));
			$data['ticket']     = $this->Ticket_model->get($this->input->post('id'));
			$data['subtotal']   = $this->input->post('quantity') * $ticket->ticket_price;


			$this->session->set_userdata($data);
			redirect('checkout', 'auto');
		}

		// Else
		if($event_id === NULL OR ! $this->Event_model->row_exists(array('id' => $event_id))){
			redirect('events/');
		}

		$this->data['event'] = $this->Event_model->get($event_id);	


		$this->data['tickets'] = $this->Ticket_model->get_where(array('event_id' => $event_id));


		$this->data['page_title'] = $this->Cat_model->get($this->data['event']->catagory_id)->name;
		$this->data['meta_title'] = $this->data['event']->event_title;


		$this->data['main_view'] = 'events/event_view';
		$this->render();
	}

	/**
	 * Display a single event by title
	 */
	public function title($slug = NULL){

		if($slug === NULL OR ! $this->Event_model->row_exists(array('slug' => $slug))){
			redirect('events/');
		}

		$this->data['event'] = $this->Event_model->get_by_slug($slug);	
		$this->data['tickets'] = $this->Ticket_model->get_where(array('event_id' => $this->data['event']->event_id));

		$this->data['page_title'] = $this->Event_type_model->get($this->data['event']->event_type_id)->type;
		$this->data['meta_title'] = $this->data['event']->event_title;


		$this->data['main_view'] = 'events/event_view';
		$this->render();
	}


	/**
	 * Change currency
	 */
	public function change_currency(){

		if(! $this->input->post('currency_id')){
			if($this->input->post('current_url')){
				redirect($this->input->post('current_url'), 'auto');
			}else{
				redirect(site_url(), 'auto');
			}
		}

		$currency_id = $this->input->post('currency_id');
		$current_url = $this->input->post('current_url');

		$this->session->set_userdata('currency_id', $currency_id);

		redirect($current_url, 'auto');
	}
	





} /**** End Events Controller  *******/