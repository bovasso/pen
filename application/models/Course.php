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
    public function get_this_weeks_assignment()
    {                                        
        $today = date('Y-m-d'); 
        $assignment = Assignment::find('first',array('conditions' => array('start_date >= ? AND course_id = ?', $today, $this->id)));
        return $assignment;
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
    
    /**
     * hasNotYetStarted
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_hasNotYetStarted()
    {              
        $start_date = $this->read_attribute('start_date');        
        $start_date = $start_date->format('Y-m-d');
        $start_date = strtotime($start_date);
        
        $today = date('Y-m-d');
        $today = strtotime($today);

        if ( $start_date > $today ) return TRUE;
        return FALSE;
    } 
    
    /**
     * End Date
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_end_date()
    {                         
        $date = $this->read_attribute('end_date');
        return $date->format('l, F j');
    }
}
