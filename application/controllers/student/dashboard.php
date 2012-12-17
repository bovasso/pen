<?php

class Dashboard extends MY_Controller {
    private $student;
    static $is_secure = TRUE;
    
	function __construct() { 	            
		parent::__construct();	
        $this->load->library('pagination');		
		$this->student = Student::session();	    
		$this->data['student'] = Student::session();	    
    }
	 
	function index($offset = 0) {
	                     
	    $config['base_url'] = base_url('student/dashboard');
        $config['total_rows'] = $this->student->count_penpal_activity;
        $config['per_page'] = 3;
        $this->pagination->initialize($config); 
        
        $this->data['title'] = "Dashboard";
        $this->data['course'] = $this->student->classroom->course;		
        $this->data['activities'] = $this->student->penpal_activity( $config['per_page'], $offset); 
        $this->data['teacher'] = $this->student->classroom->teacher;		
        
        // Double check that assignment exists for this week
        $assignment = $this->student->classroom->course->this_weeks_assignment;         
        if ($assignment) {
            $this->data['assignment'] = $assignment;
            $this->data['current_week'] = $assignment->week;            
        }else{              
            $this->data['assignment'] = NULL;            
            $this->data['current_week'] = NULL; // setting to null for display template
        }

        
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
          $comment->parent_id = $this->input->post('activity_id');          
          $comment->user_id = $this->student->id;
          $comment->value = $this->input->post('comment'); 
          $comment->save();
          
          // Update assignment for student
          $progress = $this->student->progress;
          $progress->user_id = $this->student->id;
          $progress->comment = TRUE;    
          $progress->save_as_activity = ( $progress->hasAnswers )? TRUE : FALSE; // Only show in feed to student has assignment to share.
          $progress->save();
          
          
        }
        
        redirect( $this->agent->referrer() );                        
    }

    /**
     * Save  function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function save_message()
    {
        $this->form_validation->set_rules('comment', 'Comment', 'required');	   			 
        if ($this->form_validation->run() == TRUE) {
          $message = new Message();
          $message->user_id = $this->student->id;
          $message->value = $this->input->post('comment');
          $message->save();
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
            $reply = new Reply();
            $reply->parent_id = $this->input->post('parent_id');
            $reply->user_id = $this->student->id;  
            $reply->source = $this->input->post('source');
            $reply->value = $this->input->post('comment');            
            $reply->save();                               
            
            // Update source activity to push to top of feed
            $activity_id = $this->input->post('activity_id');
            $activity = Activity::find_by_id_and_type($activity_id, $reply->source);
            $activity->updated_at = date('Y-m-d');
            $activity->save();
            
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