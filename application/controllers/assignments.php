<?php

class Assignments extends MY_Controller {
    protected $user = NULL;
    
	function __construct() {
		parent::__construct();	
		$this->user = User::session();
    }
	
	/**
	 * Default
	 *
	 * @return void
	 * @author Jason Punzalan
	 */
	function index() {
		$this->data['title'] = "Assignments";
		$course = Course::find_by_pk(array(1), NULL);
		$this->data['course'] = $course;
		$this->data['assignment'] = $course->this_weeks_assignment;
		$this->blade->render('assignments/overview', $this->data);
	}

    /**
     * Article
     *
     * @param string $id 
     * @return void
     * @author Jason Punzalan
     */
	function article($id = NULL) {
		$this->data['title'] = "Assignments";
		$course = Course::find_by_pk(array(1), NULL);
		$this->data['course'] = $course;
		$this->data['assignment'] = $course->this_weeks_assignment;
        // var_dump($this->data['assignment']->questions);exit;
		$this->data['article'] = Article::find_by_pk(array(3), NULL);
        // var_dump($this->data['article']->json);exit;
		$this->blade->render('assignments/article', $this->data);
	}
	
	/**
	 * Save draft
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function save($assignment_id = NULL)
	{
        // $assignment = Assignment::find_by_pk(array($assignment), NULL);
	    $data = $this->input->post();
        if (!empty($data)) {
            foreach( $data as $id => $text ) {
                $answer = Answer::find_by_question_id_and_user_id($id, $this->user->id);
                if (is_null($answer)) {
                    $answer = new Answer();   
                    $answer->question_id = $id;
                    $answer->user_id = $this->user->id;                    
                }
                $answer->is_draft = TRUE;
                $answer->content = $text;
                $answer->save();
            }
        }
        
        return 'Saved';
	}
	
	
	function this_week() {
		$this->data['title'] = "This Weeks Assignments";
		$this->blade->render('assignments/this_week', $this->data);
	}
}
