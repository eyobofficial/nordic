<?php

class Event_model extends MY_Model {

	/**
	 * Table properites
	 */
	protected $_table = "events";
	protected $_pk = "id";


	/*public $id;
	public $event_type_id;
	public $name;
	public $overview;
	public $venue;
	public $city;
	public $country_id;
	public $date;
	public $position;
	public $visible;
	public $featured;
	public $photo;*/

	public function __construct(){
		parent::__construct();
	}


	/**
	 * Get featured events
	 */
	public function get_featured($limit = NULL, $offset = 0){

		return $this->get_where(array('featured' => 1), $limit, $offset);
	}


	/**
	 * Get event by slug
	 * 
	 * @param 	string
	 * @return 	row object
	 */
	public function get_by_slug($slug){
		return $this->db->get_where($this->_table, array('slug' => $slug))->row();
	}






























} /******* End Event_model Model ************/