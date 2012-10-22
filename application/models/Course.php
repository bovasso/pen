<?php

class Course extends ActiveRecord\Model {
    static $has_many = array(
        array('classrooms'),
        array('partnerships'),
        array('assignments'),
    );    

    /**
     * This weeks assignment function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_this_weeks_assignment($week = 1)
    {
        return Assignment::find_by_course_id_and_week($this->id, $week);
    }
    
    /**
     * has available
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_has_available_classrooms()
    {
        if( count($this->classrooms) >= count($this->partnerships) ) return TRUE;
        return FALSE;
    }
    
    /**
     * Partner class check
     *
     * @package default
     * @author Jason Punzalan
     */
    public function get_has_no_partnered_classes()
    {
        if( count($this->partnerships) == 0 ) return TRUE;

        return FALSE;
    }
    
    /**
     * Register Deadline
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_register_deadline()
    {                         
        $date = $this->read_attribute('register_deadline');
        return $date->format('l, F j');
    }   
    
    /**
     * Start Date
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_start_date()
    {                         
        $date = $this->read_attribute('start_date');
        return $date->format('l, F j');
    }
}
