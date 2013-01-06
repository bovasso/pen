<?php

class Classroom extends ActiveRecord\Model {
                    
    static $after_create = array('create_group'); # new records only
    
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
        $group->classroom_id = $this->id;
        $group->save();
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
     * Partner
     *
     * @return void
     * @author Jason Punzalan
     **/
    public static function find_partnership_by_classroom_id_and_course_id( $classroom_id, $course_id)
    {
        $partnership = Partnership::find( 'first', array('conditions'=>array('classroom_id = ? AND course_id = ? ', $classroom_id, $course_id) ));
        if (is_null($partnership)) return FALSE;                                                                                                      
        $classroom = $partnership->classroom;
        return $classroom;
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
