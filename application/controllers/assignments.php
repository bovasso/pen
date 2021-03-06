<?php

class Assignments extends MY_Controller {
    protected $user = NULL;
    static $is_secure = TRUE;
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
	function index($id = NULL) {
		$this->data['title'] = "Assignments";
		$course = Course::find_by_pk(array(1), NULL);
		if ( $course->hasNotYetStarted ) {
		    $this->ci_alerts->set('info', 'Your course has not yet started');
		    redirect($this->agent->referrer());
		}                           
		
		$this->data['course'] = $course;                           
				
        if (!is_null($id)) {
            $assignment = Assignment::find_by_pk(array($id), NULL);
        }else{
            $assignment = $course->this_weeks_assignment;
        }                                                                        
        
        // Students should only access assignments that have started
        if ( $assignment->id !== $course->this_weeks_assignment->id ) show_404();
        
        $this->data['assignment'] = $assignment;
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
	    if ( $id == 'none' ) {  
	        $this->ci_alerts->set('info', "You didn't select an article yet.");
	        redirect('assignments');
	    }                           

		$this->data['title'] = "Assignments";
		$course = $this->user->classroom->course;
		$this->data['course'] = $course;
		$this->data['assignment'] = $course->this_weeks_assignment;
		
		$homework = $this->user->homework;

        if ( $homework->is_new_record() ) {
            $homework->article_id = $id;
            $homework->user_id = $this->user->id;
            $homework->assignment_id = $course->this_weeks_assignment->id;
            $homework->course_id = $course->id;
            $homework->save_as_activity = FALSE;
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
	public function comment($id = NULL)
	{
	    $this->data['title'] = "Assignments";        
		$course = Course::find_by_pk(array(1), NULL);
		$this->data['course'] = $course;

		if ( !$this->user->penpal_assignments ) {
		    $this->ci_alerts->set('info', "Your penpal hasn't completed their assignment yet.");
		    redirect('student/dashboard');
		    exit;
		}   

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
                                
            }
            
            $homework = Homework::find_by_pk(array($homework_id), NULL);                
            $homework->answer = 1;
            $homework->save();
            
                        
        }
        
        if ( !$this->user->penpal_assignments ) {
            $this->ci_alerts->set('info', "Great! You submitted shared your answers, but your penpal hasn't submitted theirs yet");
            redirect('/student/dashboard');
            exit;
        }
		
        $this->ci_alerts->set('info', 'Great! You shared your answers');

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
