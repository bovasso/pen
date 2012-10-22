<?php

/**
 * Session
 *
 * @package default
 * @author Jason Punzalan
 **/
class Auth extends Ion_auth
{
    public static function get() {
        $user = $this->ion_auth->user()->row();
        if ( isset($user->id) ) {
            return parent::find_by_pk(array($user->id), NULL);
        }		

        return parent::find_by_pk(array(8), NULL);
    }    
    
    public static function session() {
        $ci =& get_instance();
        $ci->output->enable_profiler(TRUE);
		
        $user = $ci->ion_auth->user()->row();

        if ( isset($user->id) ) {
            $group = $ci->ion_auth->get_users_groups($user->id)->result();
            $class = array_pop($group)->name;
            return $class::find_by_pk(array($user->id), NULL);
        }		
        
        
        redirect('/account/login');
    }
    
    
} // END class Session extends Ion_auth
