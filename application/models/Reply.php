<?php

/**
 * Reply
 *
 * @package default
 * @author Jason Punzalan
 */
class Reply extends ActiveRecord\Model {
    static $after_create = array('create_activity'); # new records only
    static $belongs_to = array(
        array('user'),
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