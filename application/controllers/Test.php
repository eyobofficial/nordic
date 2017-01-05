<?php

class Test extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('Ticket_model', 'Event_model'));
	}



	public function index(){
		echo "<u>Test Controller</u>";
		echo "<pre>";


		foreach($this->Event_model->get() as $event){

			//print_r($event);
			echo "<table>";
			echo "<tr>";
			echo "<td>" . $event->id . ")" . "</td>";
			echo "<td>" . $event->event_title . "</td>";
		}
	}



} /***** End Test ********/