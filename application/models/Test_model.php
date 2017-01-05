<?php

class Test_model extends MY_Model {

	protected $_table = 'test';
	protected $_table_pk = 'test_id';

	public $test_id;
	public $name;
	public $price;


	public function __construct(){
		parent::__construct();
	}


}