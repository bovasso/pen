<?php

class Welcome extends MY_Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() {
		$this->data['title'] = "Welcome";

		$this->blade->set('foo', 'bar')
				->set('an_array', array(1, 2, 3, 4))
				->append('an_array', 5)
				->set_data(array('more' => 'data', 'other' => 'data'))
				->render('welcome/index', array('message' => 'Hello World!'));
	}
}
