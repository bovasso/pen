<?php

class About extends MY_Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() {
		$this->data['title'] = "About";
		$this->blade->render('about/index', $this->data);
	}
}
