<?php

/**
 * Group
 *
 * @package default
 * @author Jason Punzalan
 */
class Group extends ActiveRecord\Model {
    static $before_create = array('create_group_code'); # new records only
                                                    
    /**
     * Generate group code function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function create_group_code()
    {                     
        $this->code = strtoupper(random_string('alnum', 6));        
    }
}