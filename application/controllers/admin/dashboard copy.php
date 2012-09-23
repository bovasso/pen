<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
        $this->load->spark('state-helper/1.0.0');				
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
	
	public function set_timestamps($post_array, $primary_key){
        if( empty($post_array['created_at']) ) $post_array['created_at'] = date('Y-m-d');
        $post_array['updated_at'] = date('Y-m-d');
        return $post_array;
    }    
	
	public function render($output = null, $template = "admin/base")
	{   
        $this->data['output'] = $output->output;
        $this->data['js_files'] = $output->js_files;
        $this->data['css_files'] = $output->css_files;
        
        echo $this->blade->render($template, $this->data, TRUE);	        
	}
	
	public function index()
	{
		$this->data['start_date'] = date("m/d/Y", strtotime("now -1 month") );
	    $this->data['end_date'] = date("m/d/Y", strtotime("now") );
	    
        $this->data['total_classes'] = $this->db->count_all('classes');
        $this->data['total_students'] = $this->db->from('users')->where('role_id', 2)->count_all_results();
        $this->data['total_teachers'] = $this->db->from('users')->where('role_id', 3)->count_all_results();        
        
        $this->data['title'] = 'Dashboard';	    
	    $this->blade->render('admin/index', $this->data);
	}
	
	public function users($action = NULL, $id = NULL){

		$this->crud->set_table('users');
		$this->crud->set_subject('User');
        $this->crud->unset_columns('password', 'suffix', 'class_id');
        $this->crud->unset_fields('password','username', 'class_id');
                
	    $this->crud->set_relation('role_id','roles','name');        
	    $this->crud->set_relation('class_id','classes','name');        
	            
	    $this->crud->display_as('role_id', 'Role');     
	    $this->crud->display_as('class_id', 'Class');     	       
	    $this->crud->display_as('is_registered', 'Registered');	    
	    $this->crud->display_as('first_name', 'First');
        $this->crud->display_as('last_name', 'Last');        
        $this->crud->required_fields('status','email','role_id', 'first_name', 'last_name');
                        
        $this->crud->callback_column('status',array($this,'displayStatus'));                
        $this->crud->callback_field('status',array($this,'displayAsDropdown'));
                
        if ( $action == 'class' ) {
            $this->crud->where('role_id = 2 AND class_id = ', $id);
            $this->data['id'] = $id;
            $this->data['sub_menu'] = 'Students';
            $this->data['title'] = 'Classes';            
            $this->crud->unset_add();                
    		$output = $this->crud->render();		                        
            $this->render($output, 'admin/edit_class');
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
        
		$output = $this->crud->render();
        
        if ($action == 'edit') {
            $this->data['id'] = $id;
            $this->data['sub_menu'] = 'View';                
            $this->render($output, 'admin/edit_course');
        }else{
            $this->render($output);
        }    
        
        
	}
    
	public function classes($action = NULL, $id = NULL) 
    {
		$this->crud->set_table('classes');
		$this->crud->set_subject('Class');
        $this->crud->order_by('created_at','desc');
        $this->crud->unset_columns('age_range_start', 'age_range_end');
        $this->crud->unset_fields('teacher_id','course_id', 'area');
        $this->crud->display_as('course_id', 'Course');        	    
        $this->crud->display_as('partner_id', 'Partner');        	            
        $this->crud->display_as('group_id', 'Code');        	            
        $this->crud->display_as('teacher_id', 'Teacher');   
        $this->crud->display_as('class_size', 'Size');   
        $this->crud->callback_field('state',array($this,'displayStateDropdown'));
        $this->crud->required_fields('state','school','name', 'age_range_start', 'age_range_end', 'class_size');
        $this->crud->set_relation('teacher_id','users','{first_name} {last_name}');        
        $this->crud->set_relation('course_id','courses', 'name');        
        $this->crud->set_relation('group_id','groups', 'code');
        $this->crud->change_field_type('group_id', 'readonly');
        
	         	            
        $this->data['title'] = 'Classes';
        $this->data['action'] = $action;
                
        if ($action == 'assign') {
            $this->data['id'] = $id;
            $this->data['title'] = 'Course Schedule';            

            if ( $this->input->get('view') ) {
              $this->data['sub_menu'] = 'Find';              
              $this->crud->where('course_id IS NULL OR course_id != ', $id);
              $this->crud->add_action('View', '', '', '', array($this,'view_class_from_course_link'));              
              $this->crud->add_action('Partner', '', '', 'ui-icon-heart', array($this,'partner_class_from_course_link'));                              
              // $this->crud->add_action('Assign', '', '', 'ui-icon-plus', array($this,'assign_or_remove_class_to_course_link'));
            } 
            
            if ( !$this->input->get('view') ) {                
                $this->data['sub_menu'] = 'Classes';
                $this->crud->where('course_id', $id);
                $this->crud->set_relation_n_n('partnership', 'partnerships', 'classes', 'class_id', 'partner_id', 'school');
                   
                $partnerships = array();
                $query = $this->db->query("SELECT classes.*, partnerships.partner_id FROM classes LEFT JOIN partnerships ON ( partnerships.class_id = classes.id) WHERE partnerships.course_id = ". $id ." AND classes.course_id IS NOT NULL");
                $partnerships = $query->result();                
                
                $i = 0;
                var_dump($partnerships);exit;
                foreach($partnerships as $key => $class ){
                    $match = array_filter($partnerships, function($item) use ($class) {
                        if ($class->id == $item->partner_id) {
                            return true;
                        }
                    });
                    array_push($match, $class);
                    $paired[$i] = $match;
                }
                var_dump($paired);exit;
                $this->data['partnerships'] = $partnerships;
                $query = $this->db->query("SELECT classes.* FROM classes WHERE course_id = " . $id);
                $classes = $result = $query->result();
                $class_dropdown = array();
                foreach ($classes as $key => $value) {
                    $class_dropdown[$value->id] = $value->name;
                }
                $this->data['class_dropdown'] = form_dropdown('classes', $class_dropdown);                                
                $this->data['classes'] = $result = $query->result();
                $this->crud->add_action('Remove', '', '', 'ui-icon-minus', array($this,'assign_or_remove_class_to_course_link'));
            }
                                
            $this->crud->unset_add();
            $this->crud->unset_edit();
            $this->crud->unset_delete();  
            
    		$output = $this->crud->render();            
            $this->render($output, 'admin/edit_course');
            exit;            
        }
        
        if ($action == 'edit' ) {
            $this->data['id'] = $id;
            $this->data['title'] = 'Classes';            
            $this->data['sub_menu'] = 'View';                          
            $output = $this->crud->render();            
            $this->render($output, 'admin/edit_class');
            exit;                		
        }
        
        $output = $this->crud->render();		
        $this->render($output);
        
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
        $this->crud->display_as('class_id', 'Class');     	               
	    $this->crud->set_relation('class_id','classes','name');        
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
        $this->crud->change_field_type('video', 'text');
        $this->crud->unset_texteditor('video');
        $this->crud->required_fields('week','name','description');
        $this->data['title'] = 'Assignments';
        $this->data['action'] = $action;
        		
		if ($action == 'edit') {
            $this->data['id'] = $id;
    		$output = $this->crud->render();            
            $this->render($output, 'admin/edit_assignment');
            exit;
        }
        
        if ($action == 'assign') {
            $this->data['id'] = $id;
            $this->data['title'] = 'Course Schedule';            
            $this->data['sub_menu'] = 'Assignments';
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
        $this->crud->unset_columns('assignment_id', 'content');
        $this->crud->unset_fields('assignment_id');        
        $this->crud->callback_column('video', array($this,'displayHasVideo'));                                    
        $this->crud->unset_texteditor('video');
        $this->crud->required_fields('title','content','source');
        $this->data['title'] = 'Articles';
        $this->data['action'] = $action;
            
        if ( $id ) $this->crud->where('assignment_id',$id);
    		
		if ($action == 'assign') {
            $this->data['id'] = $id;	
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
	 * Assign Class to Course
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function assign_class_to_course($course_id = NULL, $class_id = NULL)
	{
        $sql = 'UPDATE classes SET course_id = ? WHERE id = ?';
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
        $sql = 'UPDATE classes SET course_id = NULL WHERE course_id = ? AND id= ?';
        $this->db->query($sql, array($course_id, $class_id));
        redirect( $this->agent->referrer() );        
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
        $options = range('1','6');
        return form_dropdown('week', $options, $value);	    	            
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
     * undocumented function
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
// $this->crud->callback_field('assignment_id', array($this,'add_assignment_id_as_hidden_field'));                 
    public function add_assignment_id_as_hidden_field($value = '', $primary_key = null)
    {
        return form_hidden('assignment_id', $this->data['id']);        
    }
}	

