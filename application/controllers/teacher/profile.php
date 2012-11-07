<?php
/**
 * Profile Controller
 *
 * @package default
 * @author Jason Punzalan
 */
class Profile extends MY_Controller {
    static $is_secure = TRUE;

	function __construct() {
		parent::__construct();	                      
		$this->teacher = $this->ion_auth->user();
		$this->data['user'] = $this->ion_auth->user();
		
	}
	
	/**
	 * Show profile
	 *
	 * @return void
	 * @author Jason Punzalan
	 */
	function index($username = NULL) {
		$this->data['title'] = "Profile";

        if (is_null($username)) redirect('teacher/profile/edit');
		$this->blade->render('profile/teacher/index', $this->data);
	}

    /**
     * Edit Profile
     *
     * @return void
     * @author Jason Punzalan
     */
	function edit() {      
		$this->data['title'] = "Edit Profile";
		$this->blade->render('profile/teacher/edit', $this->data);
	}
	    
    /**
     * Change Avatar function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function change_avatar()
    {                            
        $path = $_SERVER['DOCUMENT_ROOT'] . '/public/profiles/' . $this->teacher->username;
        $avatar = $this->input->get('avatar');        
        $custom = $this->input->get('custom');                

	    if ( $custom == 'true' ) {               
	        if ( !file_exists($path) ) mkdir($path, 0777, TRUE);
            file_put_contents($path . '/avatar.png', $this->curl->simple_get($avatar));
            $this->teacher->avatar = 'custom';
            $this->teacher->save();
	    }else{
            $this->teacher->avatar = $avatar;
            $this->teacher->save();	        
	    }        
    }
	/**
	 * Save Profile
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function save()
	{            
	    $teacher = $this->teacher;        
	    if ($this->input->post('about_me')) {
            $teacher->about_me = $this->input->post('about_me');
            $teacher->save();
        }                         

        $this->ci_alerts->set('info', 'Profile Saved!');        
        redirect($this->agent->referrer());
	} 
	
	/**
	 * Save Email Options function
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function set_email_preference()
	{  
	    $teacher = $this->teacher;                                     	    
        $teacher->opt_in_email = (int)$this->input->get('opt_in_email');
        $teacher->save();
        $this->ci_alerts->set('info', 'Profile Saved!');        
	}        
	
}
