<?php

class Dashboard extends MY_Controller {
    private $student;
    
	function __construct() {
		parent::__construct();	
		$this->student = Student::session();	    
		$this->data['student'] = Student::session();	    
    }
	
	function index() {
	    
    $this->data['title'] = "Dashboard";
    $this->data['course'] = $this->student->classroom->course;		
    $a = $this->student->penpal_activity;

    $this->data['activities'] = $this->student->penpal_activity;
    $this->data['teacher'] = $this->student->classroom->teacher;		
    $this->data['assignment'] = $this->student->classroom->course->this_weeks_assignment;
    $this->data['assignments'] = $this->student->classroom->course->assignments;		
    $this->blade->render('dashboard/student/dashboard', $this->data);
	}

    
    /**
     * Save  function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function save_comment()
    {
        $this->form_validation->set_rules('comment', 'Comment', 'required');	   			 
        if ($this->form_validation->run() == TRUE) {
          $comment = new Comment();
          $comment->user_id = $this->student->id;
          $comment->value = $this->input->post('comment');
          $comment->save();
        }
        
        redirect( $this->agent->referrer() );                        
    }
    
    /**
     * Reply  function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function save_reply()
    {
        $this->form_validation->set_rules('comment', 'Comment', 'required');	   			 
        
        if ($this->form_validation->run() == TRUE) {
            // $activity = Activity::find_by_pk( array($this->input->post('activity_id')), NULL);
            $comment = new Comment();
            $comment->parent_id = $this->input->post('activity_id');
            $comment->user_id = $this->student->id;
            $comment->value = $this->input->post('comment');
            $comment->save();
        }
        
        redirect( $this->agent->referrer() );                        
    }
    
	function all() {
		$this->data['title'] = "All Assignments";
		$this->blade->render('dashboard/all', $this->data);
	}

	function student_progress($student_id, $course_id, $week_id) {
		$this->data['title'] = "Student Progress";
		$this->blade->render('dashboard/student_progress', $this->data);
	}

	function student_dashboard($student_id, $course_id, $week_id) {
		$this->data['title'] = "Student Dashboard";
		$this->blade->render('dashboard/student_dashboard', $this->data);
	}

}