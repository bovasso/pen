<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Diffbot/Http/ClientInterface.php';
require_once 'Diffbot/Http/Curl/Response.php';
require_once 'Diffbot/Http/Curl/Client.php';
require_once 'Diffbot/Exception.php';
require_once 'Diffbot/Client.php';

/**
 * Diffbot class
 *
 * @package default
 * @author Jason Punzalan
 **/
class Diffbot extends \Diffbot\Client
{
    /**
     * __construct function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function __construct()
    {
        parent::__construct('e753df45cd569328eb30f00b34bb0093');
    }
    
} // END public class 