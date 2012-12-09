<?php

class Activity extends ActiveRecord\Model {
     static $belongs_to = array('user');   
     static $delegate = array( 
         array('name', 'action', 'to' => 'source'),
         array('name', 'hasReplies', 'to' => 'source'),
         array('name', 'output', 'to' => 'source'),
         array('name', 'belongsToUser', 'to' => 'source'),         
     );

     /**
      * Full date
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_full_date()
     {
         $datetime = $this->read_attribute('created_at');
         return $datetime->format('M d, Y');  # Thursday, Sept 6, 2012         
     }
     
     /**
      * Has Replies function
      *
      * @return void
      * @author Jason Punzalan
      **/
     // Book::find('all', array('conditions' => array('genre = ?', 'Romance')));
      
     public function get_hasReplies()
     {
         $replies = Reply::find('all', array('conditions'=> array('parent_id = ?', $this->id) ));
         return !empty($replies)? TRUE : FALSE;
     }
     
     
     /**
      * Find source object
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_source()
     {
         $type = ucfirst($this->read_attribute('type'));
         $source_id = ucfirst($this->read_attribute('source_id'));         
         $obj = $type::find_by_pk(array($source_id), NULL);                
         return $obj;
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