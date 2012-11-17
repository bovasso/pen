<?php

class Dashboard extends MY_Controller {
    private $teacher;
    static $is_secure = TRUE;
    
	function __construct() {
		parent::__construct();	
        $this->teacher = Teacher::session();   
        $this->data['teacher'] = $this->teacher;  
    }

	/**
	 * Default action
	 *
	 * @param string $assignment_week 
	 * @return void
	 * @author Jason Punzalan
	 */
	public function index($assignment_week = NULL) {    
        $this->data['title'] = "Dashboard";
        $this->data['classrooms'] = $this->teacher->classrooms;        
        $this->data['course'] = $this->teacher->classroom->course;
        $this->data['assignments'] = $this->teacher->classroom->course->assignments;             
        $this->data['students'] = $this->teacher->classroom->students;
        
        if ($assignment_week) {
            $assignment = Assignment::find_by_course_id_and_week($this->teacher->classroom->course->id, $assignment_week );
            $this->data['active_assignment'] = $assignment;
        }
        $this->blade->render('dashboard/teacher/dashboard', $this->data);
	}  
	
	public function progress($action = 'answers', $username = NULL)
	{                                                                   
	    $this->data['title'] = "Classroom Progress";                      
	    $this->data['classrooms'] = $this->teacher->classrooms;    
	    $this->data['course'] = $this->teacher->classroom->course;
        $this->data['assignments'] = $this->teacher->classroom->course->assignments;                                 
        $this->data['students'] = $this->teacher->classroom->students_sorted_by_name;        
        $this->data['selected_student'] = (is_null($username))? current($this->data['students']) : Student::find_by_username($username); 
        $this->data['action'] = $action;    

	    $this->blade->render('dashboard/teacher/progress', $this->data);        
	}   
	

}