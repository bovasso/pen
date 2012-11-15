<?php

class Student extends User {
    static $table_name = 'users';    
    static $belongs_to = array(
        array('school'),
        array('classroom')
    );
    
    static $before_create = array('save_as_student'); # new records only

    /**
     * Save as Teacher Role
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function save_as_student()
    {                              
        $role = Role::find_by_name('Student');
        if (!$role) $this->show_error('Oops, something when wrong');
        $this->role_id = $role->id;
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
     * Two Penpals function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_hasMoreThanOnePenpal()
    {
        $penpals = Penpal::find('all', array('conditions' => array('classroom_id = ? AND user_id = ?', $this->classroom_id, $this->id)));
        return count($penpals) > 1;
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
        if ( empty($penpals) ) return FALSE;
        
        foreach($penpals as $penpal ){
            $ids[] = $penpal->penpal_id;
        }
        
        $ids = array_values($ids);
        $assignments = Homework::find('all', array('conditions' => array('user_id IN (?)', $ids)));

        if ( empty($assignments) ) return FALSE;
        
        return $assignments;
    }
    
    /**
     * Get Progress
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_progress()
    {                              
        //TODO::   
        $homework = Homework::find_by_user_id_and_assignment_id_and_course_id($this->id, 1, $this->classroom->course->id);
        
        if (is_null($homework)) $homework = new Homework();
        return $homework;
    }          
    
    /**
     * Get Selected Assignment
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_selected_assignment_article_id()
    {  
        $assignment = $this->classroom->course->this_weeks_assignment;                                                                  

        $homework = Homework::find_by_user_id_and_assignment_id_and_course_id($this->id, $assignment->id, $this->classroom->course->id);

        if (isset($homework->article->id)) {
            return $homework->article->id;
        }                             
        
        return 'none';
    }

}