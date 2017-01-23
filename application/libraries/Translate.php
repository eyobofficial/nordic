<?php defined('BASEPATH') OR exit('No direct script is allowed');


class Translate {

	protected $ci;
	protected $_lang_id = 0;

	public function __construct(){
		$this->ci =& get_instance();
		$this->ci->load->model(array('Lang_model', 'Event_model', 'Event_langs_model', 'Cat_langs_model'));
		
		$this->_lang_id = isset($this->ci->session->lang) ? (int)$this->ci->session->lang : 0;
	}






	public function set_default(){
		
	}




	/**
	 * Translate Event Title
	 */
	public function event_title($event_id){
		if($this->_lang_id == 0){
			return $this->ci->Event_model->get($event_id)->default_title;

		}else{
			$event_translation = $this->ci->Event_langs_model->get_row(array(
																'event_id' => $event_id, 
																'lang_id'  => $this->_lang_id
																));

			if($event_translation == TRUE){
				return $event_translation->title;
			}else{
				return $this->ci->Event_model->get($event_id)->default_title;
			}

		} 
		
	} // End of event_title() method










} /**** End Currency library ***********/