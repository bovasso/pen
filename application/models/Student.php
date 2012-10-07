<?php

class Student extends User {
    static $table_name = 'users';    
    static $belongs_to = array('school', 'classroom');    
    static $before_create = array('save_as_student'); # new records only
    
    /**
     * Save as Teacher Role
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function save_as_student()
    {
        $this->role_id = User::STUDENT_ROLE;
    }
        
}