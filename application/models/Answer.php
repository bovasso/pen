<?php

class Answer extends ActiveRecord\Model {

    static $belongs_to = array(
        array('question'),
        array('assignment'),
        array('article'),
        array('user')
    );
    
    static $delegate = array( 
        array('name', 'first_name', 'to' => 'user'),
    );   
    
        
    /**
     * Answers
     *
     * @return void
     * @author Jason Punzalan
     **/
    public static function find_answers_by_user_id($id = NULL)
    {  
        return Answer::find('all', array('conditions' => array('user_id = ?', $id) ));
    }
 
    /**
     * Has Replies function
     *
     * @return void
     * @author Jason Punzalan
     **/     
    public function get_hasReplies()
    {
        $replies = Comment::find('all', array('conditions'=> array('parent_id = ?', $this->id) ));
        return !empty($replies)? TRUE : FALSE;
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
     * Time ago
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_time_ago()
    {       
        return array_shift(explode(',',timespan(strtotime($this->created_at->format('Y-m-d')))));
    }
}