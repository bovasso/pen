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
        $this->data['course'] = $this->teacher->course;
        $this->data['assignments'] = $this->teacher->course->assignments;             
        if ($assignment_week) {
            $assignment = Assignment::find_by_course_id_and_week($this->teacher->classroom->course->id, $assignment_week );
            $this->data['active_assignment'] = $assignment;
        }         
        $this->blade->render('dashboard/teacher/dashboard', $this->data);
	}  
	
	public function progress($classroom = NULL, $action = 'answers', $username = NULL)
	{                                                                   
	    $this->data['title'] = "Classroom Progress";                      
	    $this->data['classrooms'] = $this->teacher->classrooms;    
        $this->data['course'] = $this->teacher->course;
        $this->data['assignments'] = $this->teacher->course->assignments;             
        
        if ( !is_null($classroom) ) {            
            $classroom = Classroom::find_by_teacher_id_and_id($this->teacher->id, $classroom);
            $this->data['classroom'] = $classroom;
            $this->data['students'] = $classroom->students_sorted_by_name;
        } 

        if ( $this->data['students'] ) {
            $this->data['selected_student'] = (is_null($username))? current($this->data['students']) : Student::find_by_username($username);             
        }
        
        $this->data['action'] = $action;    

	    $this->blade->render('dashboard/teacher/progress', $this->data);        
	}   
	

}