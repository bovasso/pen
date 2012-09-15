<?php

class Assignments extends MY_Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() {
		$this->data['title'] = "Assignments";
		$this->blade->render('assignments/index', $this->data);
	}
}
