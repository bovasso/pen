<?php

class Register extends MY_Controller {

	function __construct() {
		parent::__construct();	
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');		
        $this->user = Student::session();
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
        if ( $group_code = $this->input->get('group_code') ) {
            $this->formbuilder->defaults = array('group_code'=>$group_code);
        }
	    
		$this->data['title'] = "PenPal News - Student Sign Up";                   
        $this->form_validation->set_rules('group_code', 'Group Code', 'required|callback_group_code');		
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');                
        $this->form_validation->set_rules('username', 'Username', 'required|s_unique[users.username]');                
        $this->form_validation->set_rules('password', 'Password', 'required|matches[confirm_password]');         
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required');                         
        $this->form_validation->set_rules('agree', 'Terms & Conditions', 'required');
                
        if ($this->form_validation->run() == TRUE) { 

           Student::transaction(function() {
                $ci =& get_instance();
            
                $student = new Student();
                $student->active = 1;
                $student->first_name = $ci->input->post('first_name');
                $student->last_name = $ci->input->post('last_name');                                  
                $student->gender = $ci->input->post('gender');                                    
                $student->username = $ci->input->post('username');                                    
                $student->password = $ci->ion_auth->hash_password($ci->input->post('password'), FALSE);
                
                $group_code = Group::find_by_code($ci->input->post('group_code'));
                if (empty($group_code)) return false;
                $student->classroom_id = $group_code->classroom->id;
                $student->school_id = $group_code->classroom->school->id;
            
                $student->save();
                $student->login();
            });
            
            redirect('/student/register/complete');            
	    }
	    
		$this->blade->render('register/student/account', $this->data);
	}  
	
    /**
     * Validates entered Group code
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function group_code($group_code)
    {               
        $group_code = Group::find_by_code($group_code);
        
        if ($group_code) {
            return TRUE;
        }else{                 
            $this->form_validation->set_message('group_code', "Hmm, it doesn't look like you have a valid %s");			
            return FALSE;
        }
    }
	
	/**
	 * Step : Add Classes
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function classes($id = NULL, $remove = FALSE)
	{
	    $student = Student::session();        
        $this->data['classes'] = $student->classrooms;
	   	$this->data['title'] = "Welcome to PenPal News";
        $this->form_validation->set_rules('name', 'Name', 'required');	   			 
        $this->form_validation->set_rules('age_range_start', 'Starting Age', 'required');
        $this->form_validation->set_rules('age_range_end', 'Ending Age', 'required');
        $this->form_validation->set_rules('class_size', 'Class Size', 'required');
        
        /*
         * Making sure there's at least one is present before continuing
         */
        if ( $this->input->post('submit') == 'Next Step' ) {
            if ( count($student->classrooms) >= 1 ) {
                redirect('/student/register/course');   
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
                redirect('/student/register/classes');
            }
            
            $this->formbuilder->defaults = $classroom->to_array();
        }

        /*
         * Create Classroom if form is valid
         */                
        if ($this->form_validation->run() == TRUE) {
            $classroom = (is_null($classroom))? new Classroom() : $classroom;    
            $classroom->teacher_id = $teacher->id;
            $classroom->school_id = $teacher->school->id;
            $classroom->name = $this->input->post('name');
            $classroom->age_range_start = $this->input->post('age_range_start');
            $classroom->age_range_end = $this->input->post('age_range_end');
            $classroom->class_size = $this->input->post('class_size');

            Classroom::transaction(function() use ($classroom){
                $classroom->save();                
            });
            
            redirect('/student/register/classes');
        }
        
	    $this->blade->render('register/student/classes', $this->data);			   	
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
            $teacher = Student::session();
            $teacher->course_id = $this->input->post('course_id');
            $teacher->save();
            redirect('/student/register/complete');                        
        }
        
	    $this->blade->render('register/student/course', $this->data);		
	}
	
	public function test($value='')
	{
        $partnership = Partnership::create(array('course_id'=>1, 'classroom_id'=>3, 'partnership_id'=>4));
        $partnership->save();
        
        exit;
	}
	
	/**
	 * Register completed
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function complete()
	{
	    $this->data['title'] = "Thanks!";			    
	    $this->data['student'] = Student::session();
	    $this->blade->render('register/student/complete', $this->data);			    
	}
	
}
