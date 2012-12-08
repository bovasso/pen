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
     
/**
 * Handles css display for student progress for check visuals
 *
 * @return void
 * @author Jason Punzalan
 **/
function display_progress_check_status($value)
{                       
                                   
    $css_class = '';
    
    switch($value){
        case 0:            
            $css_class = 'not_started';        
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

/**
 * Returns array of options for penpals as options
 *
 * @return array
 * @author Jason Punzalan
 **/
function penpals_as_dropdown_options($value)
{        
    $options = array();                               
    foreach( $value as $option ) {
        $options[$option->student->id] = '(' . $option->student->gender .')&nbsp;' . $option->student->full_name;
    }                                              
    return $options;
}   

/**
 * display_progress_bar function
 *
 * @return void
 * @author Jason Punzalan
 **/
function display_progress_bar($value)
{       
    $progress_bar = 0;
    
    if ( $value->read ) {
        $progress_bar = 33;
    }     
    
    if ( $value->answer ) {
        $progress_bar = 66;
    }
    
    if ( $value->comment ) {
        $progress_bar = 100;
    }                     
    
    return $progress_bar;

}
?>