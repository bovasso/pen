<?php

/**
 * Handles css display for student progress
 *
 * @return void
 * @author Jason Punzalan
 **/
function display_progress($value)
{                       
                                   
    $css_class = '';
    
    switch($value){
        case 0:            
            $css_class = 'default';        
            break;
        case 1:
            $css_class = 'completed';
            break;
        case 2:
            $css_class = 'late';
            break;
    }   
    
    return $css_class;
    
}

?>