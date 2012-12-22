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
        }else{
            $this->data['active_assignment'] = $this->teacher->course->this_weeks_assignment;
        }
        $this->blade->render('dashboard/teacher/dashboard', $this->data);
	}  
	
	/**
	 * Article view 
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function article($id = NULL)
	{                     
	    $this->data['title'] = "Assignments";
        $this->data['course'] = $this->teacher->course;
        
        $article = Article::find_by_pk(array($id), NULL);
        $this->data['assignment'] = $article->assignment;
        // if ( !$article ) 
        $this->data['article'] = $article;
        $this->blade->render('dashboard/teacher/article', $this->data);
        
	} 
	
	/**
	 * Progress of students
	 *
	 * @package default
	 * @author Jason Punzalan
	 */
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
	
    /**
     * Send Feedback to student
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function send_feedback()
    {      
               
        $this->form_validation->set_rules('comment', 'Comment', 'required');	   			 
        
        if ($this->form_validation->run() == TRUE) {
            $homework = Homework::find_by_pk(array($this->input->post('homework_id')), NULL);
            $homework->feedback = $this->input->post('comment');            
            $homework->save();                                           
        }
        
        redirect( $this->agent->referrer() );                        
    
    } 
}