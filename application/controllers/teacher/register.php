<?php

class Register extends MY_Controller {

	function __construct() {
		parent::__construct();	
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');		
	}
	
	/**
	 * Verify Email function
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function verify_email()
	{
	    $email = $this->input->post('email');
	    $user = User::find_by_email($email);
	    if ($user){
	        echo 'false';
	    }else{
	        echo 'true';
	    }
	}

	/**
	 * Verify Username function
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function verify_username()
	{
	    $email = $this->input->post('username');
	    $user = User::find_by_username($username);
	    if ($user){
	        echo 'false';
	    }else{
	        echo 'true';
	    }
	}

    /**
     * Register start
     *
     * @return void
     * @author Jason Punzalan
     */
	public function index() {
		$this->data['title'] = "Welcome to PenPal News";
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('school', 'School', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
                
        if ($this->form_validation->run() == TRUE) {

            $teacher = new Teacher();
            $teacher->first_name = $this->input->post('first_name');
            $teacher->last_name = $this->input->post('last_name');            
            $teacher->username = $this->input->post('username'); 
            $teacher->phone = $this->input->post('phone');                 
            $teacher->email = $this->input->post('email'); 
            $teacher->save();                        
            
            $school = new School();
            $school->teacher_id = $teacher->id;
            $school->name = $this->input->post('school');
            $school->state = $this->input->post('state');                
            $school->area = $this->input->post('area');
            $school->save();                 

            $teacher->school_id = $school->id;
            $teacher->save();               
            
            $teacher->login();
            
            redirect('/teacher/register/classes');            
	    }
	    
		$this->blade->render('register/teacher/account', $this->data);
	}
	
	
	/**
	 * Step : Add Classes
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function classes($id = NULL, $remove = FALSE)
	{
	    $teacher = Teacher::session();  

        $this->data['classes'] = $teacher->classrooms;
	   	$this->data['title'] = "Welcome to PenPal News";
        $this->form_validation->set_rules('name', 'Name', 'required');	   			 
        $this->form_validation->set_rules('age_range_start', 'Starting Age', 'required');
        $this->form_validation->set_rules('age_range_end', 'Ending Age', 'required');
        $this->form_validation->set_rules('class_size', 'Class Size', 'required');
        
        /*
         * Making sure there's at least one is present before continuing
         */
        if ( $this->input->post('submit') == 'Next Step' ) {
            if ( count($teacher->classrooms) >= 1 ) {
                redirect('/teacher/register/course');   
                exit;
            };
        };
        
        /*
         * Use an existing Classroom if ID is passed.
         */
        if ( !is_null($id) ) {
            $classroom = Classroom::find_by_id_and_teacher_id($id, $teacher->id);               

            if ($remove == 'remove') {
                Classroom::transaction(function() use ($classroom){
                    $classroom->delete();                
                });
                redirect('/teacher/register/classes');
            }
            
            $this->formbuilder->defaults = $classroom->to_array();
        }

        /*
         * Create Classroom if form is valid
         */                
        if ($this->form_validation->run() == TRUE) {
            $classroom = (empty($classroom))? new Classroom() : $classroom;   
            $classroom->teacher_id = $teacher->id;
            $classroom->school_id = $teacher->school->id;
            $classroom->name = $this->input->post('name');
            $classroom->age_range_start = $this->input->post('age_range_start');
            $classroom->age_range_end = $this->input->post('age_range_end');
            $classroom->class_size = $this->input->post('class_size');

            Classroom::transaction(function() use ($classroom){
                $classroom->save();                
            });
            
            redirect('/teacher/register/classes');
        }
        
	    $this->blade->render('register/teacher/classes', $this->data);			   	
	}
	
	/**
	 * Step : Pick Session
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function course()
	{
	    $this->data['title'] = "Welcome to PenPal News";		
	    $this->data['courses'] = Course::all();
	    
        $this->form_validation->set_rules('course_id', 'Course', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $teacher = Teacher::session();
            foreach( $teacher->classrooms as $classroom ) {
                $classroom->course_id = $this->input->post('course_id');
                $classroom->save();
            }
            redirect('/teacher/register/complete');                        
        }
        
	    $this->blade->render('register/teacher/course', $this->data);		
	}
	
	/**
	 * Register completed
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function complete()
	{                                                
	    $teacher = Teacher::session(); 
	    $this->data['title'] = "Thanks!";			    
	    $this->data['teacher'] = $teacher;
	    $this->load->library('email');

        $this->email->from('support@penpalnews.com', 'Michael Bernstein');
        $this->email->to($teacher->email); 
        $this->email->subject('Welcome to Penpal News!');
        
        foreach($teacher->classrooms as $classroom) {
            $group_codes[] = $classroom->group->code;
        }                                            
        $this->data['group_codes'] = $group_codes;

	    $message = $this->blade->render('emails/welcome', $this->data, TRUE);			    
        $this->email->message($message);	
        $this->email->send();
        redirect('teacher/register/thanks');
	}                        
	
	/**
	 * Thanks
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function thanks()
	{   
	    $group_codes = array();   
	    $teacher = Teacher::session(); 
	    $this->data['title'] = "Thanks!";			    
	    $this->data['teacher'] = $teacher;           
	    
	    $this->blade->render('register/teacher/complete', $this->data);			    
	}
	
}
