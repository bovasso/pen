<?php

class Profile extends MY_Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index($id) {

		$user = User::find($id);

		$this->data['user'] = $user;
		$this->data['title'] = "Profile";
		$this->blade->render('profile/index', $this->data);
	}

	function edit($id) {

		$user = User::find($id);
		
		$this->data['user'] = $user;
		$this->data['title'] = "Edit Profile";
		$this->blade->render('profile/edit', $this->data);
	}
	function student_teacher() {

		$this->data['title'] = "Student Teacher Profile";
		$this->blade->render('profile/student_teacher', $this->data);
	}
}
