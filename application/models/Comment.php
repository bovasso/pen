<?php

class Comment extends ActiveRecord\Model {
    public $activity_id = NULL;
    
    static $belongs_to = array(
        array('user'),
    );   
       
    static $after_create = array('create_activity'); # new records only
    
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
      $activity->type = 'comment';
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
     * Has Replies function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_hasReplies()
    {
        return !is_null($this->read_attribute('parent_id')) ?: FALSE;                 
    }
    
    /**
     * Get Action
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_action()
    {                            
        return ' commented on their assignment ';
    }
    
    /**
     * Get replies for object
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_replies()
    {
        $replies = Reply::find('all', array('conditions'=> array('parent_id = ? AND source="comment"', $this->id) ));
        return $replies;
    }

    /**
     * Get Answer
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_answer()
    {
        $answer = Answer::find_by_pk(array($this->parent_id), NULL);
        return $answer;
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
        return strtolower(timespan(strtotime($this->created_at->format('db'))));         
    }
    
}