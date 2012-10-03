<?php

class School extends ActiveRecord\Model {
    
    static $belongs_to = array('teacher');

}