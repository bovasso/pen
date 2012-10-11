<?php

class Activity extends ActiveRecord\Model {
     static $belongs_to = array('user');   
//     static $before_save = array('encode_json');
     
     /**
      * Full date
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_full_date()
     {
         $datetime = $this->read_attribute('created_at');
         return $datetime->format('l, M d, Y');  # Thursday, Sept 6, 2012         
     }
     
     /**
      * Set Date
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function set_data($value)
     {
         $obj = new stdClass;
         switch( $this->type ) {
             case 'comment':
                $obj->comment = $value;
             break;
             
             case 'answers':
                $obj->assignment_id = $value;
             break;
         }
         
         $this->assign_attribute('data', json_encode($obj));                
         
     }
     
     /**
      * Replies
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function set_replies($value)
     {
         $obj = new stdClass;
         $student = array_shift($value);
         $obj->user_id = $student->id;
         $obj->first_name = $student->first_name;
         $obj->comment = array_shift($value);         
         $obj->created_at = date('m/d/Y');

         $replies = $this->read_attribute('replies');
         if ($replies) {
             $replies = json_decode($replies);
             array_push($replies, $obj);
         }else{
             $replies = array($obj);
         }

         $this->assign_attribute('replies', json_encode($replies));                         
     }
     
     /**
      * Get Replies
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_replies()
     {
         return json_decode($this->read_attribute('replies'));         
     }
     /**
      * Get data
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_data()
     {
         return json_decode($this->read_attribute('data'));
     }
     
     /**
      * Get Action
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_action()
     {
         if ($this->isComment) return ' wrote a comment ';
     }
     /**
      * Is Comment
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_isComment()
     {
         return $this->type == 'comment' ?: FALSE;
     }
     
     /**
      * Has Replies
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_hasReplies()
     {
         return !is_null($this->read_attribute('replies')) ?: FALSE;         
     }
}


class Comment{
    
}