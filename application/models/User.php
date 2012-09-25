<?php

class User extends ActiveRecord\Model {
    static $has_many = array('penpals', 'through'=>'penpals');
    static $belongs_to = array('classroom');
    /**
     * Penpals sorted by course
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_penpals_by_classroom()
    {
        $penpals = Penpal::find_all_by_classroom_id_and_user_id($this->classroom_id, $this->id);
        return $penpals;
    }
}