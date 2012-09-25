<?php

class Course extends ActiveRecord\Model {
    static $has_many = array(
        array('classrooms'),
        array('partnerships'),        
    );    

    
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

}
