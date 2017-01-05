<?php

class Message_model extends MY_Model {

	protected $_table = 'messages';
	protected $_table_pk = 'id';



	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
	}


	/**
	 * New messages count
	 */
	public function inbox(){
		$this->db->where(array('seen' => 0));

		return $this->db->get($this->_table)->num_rows();
	}






} /***** End of Message Class ***/