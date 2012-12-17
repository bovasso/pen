<?php

class Homework extends ActiveRecord\Model {        
     public $activity_id = NULL;
     static $table_name = 'student_assignments';
     static $after_save = array('create_activity'); 
     public $save_as_activity = TRUE;
     
     static $belongs_to = array(
            array('assignment'),
            array('article'),            
            array('user'),
            array('course')
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
       if ($this->save_as_activity ) {
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
         if ( $this->belongsToUser ) {
             return ' shared your assignment ';
         }else{
             return ' shared their assignment answers ';             
         }
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
      * hasSubmittedAnswers function
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_hasAnswers()
     {       
         return ($this->answer == 1)? TRUE : FALSE;
     }
      
     /**
      * madeComments function
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_madeComments()
     {       
         return ($this->comment == 1)? TRUE : FALSE;
     }
     
     /**
      * Get Status
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_status()
     {         
        $status = $this->read_attribute('status');
        if(is_null($status)) return array();
        return explode(',', $status); 
     }    
     
     /**
      * Set Status function
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function set_status($value)
     {                                       
         $status = $this->read_attribute('status');         
         if (is_null($status)) $status = array();         
         $this->assign_attribute('status', implode(',',array_push($status, $value)));
     }   
     
     /**
      * Get Read
      *
      * @return void
      * @author Jason Punzalan
      **/
     public function get_read()
     {  
         return (!is_null($this->article_id))? TRUE : FALSE;
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
       * Selected Article
       *
       * @return void
       * @author Jason Punzalan
       **/
      public function get_selected_article()
      {                        
          if ($this->article_id) return $this->article_id;
          return FALSE;
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

