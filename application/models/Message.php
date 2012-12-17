<?php

/**
 * Message
 *
 * @package default
 * @author Jason Punzalan
 */
class Message extends ActiveRecord\Model {
    public $activity_id = NULL;
    
    static $after_create = array('create_activity'); # new records only
    static $belongs_to = array(
        array('user'),
    ); 
    
    /**
     * Get Action
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_action()
    {
        return ' wrote a message ';
    }  

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
      $activity->type = 'message';
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
       
    /**
     * Get replies for object
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_replies()
    {
        $replies = Reply::find('all', array('conditions'=> array('parent_id = ? AND source="message"', $this->id) ));
        return $replies;
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
        $data['message'] = $this;
        echo $ci->blade->render('dashboard/student/_message', $data, TRUE);         
    }
    
}