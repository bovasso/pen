<?php

class Partnership extends ActiveRecord\Model {
    static $belongs_to = array(
        array('classroom', 'class' => 'Classroom', 'foreign_key' => 'partnership_id' ),
        array('parent_classroom', 'class' => 'Classroom', 'foreign_key' => 'classroom_id' )        
    );
    
    // static $after_create = array('create_penpal_relationships'); # new records only
    static $before_destroy = array('destroy_penpal_relationships');

    /**
     * Destroy Panpal
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function destroy_penpal_relationships()
    {
        $students_group_left = $this->classroom->students;
        foreach($students_group_left as $value ){
            $delete[] = $value->id;
        }

        Penpal::table()->delete(array('user_id' => $delete));
        
        $students_group_right = $this->parent_classroom->students;
        foreach($students_group_right as $value ){
            $delete[] = $value->id;
        }                
        Penpal::table()->delete(array('user_id' => $delete));
    }
    /**
     * Create Penpal within class
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function create_penpal_relationships()
    {
        $students_group_left = $this->classroom->students;
        $students_group_right = $this->parent_classroom->students;

        $students = array_merge($students_group_left, $students_group_right);        
        $checklist = unserialize(serialize($students));
        
        $penpals = array();
        
        
        // TODO - Cleanup 
        // First Pass
        foreach($students as $key => $student) {
            foreach($checklist as $matched => $obj){                
                // Student not in class then pair up!
                if ( $obj->classroom_id !== $student->classroom_id) {                    
                    $penpals[] = array($student, $obj);
                    array_splice($checklist, $matched, 1); // Checkoff student from list
                    break;
                }                
            }
        }                

        // If we have extra students left over, match again
        if ( count($checklist) > 0 ) {
            foreach($checklist as $obj ) { 
                foreach($students as $key => $student){                     
                    if ( $obj->classroom_id !== $student->classroom_id) {   
                       $penpals[] = array($obj, $student);
                       array_splice($students, $key, 1);
                       break;                 
                    }
                }                
            }
        }    
        
        foreach($penpals as $entry ) {
            Penpal::create(array('classroom_id'=>$entry[0]->classroom_id, 'user_id'=>$entry[0]->id, 'penpal_id'=>$entry[1]->id));
        }
    }
    
   
}