<?php
/**
 * Profile Controller
 *
 * @package default
 * @author Jason Punzalan
 */
class Profile extends MY_Controller {

	function __construct() {
		parent::__construct();	
	}
	
	/**
	 * Show profile
	 *
	 * @return void
	 * @author Jason Punzalan
	 */
	function index() {
		$user = Auth::session();
		$this->data['user'] = $user;
		$this->data['title'] = "Profile";
		$this->blade->render('profile/index', $this->data);
	}

    /**
     * Edit Profile
     *
     * @return void
     * @author Jason Punzalan
     */
	function edit() {
		$user = Auth::session();		
		$this->data['user'] = $user;
		$this->data['title'] = "Edit Profile";
		$this->blade->render('profile/edit', $this->data);
	}
	
	/**
	 * Save Profile
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function save()
	{
	}
	function student_teacher() {
        $user = Auth::session();	
        $this->data['user'] = $user;        	
		$this->data['title'] = "Student Teacher Profile";
		$this->blade->render('profile/student_teacher', $this->data);
	}
}
