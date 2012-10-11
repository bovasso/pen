<?php

class Comment extends ActiveRecord\Model {
    
    static $belongs_to = array('user');
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
      if ( !is_null($this->parent_id) ) return TRUE;
      $activity = new Activity();
      $activity->user_id = $this->user->id;
      $activity->type = 'comment';
      $activity->source_id = $this->id;
      $activity->save();      
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
        return ' wrote a comment ';
    }
    
    /**
     * Get replies for object
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_replies()
    {
        $replies = Comment::find('all', array('conditions'=> array('parent_id = ?', $this->id) ));
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
        $data['comment'] = $this;
        echo $ci->blade->render('dashboard/student/_comment', $data, TRUE);         
    }
    
    
}