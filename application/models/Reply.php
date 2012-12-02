<?php

/**
 * Reply
 *
 * @package default
 * @author Jason Punzalan
 */
class Reply extends ActiveRecord\Model {
    // static $after_create = array('create_activity'); # new records only
    static $belongs_to = array(
        array('user'),
    );   
     
    static $delegate = array( 
        array('name', 'first_name', 'to' => 'user'),
    );
    
    
    /**
     * Create Activity
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function create_activity()
    {
      $activity = new Activity();
      $activity->user_id = $this->user->id;
      $activity->type = 'reply';
      $activity->source_id = $this->id;
      $activity->save();      
    }  

    /**
     * Get Action
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_action()
    {
        return ' dd on your response ';
    }        
    
    /**
     * Output
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_output()
    {
        $ci =& get_instance();   
        $data['comment'] = $this;
        echo $ci->blade->render('dashboard/student/_comment', $data, TRUE);         
    }
    
    /**
     * Time ago
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_time_ago()
    {       
        return array_shift(explode(',',timespan(strtotime($this->created_at->format('Y-m-d')))));
    }
    
    /**
     * belongsToUser
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_belongsToUser()
    {    
        $user = Student::session();	    
        return $this->user->id == $user->id;
    }
    
}