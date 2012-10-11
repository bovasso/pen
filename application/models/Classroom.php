<?php

class Classroom extends ActiveRecord\Model {
    static $has_many = array(
        array('students', 'class'=>'User', 'conditions'=>'role_id = 2'),
    );    

    static $belongs_to = array(
        array('course'),
        array('school'),
        array('teacher')
    );    
        
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
