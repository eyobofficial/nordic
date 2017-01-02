<?php


class Catagories extends Admin_Controller {

	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model(array('Catagory_model'));

		$this->data['page_section'] = 'catagories';
		$this->data['main_view'] = 'catagory/';
	}


	/**
	 * Index Page
	 */
	public function index($cat_id = NULL){
		if($cat_id === NULL){

			// Get all catagories
			$this->all();

		}else{

			// Get a catagory by id
		}
	}


	/**
	 * All Catagories
	 */
	public function all(){
		$this->data['main_view'] .= 'all_catagories_view';

		$this->render('admin');
	}


	/**
	 * A Catagories
	 */
	public function id($cat_id){

	}


	/**
	 * Add new catagory
	 */
	public function add(){
		$this->data['main_view'] .= 'add_catagory_view';

		$this->render('admin');
	}









} /***** End Catagories Class *********/