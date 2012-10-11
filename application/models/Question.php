<?php

class Question extends ActiveRecord\Model {
     static $belongs_to = array('assignment');
     static $has_many = array('answers');
    
     /**
      * Show answers for user
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function find_answer_by_user_id($user_id = NULL)
     {
         $answer = Answer::find_by_user_id_and_question_id($user_id, $this->id);
         if (is_null($answer)) return '';
         return $answer->content;
     }
}     