<?php 

function session() {
    $ci =& get_instance();
    $user = $ci->ion_auth->user(1)->row();
    if ( !is_null($user->id) ) {
        return User::find_by_pk(array($user->id), NULL);
    }		
}

?>
