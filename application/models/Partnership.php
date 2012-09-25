<?php

class Partnership extends ActiveRecord\Model {
    static $belongs_to = array(
        array('classroom', 'class' => 'Classroom', 'foreign_key' => 'partnership_id' ),
        array('parent_classroom', 'class' => 'Classroom', 'foreign_key' => 'classroom_id' )        
    );
    
    
}