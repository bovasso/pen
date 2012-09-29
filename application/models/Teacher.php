<?php

class Teacher extends User {
    static $table_name = 'users';
    
    static $has_many = array('classrooms');

    /**
     * Get Coursefunction
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_course()
    {
        $classroom = Classroom::find_by_teacher_id($this->id);
        return $classroom->course;
    }
    
}