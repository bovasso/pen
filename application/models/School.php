<?php

class School extends ActiveRecord\Model {
    static $has_many = array('classrooms');    
    static $belongs_to = array('teacher');

}