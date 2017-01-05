<?php defined('BASEPATH') OR exit('No direct script is allowed');


class MY_Model extends CI_Model {
	/**
	 * Database table properties
	 */
	protected $_table = "abstract";
	protected $_pk = "id"; // Primary Key


	/**
	 * Database table fields
	 */
	protected $_created_date = "created_date";
	protected $_updated_date = "updated_date";


	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	/*-----------------------------------------------------------*/

	/**
	 * Get a single row object from by id
	 *
	 * @param   int
	 * @return  object
	 */
	public function get($id = NULL){
		if($id === NULL){
			$method = 'result';
		}else{
			$this->db->where(array($this->_pk => $id));
			$method = 'row';
		}


		return $this->db->get($this->_table)->$method();
	}

	/*-----------------------------------------------------------*/

	/**
	 * Get result object of all rows from table
	 *
	 * @param   void
	 * @return  mixed
	 */
	public function get_all($limit = NULL, $offset = 0){
		$this->db->limit($limit, $offset);
		return $this->db->get($this->_table)->result();
	}

	/*-----------------------------------------------------------*/

	/**
	 * Get result object of rows from table based muliple criteria
	 *
	 * @param   array
	 * @return  object
	 */
	public function get_where($data, $limit = NULL, $offset = 0){

		$this->db->where($data);

		if( ! is_null($limit)){
			$this->db->limit($limit, $offset);
		}
		
		return $this->db->get($this->_table)->result();
	}


	/*-----------------------------------------------------------*/

	/**
	 * Get result object of rows from table based muliple criteria
	 *
	 * @param   array
	 * @return  row object
	 */
	public function get_row_where($data, $limit = NULL, $offset = 0){

		$this->db->where($data);

		if( ! is_null($limit)){
			$this->db->limit($limit, $offset);
		}
		
		return $this->db->get($this->_table)->row();
	}


	/*-----------------------------------------------------------*/



	/**
	 * Insert new record into table
	 *
	 * @param    array
	 * @return   int (last inserted id)
	 */
	protected function insert($data){

		$data['created_date'] = date('Y-m-d H:i:s');
		
		if($this->db->insert($this->_table, $data)){
			return $this->db->insert_id();
		}else{
			return FALSE;
		}
		
	}


	/*-----------------------------------------------------------*/


	/**
	 * Update existing record from table
	 *
	 * @param    array
	 * @param    array
	 * @return   void
	 */
	protected function update($data, $where){
		if(is_int($where)){
			$this->db->where($this->_pk, $where);
		}else{
			// i.e. Array
			$this->db->where($where);
		}
		

		if($this->db->update($this->_table, $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}


	/*-----------------------------------------------------------*/

	/**
	 * Unified Method of Update & Insert Methods
	 *
	 * @param    array
	 * @param    array (OPTIONAL)
	 * @return   void
	 */
	public function save($data, $where = NULL){
		if($where === NULL){
			return $this->insert($data);
		}else{
			return $this->update($data, $where);
		}
	}

	/*-----------------------------------------------------------*/

	/**
	 * Delete a record from table
	 *
	 * @param    array
	 * @return   bool
	 */
	public function delete($where){

		if(is_int($where)){
			$this->db->where($this->_pk,$where);
		}else{
			$this->db->where($where);
		}
		

		if($this->db->delete($this->_table)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	/*-----------------------------------------------------------*/

	/**
	 * Check if atleast one row exists
	 * 
	 * @param     array
	 * @return    bool
	 */
	public function row_exists($where){
		return (bool)$this->get_where($where);
		
	}

	/*-----------------------------------------------------------*/

	/**
	 * Row count result
	 * 
	 * @param     array
	 * @return    int
	 */
	public function num_rows($where){

		$this->db->select($this->_pk);

		if(is_int( (int)$where)){
			$this->db->where(array($this->_pk => $where));
		}else{
			$this->db->where($where);
		}

		$query = $this->db->get($this->_table);

		return $query->num_rows();
		
	}


	/*-----------------------------------------------------------*/

	/**
	 * Perform custom query
	 * 
	 * @param     string
	 * @return    mixed
	 */
	public function query($query){

		return $this->db->query($query);
		
	}





} /*** End MY_Model base Model class ***/