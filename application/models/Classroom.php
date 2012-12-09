<?php

class Classroom extends ActiveRecord\Model {
    
    static $before_create = array('create_group'); # new records only
    
    static $has_many = array(
        array('students', 'class'=>'Student', 'conditions'=>'role_id = 2'),
        array('students_sorted_by_name', 'class'=>'Student', 'conditions'=>'role_id = 2', 'order'=>'first_name ASC'),        
    );    

    static $belongs_to = array(
        array('course'),
        array('school'),
        array('teacher'),
        array('group')
    );    

    /**
     * Create Group code on save of class function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function create_group()
    {                           
        $group = new Group();
        $group->save();
        $this->group_id = $group->id;
        
    }
    /**
     * All penpals for classroom function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_penpals_in_classroom()
    {
        $penpals = Penpal::find('all', array('conditions' => array('classroom_id = ?', $this->id)));
        return $penpals;
    }
        
    /**
     * Register
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_registered()
    {
        return count($this->students);
    }    
    /**
     * Partner
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_partnerships()
    {
        $classes = Partnership::find( 'all', array('conditions'=>array('classroom_id = ?', $this->id) ));
        if (is_null($classes)) return FALSE;
        return $classes;
    }
    
    /**
     * Get Seats Available
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_seats_available()
    {
        $total_size = $this->class_size;
        $partnerships = $this->get_partnerships();
        
        foreach( $partnerships as $partnership ) {
            $total_size = $total_size - $partnership->classroom->class_size;
        }
        
        if ( $total_size <= 0 ) {
            return 0;
        }
        
        return $total_size;
    }
    
}
