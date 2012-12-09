<?php

class User extends ActiveRecord\Model {
    const TEACHER_ROLE = 1;
    const STUDENT_ROLE = 2;    

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
      * Returns avatar
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_avatar()
     {                      
         $cache_bust = rand(5, 15);
         $avatar = $this->read_attribute('avatar');          
         if ($avatar == 'custom') {
             return '/public/profiles/' . $this->username . '/avatar.png?c=' . $cache_bust;
         }

         if ( empty($avatar) ) {
             return '/public/images/default_avatars/default70.png';
         }   

         return '/public/images/default_avatars/' . $avatar . '70.png';
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
        $identity = $ci->config->item('identity', 'ion_auth');     
        
        return $ci->session->set_userdata($identity, $this->{$identity});
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
            $user = $ci->ion_auth->user();            
        try {
            $user = $ci->ion_auth->user();            
            return $user;
        }catch( Exception $e) {           
            return false;
        }
    } 
        
}