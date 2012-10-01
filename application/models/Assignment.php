<?php

class Assignment extends ActiveRecord\Model {
     static $belongs_to = array('course');   
     
     static $has_many = array(
         'articles',
         'questions'
     );
     
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
}