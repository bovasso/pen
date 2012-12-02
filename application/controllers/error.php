<?php

/**
 * Custom Error Handling Contorller class
 *
 * @package default
 * @author Jason Punzalan
 **/
class Error extends MY_Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() {
		$this->data['title'] = "Oops! Page Not Found";     
		$this->blade->render('errors/error_404', $this->data);
	}
	
}
