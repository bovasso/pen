<?php

class Register extends MY_Controller {

	function __construct() {
		parent::__construct();	
	}
	
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function verify_email()
	{
	    $email = $this->input->post('email');
	    $user = User::find_by_email($email);
	    if ($user) return FALSE;
	    
	    return TRUE;
	}

	public function index() {
		$this->data['title'] = "Welcome to PenPal News";
		$this->data['courses'] = Course::all();
		$this->blade->render('register/index', $this->data);
	}
	
}
