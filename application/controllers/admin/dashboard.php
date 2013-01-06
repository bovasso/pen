<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once( APPPATH . 'helpers/htmlpurifier_helper.php');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->library(array('blade', 'user_agent'));
		$this->load->library('grocery_CRUD', '', 'crud');		
	    $this->load->helper(array('breadcrumb', 'form', 'url'));  	    
	    $this->crud->callback_before_update(array($this,'set_timestamps'));                        	                    
        $this->crud->callback_before_insert(array($this,'set_timestamps'));                        	                                    
        $this->crud->set_theme('datatables');  
        $this->crud->unset_export();
        $this->crud->unset_print();              
        $this->displayTimestampsAsDates();                
	}
	
	public function set_timestamps($post_array){        
        if( empty($post_array['created_at']) ) $post_array['created_at'] = date('Y-m-d');
        $post_array['updated_at'] = date('Y-m-d');
        return $post_array;
    }    
	
	public function render($output = NULL, $template = "admin/base", $only_jquery = FALSE)
	{   
        $this->data['output'] = $output->output;       
        if ( $only_jquery ) {
            $this->data['js_files'] = array('/assets/grocery_crud/js/jquery-1.8.2.min.js', '/assets/grocery_crud/js/jquery_plugins/ui/jquery-ui-1.9.0.custom.min.js');            
        }else{
            $this->data['js_files'] = $output->js_files;
        }
        
        $this->data['css_files'] = $output->css_files;
        
        echo $this->blade->render($template, $this->data, TRUE);	        
	}
	
	public function index()
	{
		$this->data['start_date'] = date("m/d/Y", strtotime("now -1 month") );
	    $this->data['end_date'] = date("m/d/Y", strtotime("now") );
	    
        $this->data['total_classes'] = $this->db->count_all('classrooms');
        $this->data['total_students'] = $this->db->from('users')->where('role_id', 2)->count_all_results();
        $this->data['total_teachers'] = $this->db->from('users')->where('role_id', 3)->count_all_results();        
        
        $this->data['title'] = 'Dashboard';	            
	    $this->blade->render('admin/index', $this->data);
	}
	
	public function users($action = NULL, $id = NULL){

		$this->crud->set_table('users');
		$this->crud->set_subject('User');
        $this->crud->unset_columns('password', 'suffix', 'email', 'avatar', 'created_on', 'phone', 'about_me', 'classroom_id', 'ip_address', 'salt', 'activation_code', 'opt_in_email', 'forgotten_password_code', 'forgotten_password_time', 'remember_code', 'last_login');
        $this->crud->unset_fields('password','username', 'salt', 'activation_code', 'ip_address', 'forgotten_password_time', 'forgotten_password_code', 'forgotten_password_time', 'remember_code', 'created_on', 'avatar', 'classroom_id');
                
	    $this->crud->set_relation('role_id','roles','name');        
	    $this->crud->set_relation('classroom_id','classrooms','name');        
	    $this->crud->set_relation('school_id','schools','name');        
	            
	    $this->crud->display_as('role_id', 'Role');     
	    $this->crud->display_as('classroom_id', 'Class');     	       
	    $this->crud->display_as('school_id', 'School');     	       
	    $this->crud->display_as('is_registered', 'Registered');	    
	    $this->crud->display_as('first_name', 'First');
        $this->crud->display_as('last_name', 'Last');        
        $this->crud->required_fields('status','email','role_id', 'first_name', 'last_name');
                        
        $this->crud->callback_column('status',array($this,'displayStatus'));                
        $this->crud->callback_field('status',array($this,'displayAsDropdown'));
                
        if ( $action == 'class' ) {
            $this->crud->where('role_id = 2 AND classroom_id = ', $id);
            $this->data['id'] = $id;
            $this->data['sub_menu'] = 'Students';
            $this->data['title'] = 'Classes';            
            $this->crud->unset_add();                
    		$output = $this->crud->render();		                        
            $this->render($output, 'admin/edit_class');
            exit;
        }

        if ( $action == 'penpals' ) {
            $this->data['id'] = $id;
            $this->data['sub_menu'] = 'Penpals';
            $this->data['title'] = 'Classes';     
            
            $classroom = Classroom::find_by_pk(array($id), NULL);	    
            $this->data['students'] = $classroom->students_sorted_by_name;   
            $this->data['available_penpals'] = $classroom->penpals_in_classroom;
            $this->data['partnered_classroom'] = Classroom::find_partnership_by_classroom_id_and_course_id($classroom->id, $classroom->course_id);
    		$output = $this->crud->render();		                        
            $this->render($output, 'admin/edit_penpals', $only_jquery = TRUE);
            exit;
        }
        
        $this->data['title'] = 'Users';
		$output = $this->crud->render();		
        $this->render($output); 
	}
    
    
	public function courses($action = NULL, $id = NULL) 
	{

		$this->crud->set_table('courses');
		$this->crud->set_subject('Course');
        $this->crud->order_by('start_date','desc');
        $this->data['title'] = 'Course Schedule';
        $this->data['action'] = $action;      
        $this->crud->required_fields('start_date','end_date','register_deadline');        
        $this->crud->callback_column('start_date',array($this,'formatDate'));                
        $this->crud->callback_column('end_date',array($this,'formatDate'));                        
        $this->crud->callback_column('register_deadline',array($this,'formatDate'));                
        $this->crud->display_as('register_deadline', 'Deadline');
        
		$output = $this->crud->render();
        
        if ($action == 'edit') {
            $this->data['id'] = $id;
            $this->data['sub_menu'] = 'View';                
            $this->render($output, 'admin/edit_course');
        }else{
            $this->render($output);
        }    
        
        
	}    
	
	/**
	 * Schools
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function schools()
	{ 
		$this->crud->set_table('schools');
		$this->crud->set_subject('School');
        $this->crud->order_by('created_at','desc');
        $this->crud->display_as('teacher_id', 'Teacher');   
        $this->crud->callback_column('area',array($this,'displayAreaColumn'));                        
        $this->crud->callback_field('state',array($this,'displayStateDropdown'));
        $this->crud->callback_field('country',array($this,'displayCountryDropdown'));        
        $this->crud->callback_field('area',array($this,'displayAreaDropdown'));                
        $this->crud->required_fields('state','school','name');
        $this->crud->set_relation('teacher_id','users','{first_name} {last_name}');        
        $this->data['title'] = 'Schools';
        $output = $this->crud->render();		
        $this->render($output);        		        
	}         
	
    public function classes($action = NULL, $id = NULL) 
    {
		$this->crud->set_table('classrooms');
		$this->crud->set_subject('Class');
        $this->crud->order_by('created_at','desc');
        $this->crud->unset_columns('age_range_start', 'age_range_end');
        $this->crud->unset_fields('teacher_id','course_id', 'area');
        $this->crud->display_as('course_id', 'Course');        	  
        $this->crud->display_as('group_id', 'Code');        	            
        $this->crud->display_as('teacher_id', 'Teacher');   
        $this->crud->display_as('class_size', 'Size');   
        $this->crud->callback_field('state',array($this,'displayStateDropdown'));
        $this->crud->required_fields('state','school','name', 'age_range_start', 'age_range_end', 'class_size');
        $this->crud->set_relation('teacher_id','users','{first_name} {last_name}');        
        $this->crud->set_relation('group_id','groups', 'code');
        $this->crud->set_relation('school_id','schools', 'name');        
        $this->crud->change_field_type('group_id', 'readonly');
        
	         	            
        $this->data['title'] = 'Classes';
        $this->data['action'] = $action;
                
        if ($action == 'assign') {
            $this->data['id'] = $id;
            $this->data['title'] = 'Course Schedule';            

            if ( $this->input->get('view') ) {
              $this->data['sub_menu'] = 'Find';              
              $this->crud->unset_columns('age_range_start', 'age_range_end', 'course_id');              
              $this->crud->where('course_id IS NULL OR course_id != ', $id);
              $this->crud->add_action('View', '', '', '', array($this,'view_class_from_course_link'));              
              $this->crud->add_action('Assign', '', '', 'ui-icon-plus', array($this,'assign_or_remove_class_to_course_link'));
              $this->crud->unset_add();
              $this->crud->unset_edit();
              $this->crud->unset_delete();  
      		  $output = $this->crud->render();            
              $this->render($output, 'admin/edit_course');
              exit;                          
            } 
            
            if ( !$this->input->get('view') ) {                
                $this->data['sub_menu'] = 'Classes';                                                  
                $course = Course::find_by_pk(array($id), NULL);
                $this->data['course'] = $course;                
                $this->data['classrooms'] = $course->classrooms;
                $this->crud->add_action('Remove', '', '', 'ui-icon-minus', array($this,'assign_or_remove_class_to_course_link'));
                $output = $this->crud->render();                   
                $this->render($output, 'admin/edit_course', $only_jquery = TRUE);
                exit;
            }
                                
        }
        
        
        if ($action == 'edit' ) {
            $this->data['id'] = $id;
            $this->data['title'] = 'Classes';            
            $this->data['sub_menu'] = 'View';                          
            $output = $this->crud->render();            
            $this->render($output, 'admin/edit_class');
            exit;                		
        }
        
        $this->crud->set_relation('course_id','courses', 'name');                
        $output = $this->crud->render();		
        $this->render($output);
        
	}

	/**
	 * Topics
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function topics()
	{        
	    $this->crud->set_table('topics');
		$this->crud->set_subject('Topic');	
        $this->data['title'] = 'Topics';            		    
		$output = $this->crud->render();		
        $this->render($output);        	    
	}   
	
	/**
	 * Students and Penpals
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function students_and_penpals($classroom_id = NULL)
	{
	    $classroom = Classroom::find_by_pk(array($classroom_id), NULL);	    
        $this->data['students'] = $classroom->students_sorted_by_name;
        echo $this->blade->render('admin/_paypals_list', $this->data, TRUE);
	}
	
    /**
     * Preview
     *
     * @deprecated NOT IN USE 
     * @return void    
     * @author Jason Punzalan
     **/
    public function preview($id=NULL) 
    {       
          
        if ( !is_null($id) ) {      
        	$this->data['title'] = "View Article";
            $this->data['article'] = Article::find_by_pk(array($id), NULL);
            echo $this->blade->render('admin/_preview_article', $this->data, TRUE);            
        }
    }

	/**
	 * Students and Penpals
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function penpals($action = NULL, $id = NULL)
	{
	    $this->crud->set_table('classrooms');
		$this->crud->set_subject('PenPal');	
        $this->data['title'] = 'Course Schedule';            		    
        $this->data['sub_menu'] = 'PenPals';   
        $classes = Classroom::find_all_by_course_id(1);
        $this->data['classes'] = $classes;
        echo $this->blade->render('admin/edit_penpals', $this->data, TRUE);	                
	}
		
	/**
	 * Groups
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function groups($action = NULL, $id = NULL)
	{
	    $this->crud->set_table('groups');
		$this->crud->set_subject('Group Code');	
        $this->data['title'] = 'Group Codes';            		    
        $this->crud->display_as('classroom_id', 'Class');     	               
	    $this->crud->set_relation('classroom_id','classrooms','name');        
		$output = $this->crud->render();		
        $this->render($output);        
	}
	
	/**
	 * Assignments
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
    public function assignments($action = NULL, $id = NULL)
	{

		$this->crud->set_table('assignments');
		$this->crud->set_subject('Assignment');	    
        $this->crud->unset_columns('description', 'video');		
        $this->crud->callback_field('week', array($this,'displayAsDropdownWeek'));
        $this->crud->callback_column('week',array($this,'displayWeek'));                        
        $this->crud->callback_column('due_date',array($this,'formatDate'));                        
        $this->crud->change_field_type('video', 'text');
        $this->crud->unset_texteditor('video');
        $this->crud->set_relation('course_id','courses','name');
        $this->crud->set_relation('topic_id','topics','name');  
        $this->crud->required_fields('week','name','description','topic_id', 'course_id');
        $this->crud->display_as('topic_id', 'Topic'); 
        $this->crud->display_as('course_id', 'Course');         
                
        $this->data['title'] = 'Assignments';
        $this->data['action'] = $action;
        		
		if ($action == 'edit') {
            $this->data['id'] = $id;  
            $this->data['sub_menu'] = 'View';            
    		$output = $this->crud->render();            
            $this->render($output, 'admin/edit_assignment');
            exit;
        }
        
        if ($action == 'assign') {
            $this->data['id'] = $id;
            $this->data['title'] = 'Course Schedule';            
            $this->data['sub_menu'] = 'Assignments';           
            $this->crud->change_field_type('course_id', 'hidden');            
            $this->crud->callback_field('course_id', array($this,'displayAsHiddenCourse'));            
    		$output = $this->crud->render();            
            $this->render($output, 'admin/edit_course');
            exit;            
        }
        
        $output = $this->crud->render();		
        $this->render($output);
	}

	/**
	 * Articles
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function articles($action = NULL, $id = NULL, $args = NULL)
	{

		$this->crud->set_table('articles');
		$this->crud->set_subject('Article');	    
        $this->crud->change_field_type('video', 'text');
        $this->crud->unset_columns('assignment_id', 'content', 'json', 'custom_article_content');
        $this->crud->unset_fields('json');    
        $this->crud->change_field_type('json', 'hidden');
        $this->crud->display_as('custom_article_content', 'Content'); 
        $this->crud->display_as('custom_image', 'Image');         
        $this->crud->set_field_upload('custom_image','public/articles');        
        $this->crud->display_as('content', 'Abstract');         
        $this->crud->callback_column('video', array($this,'displayHasVideo'));
        $this->crud->callback_column('source', array($this,'displaySourceLink'));
        $this->crud->unset_texteditor('video');   
        $this->crud->required_fields('title','content','source');    
        $this->crud->callback_before_insert(array($this, '_onSaveSetJSONArticleContentViaAPI'));
        $this->crud->callback_before_update(array($this, '_onSaveSetJSONArticleContentViaAPI'));     
        $this->crud->callback_after_upload(array($this,'resize_article_after_upload'));
        
        $this->data['title'] = 'Articles';
        $this->data['action'] = $action;
            
        if ( $id ) $this->crud->where('assignment_id',$id);
    		
		if ($action == 'assign') {
            $this->data['id'] = $id; 
            $this->data['title'] = "Assignments";                            
            $this->data['sub_menu'] = "Articles";  
            if (in_array($this->crud->getState(), array('edit', 'add'))) {
                $this->data['notice_info'] = "If you wish to edit the article content, you must first save the article. Article content is parsed from the link provided on save.";                
            }
            $this->crud->change_field_type('assignment_id', 'hidden', $id);
            $output = $this->crud->render();
            $this->render($output, 'admin/edit_assignment');
            exit;
        }
        
        
        $output = $this->crud->render();            
        $this->render($output);
	}

	/**
	 * Questions
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function questions($action = NULL, $id = NULL, $args = NULL)
	{
		$this->crud->set_table('questions');
		$this->crud->set_subject('Question');	    
		$this->crud->display_as('assignment_id', 'Assignment');        	    
		$this->crud->display_as('position', 'Order');        	    		
        $this->crud->callback_field('position', array($this,'displayAsDropdownOrder'));        
        $this->crud->callback_column('position', array($this,'displayAsValue'));                
		$this->data['title'] = 'Questions';
        $this->data['action'] = $action;
        
		if ( $id ) $this->crud->where('assignment_id',$id);
        
        if ($action == 'assign') {
            $this->data['id'] = $id;	
            $this->data['title'] = "Assignments";
            $this->data['sub_menu'] = 'Questions';
            $this->crud->unset_columns('assignment_id');
            $this->crud->change_field_type('assignment_id', 'hidden', $id);
            $this->crud->change_field_type('title', 'text');            
            $this->crud->unset_texteditor('title');
            $output = $this->crud->render();
            $this->render($output, 'admin/edit_assignment');
            exit;
        }
		
		$output = $this->crud->render();
        $this->render($output); 		
	}
	
	/**
	 * Pick Partner Course function
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function pick_partner_class()
	{
		$this->data['sub_menu'] = 'Questions';	    
		$this->data['title'] = 'Questions';
	    echo $this->blade->render('admin/pick_partner_class', $this->data, TRUE);	                
	} 
	
	/**
	 * Update penpal assign for student function
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function assign_student_to_penpal($student_id = NULL, $penpal_id = NULL)
	{                                                                             
	    $sql  = 'UPDATE penpals SET penpal_id = ? WHERE user_id = ?;';
        $this->db->query($sql, array($penpal_id, $student_id));                    	    
        
	    $sql  = 'UPDATE penpals SET penpal_id = ? WHERE user_id = ?;';
        $this->db->query($sql, array($student_id, $penpal_id));                    	    
	}   
	
	/**
	 * Assign Class to Course
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function assign_class_to_course($course_id = NULL, $class_id = NULL)
	{
        $sql = 'UPDATE classrooms SET course_id = ? WHERE id = ?';
        $this->db->query($sql, array($course_id, $class_id));
        redirect( $this->agent->referrer() );        
	}

	/**
	 * Remove Class From Course
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function remove_class_from_course($course_id = NULL, $class_id = NULL)
	{
        $sql = 'UPDATE classrooms SET course_id = NULL WHERE course_id = ? AND id= ?';
        $this->db->query($sql, array($course_id, $class_id));
        redirect( $this->agent->referrer() );        
	}
	
	/**
	 * Assign Partnership With Class function
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function assign_partnership_with_class($course_id = NULL, $classroom_id = NULL, $partnership_id = NULL)
	{                                                                                       

        Partnership::transaction(function() use ($course_id, $classroom_id, $partnership_id) {
            $attributes = array('course_id' => $course_id, 'classroom_id' => $classroom_id, 'partnership_id' => $partnership_id);
            Partnership::create($attributes);
            $attributes = array('course_id' => $course_id, 'classroom_id' => $partnership_id, 'partnership_id' => $classroom_id);
            $partnership = Partnership::create($attributes);
            
            // Only needed once
            $partnership->create_penpal_relationships();
        });

        redirect( $this->agent->referrer() );                
	    
	}
	
	/**
	 * Remove Partnerships function
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function remove_partnership_with_class($course_id = NULL, $classroom_id = NULL, $partnership_id)
	{
	    Partnership::transaction(function() use ($course_id, $classroom_id, $partnership_id) {
	        
            $partnership = Partnership::find_by_course_id_and_classroom_id_and_partnership_id($course_id, $classroom_id, $partnership_id);
            
            $partnership->delete();
            
            $partnership = Partnership::find_by_course_id_and_classroom_id_and_partnership_id($course_id, $partnership_id, $classroom_id);                        
            $partnership->delete();            
        });

        redirect( $this->agent->referrer() );                
	}
	  
	/**
	 * displaySourceLink function
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function displaySourceLink($value, $row )
	{     
	    return anchor($value, "View Source Link", 'target="_blank"');
	}
	
	/**
	 * displayTimestampsAsDates function
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function displayTimestampsAsDates()
	{
	    $this->crud->display_as('created_at', 'Created');
        $this->crud->display_as('updated_at', 'Updated');        
        $this->crud->callback_column('created_at',array($this,'formatDate'));                
        $this->crud->callback_column('updated_at',array($this,'formatDate'));                        
	    $this->crud->display_as('start_date', 'Start');
        $this->crud->display_as('end_date', 'End');        
        
        $this->crud->callback_column('start_date',array($this,'formatDate'));                
        $this->crud->callback_column('end_date',array($this,'formatDate'));                        
        $this->crud->change_field_type('created_at', 'hidden');	    
        $this->crud->change_field_type('updated_at', 'hidden');
	}
	
	/**
	 * displayStatus function
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function displayStatus($value, $row)
	{
	    return ( $value == 0 )? 'disabled' : 'enabled';
	}
	
	/**
	 * displayAsValue function
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function displayAsValue($value, $row)
	{
	    return $value;
	}
	              
	/**
	 * Area for list 
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function displayAreaColumn($value, $row)
	{          
	    $area_list = area_array();
	    return $area_list[$value]; 
	}      
	
	/**
	 * displayHasVideo
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function displayHasVideo($value, $row)
	{
	    return ( is_null($value) )? 'no' : 'yes';	    
	}
	
	/**
	 * displayWeek function
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function displayWeek($value, $row)
	{                            
	    return ' WK ' . $value;
	}

	/**
	 * displayAsDropdownWeek function
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function displayAsDropdownWeek($value, $row)
	{   
        $options = range(1,6);
        $keys = range(1,6);
        $options = array_combine($keys, $options);
        return form_dropdown('week', $options, $value);	    	            
	}
	
	/**
	 * displayAsDropdownCourse function
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function displayAsHiddenCourse($value, $row)
	{
        return form_hidden('course_id', $this->data['id']);        
	}

	/**
	 * displayAsDropdownOrder function
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function displayAsDropdownOrder($value, $row)
	{
        $options = range('1','10');
        return form_dropdown('position', $options, $value);	    	            
	}
	
	/**
	 * displayAsDropdown function
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function displayAsDropdown($value, $row)
	{
        $options = array(0 => 'disabled', 1 => 'enabled');
        return form_dropdown('status', $options, $value);	    	    
	}
	 

	/**
     * format Date function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function formatDate($value, $row)
    {
        return date('m/d/Y',strtotime($value));
    }
    
    /**
     * displayCourseName
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function displayCourseName($value, $row)
    {
	    return ( is_null($value) )? 'unassigned' : $value;	    
    }
    
    /**
     * display State Dropdown
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function displayStateDropdown($value, $row)
    {
        return state_dropdown('state', $value);
    }

    /**
     * display State Dropdown
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function displayCountryDropdown($value, $row)
    {
        return form_dropdown('country', country_array(), $value);        
    }

    /**
     * display State Dropdown
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function displayAreaDropdown($value, $row)
    {
        return form_dropdown('area', area_array(), $value);
    }
    
    // Actions for CMS
    
    /**
     * assign_classes_to_course function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function assign_or_remove_class_to_course_link($primary_key, $row)
    {
        $url = ( isset($row->course_id) )? '/admin/remove_class_from_course/' : '/admin/assign_class_to_course/'; 
        return base_url($url . $this->data['id'] . '/'. $primary_key );
    }

    public function view_class_from_course_link($primary_key, $row)
    {
        $url = '/admin/classes/'; 
        return base_url($url . 'edit/' . $primary_key );
    }

    public function partner_class_from_course_link($primary_key, $row)
    {
        return base_url('/admin/pick_partner_class/' . $primary_key);
    }
    
    /**
     * createArticleWithAssignment function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function createArticleWithAssignment($post_array)
    {
        $post_array['assignment_id'] = $this->data['id'];
        return $post_array;
    }
    
    // Form Fields Add/Edit
    
    /**
     * add_assignment_id_as_hidden_field
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function add_assignment_id_as_hidden_field($value = '', $primary_key = null)
    {
        return form_hidden('assignment_id', $this->data['id']);        
    }   
    
    /**
     * onSaveSetJSONArticleContentViaAPI - using Diff API
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function _onSaveSetJSONArticleContentViaAPI($post_array)
    {                                                
        $ci =& get_instance();  
        
        $post_array = $this->set_timestamps($post_array);     
        $json = $ci->diffbot->getArticle($post_array['source']);      
        $content = json_decode($json->content);

        if (empty($post_array['custom_article_content'])){
            $post_array['custom_article_content'] = html_purify($content->html, 'comment');            
        }
        
        return $post_array;
    }    
    
    /**
     * displayArticlePopupPreviewLink
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function displayArticlePopupPreviewLink($primary_key, $row)
    { 
        return '/admin/preview/' . $primary_key; 
    } 
    
    function resize_article_after_upload($uploader_response,$field_info, $files_to_upload)
    {
        $this->load->library('image_moo');
        $file_uploaded = $field_info->upload_path. '/' .$uploader_response[0]->name; 
                                                            
        // mini
        $this->image_moo->load($file_uploaded)->resize(90,80)->save($field_info->upload_path . '/mini/' . $uploader_response[0]->name,true);                
        // small 
        $this->image_moo->load($file_uploaded)->resize(180,194)->save($field_info->upload_path . '/small/' . $uploader_response[0]->name,true);
        // large
        $this->image_moo->load($file_uploaded)->resize(354,194)->save($field_info->upload_path . '/large/' . $uploader_response[0]->name,true);

        return true;
    }
}	

