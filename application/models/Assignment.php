<?php

class Assignment extends ActiveRecord\Model {
     static $belongs_to = array(
         array('course'),
         array('topic')
     );   

     static $has_many = array(
         array('questions', 'order'=>'position ASC'),
         array('answers'),
         array('articles')
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
         return $datetime->format('l, M d, Y');  # Thursday, Sept 6, 2012         
     }
     
     /**
      * Active
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_active()
     {
         return true;
     }
     

     /**
      * Due Date
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_due_date()
     {                         
         $date = $this->read_attribute('due_date');
         return $date->format('l, F j');
     }   
     
}