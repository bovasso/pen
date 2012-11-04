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
		$this->student = $this->ion_auth->user();
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

        if (is_null($username)) redirect('student/profile/edit');
		$this->blade->render('profile/index', $this->data);
	}

    /**
     * Edit Profile
     *
     * @return void
     * @author Jason Punzalan
     */
	function edit() {                
		$this->data['title'] = "Edit Profile";
		$this->blade->render('profile/edit', $this->data);
	}
	    
    /**
     * Change Avatar function
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function change_avatar()
    {                            
        $path = $_SERVER['DOCUMENT_ROOT'] . '/public/profiles/' . $this->student->username;
        $avatar = $this->input->get('avatar');        
        $custom = $this->input->get('custom');                

	    if ( $custom == 'true' ) {               
	        if ( !file_exists($path) ) mkdir($path, 0777, TRUE);
            file_put_contents($path . '/avatar.png', $this->curl->simple_get($avatar));
            $this->student->avatar = 'custom';
            $this->student->save();
	    }else{
            $this->student->avatar = $avatar;
            $this->student->save();	        
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
	    $student = $this->student;        
	    if ($this->input->post('about_me')) {
            $student->about_me = $this->input->post('about_me');
            $student->save();
        }                         

        $this->ci_alerts->set('info', 'Profile Saved!');        
        redirect($this->agent->referrer());
	}         
	
	function student_teacher() {        	      	
		$this->data['title'] = "Student Teacher Profile";
		$this->blade->render('profile/student_teacher', $this->data);
	}
}
