<?php


class Event_langs_model extends MY_Model {
	
	protected $_table = 'event_langs';


	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
	}




	public function get_row($data){

		$this->db->where($data);

		
		return $this->db->get($this->_table)->row();
	}
}