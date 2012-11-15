<?php

class Assignment extends ActiveRecord\Model {
     static $belongs_to = array('course');   
     
     static $has_many = array(
         'questions',
         'answers',
         'articles'
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
      * Topic
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_topic()
     {  
        $topics = self::topics();
        return $topics[$this->week];
     }
       
     /**
      * Topic
      *
      * @return void
      * @author Jason Punzalan
      **/
     public static function topics()
     {  
        $topics = array( '1'=>'Economy', '2'=>'Health Care', '3'=>'Energy', '4'=>'Immigration', '5'=>'Education', '6'=>'Final');
        return $topics;
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