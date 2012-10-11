<?php

class Progress extends ActiveRecord\Model {
     static $table_name = 'progress';        
     static $belongs_to = array(
         array('user'),
         array('assignment')
     );
     
     static $delegate = array( 
         array('name', 'full_date', 'to' => 'assignment'),
         array('name', 'hasReplies', 'to' => 'source'),
         array('name', 'output', 'to' => 'source')
     );
     
}