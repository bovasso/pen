<?php

class Dashboard extends MY_Controller {

	function __construct() {
		parent::__construct();	
		$this->teacher = Teacher::session();
    }
	
	function index() {
		$this->data['title'] = "Dashboard";
		$this->data['teacher'] = $this->teacher;
        $this->data['classrooms'] = $this->teacher->classrooms;	
        $this->data['course'] = $this->teacher->course;
                
		$this->blade->render('dashboard/index', $this->data);
	}

	function all() {
		$this->data['title'] = "All Assignments";
		$this->blade->render('dashboard/all', $this->data);
	}

	function student_progress() {
		$this->data['title'] = "Student Progress";
		$this->blade->render('dashboard/student_progress', $this->data);
	}

}