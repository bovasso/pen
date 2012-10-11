<?php

class User extends ActiveRecord\Model {
    const STUDENT_ROLE = 2;
    const TEACHER_ROLE = 3;
    
    static $belongs_to = array('classroom');

    /**
     * Penpals sorted by course
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_penpals_by_classroom()
    {
        $penpals = Penpal::find_all_by_classroom_id_and_user_id($this->classroom_id, $this->id);
        return $penpals;
    }
    
    public static function session() {
        $ci =& get_instance();
        $user = $ci->ion_auth->user()->row();
        if ( isset($user->id) ) {
            return parent::find_by_pk(array($user->id), NULL);
        }		
        
        return parent::find_by_pk(array(8), NULL);
    }
    
    /**
     * Full name
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_full_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    
    /**
     * Login 
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function login()
    {
        $ci =& get_instance();
        return $ci->session->set_userdata('user_id', $this->id);
    }
    
    /**
     * Homework
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_homework()
    {
        $homework = Homework::find_by_user_id( $this->id );
        
        if (is_null($homework)) return new Homework();
        return $homework;
    }
    
}