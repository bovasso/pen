<?php 

function session() {
    $ci =& get_instance();
    $user = $ci->ion_auth->user();
    return $user;
}

function logged_in() {
    $ci =& get_instance();
    return $ci->ion_auth->logged_in();
}

?>
