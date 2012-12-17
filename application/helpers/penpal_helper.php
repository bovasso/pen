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
                             
    // If student has commented but not answered questions show only partially complete
    if ( $value->comment && !$value->answer ) {
        $progress_bar = 33;        
    }                      
    
    return $progress_bar;

}    

/**
 * Country Array function
 *
 * @return void
 * @author Jason Punzalan
 **/
function country_array()
{         
    $countries = Country::find('all');
    $country_list = array();
    foreach ($countries as $country){
        $country_list[$country->iso_code_2] = $country->name;
    }                                                        
    return $country_list;
}    

/**
 * Area Arrat
 *
 * @return void
 * @author Jason Punzalan
 **/
function area_array()
{                   
    return array('u'=>'Urban', 'r'=>'Rural', 's' => 'Suburban');
}

?>