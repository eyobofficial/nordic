<?php

class User_model extends MY_Model {

	/**
	 * Database table data
	 */
	protected $_table = 'users';		// table name
	protected $_table_pk = 'user_id'; // Primary key

	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
	}


	/**
	 * Log a user
	 */
	public function login($username, $password){

		if($this->row_exists(array('username' => $username))){
			$key = 'username';
		}elseif($this->row_exists(array('email' => $username))){
			$key = 'email';
		}else{
			return FALSE;
		}

		$user = $this->get_row_where(array($key => $username));

		if($password === $user->password){
			$data = array(
					'user_logged'     => TRUE, 
					'user_id'         => $user->user_id,
					'user_first_name' => $user->first_name,
					'user_last_name'  => $user->last_name,
					'user_email'      => $user->email,
					'user_photo'      => $user->profile_photo,
					'user_address1'   => $user->address1,
					'user_address2'   => $user->address2,
					'user_address1'   => $user->address1,
					'user_city'       => $user->city,
					'user_state'      => $user->state,
					'user_country_id' => $user->country_id,
				);

			$this->session->set_userdata($data);

			return TRUE;

		}else{
			return FALSE;
		}
	}



	/**
	 * Register New User
	 */













} /****** End User Model ************/