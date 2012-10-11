<?php

class Homework extends ActiveRecord\Model {
     static $table_name = 'user_assignments';
     static $after_save = array('create_activity'); 
    
     static $belongs_to = array(
            array('assignment'),
            array('article'),            
            array('user')
     );
          
     static $has_one = array(
        array('activity', 'foreign_key'=>'source_id')
     );
     
     
     /**
      * Create Activity
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function create_activity()
     {
       if ($this->status == 'submitted') {
           $activity = new Activity();
           $activity->user_id = $this->user_id;
           $activity->type = 'homework';
           $activity->source_id = $this->id;
           $activity->save();
        }
     }
          
     /**
      * Get Action
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_action()
     {
         return ' shared their assignment answers ';
     }
     
     /**
      * Return Answers
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_answers()
     {
         return Answer::find_all_by_user_id_and_homework_id($this->user_id, $this->id);
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
         $data['answers'] = Answer::find_all_by_user_id_and_homework_id($this->user_id, $this->id);
         $data['assignment'] = Assignment::find_by_pk(array($this->assignment_id), NULL);
         $data['article'] = Article::find_by_pk(array($this->article_id), NULL);
         $data['activity'] = $this->activity;
         echo $ci->blade->render('dashboard/student/_assignment', $data, TRUE);         
     }
}

