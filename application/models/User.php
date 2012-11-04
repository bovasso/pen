<?php

class User extends ActiveRecord\Model {
    
    static $belongs_to = array(
        array('classroom'),
        array('role')
    );
    

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
    
    /**
     * undocumented function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_avatar()
    {
        if (empty($this->avatar)) return '/public/images/default_avatars/default144.png';
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
    
    /**
     * Return Profile Link
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_profile_link()
    {                     
        return ($this instanceof Teacher )? '/teacher/profile' : '/student/profile';
    }   

    /**
     * Return Dashboard Link
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_dashboard_link()
    {                     
        return ($this instanceof Teacher )? '/teacher/dashboard' : '/student/dashboard';
    }   
    
    /**
     * Session
     *
     * @return void
     * @author Jason Punzalan
     **/
    public static function session()
    {       
        $ci =& get_instance();
        
        return $ci->ion_auth->user();
    } 
    
    /**
     * Override find_by_pk
     *
     * @return void
     * @author Jason Punzalan
     **/
    // public static function find_by_pk( $id )
    // {       
    //     $user = ActiveRecord\Model::find_by_sql(array($id), NULL);
    //     var_dump($user);exit;
    // }
    
}