<?php

class Teacher extends User {
    static $table_name = 'users';        
    static $has_many = array('classrooms');
    static $has_one = array('school');    
    static $before_create = array('save_as_teacher'); # new records only
    
    /**
     * Get Course function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_course()
    {
        $classroom = Classroom::find_by_teacher_id($this->id,  array('limit'=>1));
        return $classroom->course;
    }
    
    /**
     * Save as Teacher Role
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function save_as_teacher()
    {
        $this->role_id = User::TEACHER_ROLE;
    }
    
            
}