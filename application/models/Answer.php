<?php

class Answer extends ActiveRecord\Model {
    static $belongs_to = array('question');       
}