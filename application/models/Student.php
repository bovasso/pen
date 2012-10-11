<?php

class Student extends User {
    static $table_name = 'users';    
    static $foreign_key = 'user_id';
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
    
    /**
     * Penpals function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_penpals()
    {
        $penpals = Penpal::find('all', array('conditions' => array('classroom_id = ? AND user_id = ?', $this->classroom_id, $this->id)));
        return $penpals;
    }
        
    /**
     * Penpal Activity
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_penpal_activity()
    {
        $penpals = $this->penpals;
        $ids = array();
        $ids[] = $this->id;
        foreach($penpals as $penpal ){
            $ids[] = $penpal->penpal_id;
        }
        $ids = array_values($ids);
        $activities = Activity::find('all', array('order'=>'created_at DESC', 'conditions' => array('user_id IN (?)', $ids)));
        return $activities;
    }
    
    /**
     * Penpals assignment 
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_penpal_assignments()
    {
        $penpals = $this->penpals;
        $ids = $assignment_ids = array();
        foreach($penpals as $penpal ){
            $ids[] = $penpal->penpal_id;
        }
        $ids = array_values($ids);
        $assignments = Homework::find('all', array('conditions' => array('user_id IN (?) AND status="submitted"', $ids)));
        
        return $assignments;
    }
    
}