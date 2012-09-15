<?php

class Profile extends MY_Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() {
		$this->data['title'] = "Profile";
		$this->blade->render('profile/index', $this->data);
	}
}
