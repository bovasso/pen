<?php

class Classroom extends ActiveRecord\Model {
    static $has_many = array(
        array('students', 'class'=>'Student', 'conditions'=>'role_id = 2'),
        array('students_sorted_by_name', 'class'=>'Student', 'conditions'=>'role_id = 2', 'order'=>'first_name ASC'),        
    );    

    static $belongs_to = array(
        array('course'),
        array('school'),
        array('teacher')
    );    
        
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
    
    /**
     * Get Group 
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_group()
    {       
        if ( isset($this->group) ) return $this->group;
        
        $group = new Group();
        $group->classroom_id = $this->id;
        $group->save();
        return $group;
    }
}
