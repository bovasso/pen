<?php

class Assignments extends MY_Controller {
    protected $user = NULL;
    
	function __construct() {
		parent::__construct();	
		$this->user = Student::session();
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
		
		$homework = $this->user->homework;
        if ( $homework->is_new_record() ) {
            $homework->article_id = $id;
            $homework->user_id = $this->user->id;
            $homework->assignment_id = $course->this_weeks_assignment->id;
            $homework->save();
        }

        $this->data['homework'] = $homework;
		$this->data['answers'] = $homework->answers;
		$this->data['article'] = $homework->article;
		$this->blade->render('assignments/article', $this->data);
	}
	
	/**
	 * Comment
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function comment()
	{
	    $this->data['title'] = "Assignments";
		$course = Course::find_by_pk(array(1), NULL);
		$this->data['course'] = $course;
		
		$this->data['assignments'] = $this->user->penpal_assignments;
		$this->blade->render('assignments/comment', $this->data);		
	}
	
	/**
	 * Save draft
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function save($assignment_id = NULL)
	{

	    $data = $this->input->post();
        $homework = $this->user->homework;
        if (!empty($data)) {
            foreach( $data as $id => $text ) {
                if (!strstr($id, 'question_')) continue;                
                $id = array_pop(explode('_', $id));

                $answer = Answer::find_by_question_id_and_user_id_and_homework_id($id, $this->user->id, $homework->id);

                if (is_null($answer)) {
                    $answer = new Answer();   
                    $answer->question_id = $id;
                    $answer->user_id = $this->user->id;
                    $answer->homework_id = $homework->id;
                }

                $answer->article_id = $this->input->post('article_id');                
                $answer->is_draft = TRUE;
                $answer->content = $text;
                $answer->save();
            }
        }
        
        $this->ci_alerts->set('info', 'Your work has been saved!');

        redirect( $this->agent->referrer() );                        
	}
	
	/**
	 * Save and send
	 *
	 * @return void
	 * @author Jason Punzalan
	 **/
	public function save_and_send()
	{

	    $data = $this->input->post();
        $homework_id = $this->input->post('homework_id');
        $article_id = $this->input->post('article_id');
        $user = $this->user;
        
        if (!empty($data)) {
            foreach( $data as $id => $text ) {
                if (!strstr($id, 'question_')) continue;                
                $id = array_pop(explode('_', $id));
                
                $answer = Answer::find_by_question_id_and_user_id($id, $user->id);
                
        	    Answer::transaction(function() use ($article_id, $homework_id, $id, $user, $text, $answer) {

                    if (is_null($answer)) {
                        $answer = new Answer();   
                        $answer->question_id = $id;
                        $answer->user_id = $user->id;
                    }

                    $answer->homework_id = $homework_id;
                    $answer->article_id = $article_id;
                    $answer->is_draft = FALSE;
                    $answer->content = $text;
                    $answer->save();
                    
                });   
                
                $homework = Homework::find_by_pk(array($homework_id), NULL);                
                $homework->status = 'submitted';
                $homework->save();
                
            }
                        
        }
        
        $this->ci_alerts->set('info', 'Great!');

        redirect( '/assignments/comment' );                        
     
	}
	
	/**
	 * This week's assignment function
	 *
	 * @return void
	 * @author Jason Punzalan
	 */
	function this_week() {
		$this->data['title'] = "This Weeks Assignments";
		$this->blade->render('assignments/this_week', $this->data);
	}
}
