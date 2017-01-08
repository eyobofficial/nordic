<?php


class Catagories extends Admin_Controller {

	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model(array('Cat_model', 'Cat_langs_model'));

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
	 * Display all Catagories
	 */
	public function all(){
		$this->data['main_view'] .= 'all_catagories_view';
		$this->data['page_title'] = 'All Catagories';


		$this->data['catagories'] = $this->Cat_model->get_all();

		$this->render('admin');
	}


	/**
	 * Display a Catagory
	 */
	public function id($cat_id){
		$this->data['main_view'] .= 'catagory_view';
		$this->data['page_title'] = 'All Catagories';


		$this->data['catagory'] = $this->Cat_model->get($cat_id);

		//var_dump($this->data['catagory']);

		$this->render('admin');
	}


	/**
	 * Add new catagory
	 */
	public function add(){

		if($this->input->post('submit')){

			// Load form validation libarary
			$this->load->library(array('form_validation'));

			// Change error message delimeter
			$this->form_validation->set_error_delimiters('<p class="text-danger bold"><span class="fa fa-exclamation-circle"></span>&nbsp; ', '</p>');

			// Set validation rule
			$this->form_validation->set_rules('cat_title', '&apos;Title&apos;', 'trim|required|max_length[20]');


			// Check the validation
			if($this->form_validation->run() == TRUE){
				// Valiation is successful
				

				// Retrieve from POST global variables
				$cat_title = $this->input->post(trim('cat_title'));
				$cat_desc  = $this->input->post(trim('cat_desc'));


				// Insert 'title' & 'summary' into 'Catagories' table of database
				$this->Cat_model->save(array('default_title' => $cat_title, 'default_summary' => $cat_desc));
						

				// Redirect to All Catagories page
				$this->all();

			}else{
				// Validation failed
				$this->data['main_view'] .= 'add_catagory_view';
				$this->data['page_title'] = 'Add Catagory';
				$this->render('admin');
			}

		}else{
			$this->data['main_view'] .= 'add_catagory_view';
			$this->data['page_title'] = 'Add Catagory';
			$this->render('admin');
		}

	}









} /***** End Catagories Class *********/