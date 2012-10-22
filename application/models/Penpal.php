<?php

class Penpal extends ActiveRecord\Model {
    static $belongs_to = array(
        array('student', 'class'=>'Student', 'foreign_key'=>'penpal_id', 'parent_key'=>'id'),
        array('user'),
        array('classroom'),
        array('partnership')
    );
}