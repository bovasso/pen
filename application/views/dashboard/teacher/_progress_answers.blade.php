<table border="0" cellspacing="5" cellpadding="5">
	<thead>
	    <tr>
	    	<th>Student Name</th>
	    	<th class="assignment_details">Assignments Details</th>
	    </tr>
	</thead>
	<tbody> 
	    <tr>
	    	<td class="student_left">
	    		<ul class="class_list">  
	    		     
	    		    @foreach($students as $student)
	    			<li>
	    				<div class="student_name"><a href="/teacher/dashboard/progress/answers/{{$student->username}}">{{$student->full_name}}</a></div>
	    				<ul class="student_actions">
			    			<li class="read"><a href=""><i class="doc <?php echo display_progress($student->progress->answer) ?>"></i></a></li>
			    			@if( $student->hasMoreThanOnePenpal )
			    			    <li class="comment"><a href=""><i class="bubble <?php echo display_progress($student->progress->comment) ?>"></i></a></li>
			    			    <li class="comment"><a href=""><i class="bubble <?php echo display_progress($student->progress->comment) ?>"></i></a></li>			    			    
			    			@else
                                <li class="comment"><a href=""><i class="bubble <?php echo display_progress($student->progress->comment) ?>"></i></a></li>			    			    			    			
			    			@endif
			    		</ul>
	    			</li>                         
	    			@endforeach  
	    		</ul>
	    	</td>
	    	<td class="assignment_details">	    	
	    	@if(!empty($selected_student))
	    	<div id="assignment-feed">
                <center><h4>View {{$selected_student->full_name}}'s <a href="/teacher/dashboard/progress/{{$classroom->id}}/answers/{{$selected_student->username}}/">Answers</a> | <a href="/teacher/dashboard/progress/{{$classroom->id}}/comments/{{$selected_student->username}}">Comments</a></h4></center>
                <br/>
                @if($selected_student->progress->hasAnswers)
				<ul id="actions" class="w100">

					<li class="action w100">
    					<div class="left avatar a70">
    						<div class="image-wrap" style="background-image: url(<?php echo $selected_student->avatar ?>);"></div>
    					</div><!-- end Avatar -->
                        
    					<div class="right">
	    					<div class="action-details">
	    						<div class="action-authoring">
	    							<div class="action-title left">{{$selected_student->full_name}} {{$selected_student->progress->action}}:</div>
	    							<div class="action-date right"></div>
	    						</div> <!-- end Authour and Date -->

	    						<div class="action-article">
	    							<h4>{{$selected_student->progress->article->title}}</h4>
	    							<div class="article-image left">
	    							    @if( $selected_student->progress->article->primary_image )    
                            			    <img src="http://src.sencha.io/90/80/{{$selected_student->progress->article->primary_image}}"/>
                            			@endif
                            			@if( $selected_student->progress->article->custom_image )     
                            		   	    <img src="/public/articles/mini/{{$selected_student->progress->article->custom_image}}"/>
                            		   	@endif
                            			@if( $selected_student->progress->article->hasNoImage )
                                            <img src="/public/images/default_article_image.png"/>
                            			@endif                                                                                                                                          				
                                        
	    							    </div><!-- end Article Image -->
	    							<div class="article-details right w80">
	    								<p>{{$selected_student->progress->article->abstract}}</p> 
	    								<p><?php echo anchor_popup($selected_student->progress->article->source, 'Read More', array('alt'=>"Article Name")) ?></p>
	    							</div>
	    						</div><!-- end Article Share --> 

                                @foreach($selected_student->progress->answers as $answer )
                                <div class="article-qa left w100">
                                	<h4>{{$answer->question->title}}</h4>
                                	<p id="answer_{{$answer->id}}" class="edit_area">{{$answer->content}}</p>
                                	<div style="float:right"><a class="edit_answer" data-answer="{{$answer->id}}" href="#">Edit</a></div>
	    						</div><!-- end Articla QA -->
                                @endforeach 
                                <div class="comment-container left w100">
                        			<div class="left avatar a55 w10">
                        					<div class="image-wrap" style="background-image: url(<?php echo $teacher->avatar ?>);"></div>
                        			</div><!-- end Avatar -->
                                
        							<div class="comment-form w80" style="float:right">
                                          <?php echo $this->formbuilder->open( '/teacher/dashboard/send_feedback', array('id'=>'comment')) ?>                                
                        					<?php echo $this->formbuilder->textarea( 'comment', '', '', array('class'=>'w100')) ?>       
                                              <?php echo $this->formbuilder->hidden( 'homework_id', $selected_student->progress->id) ?>               							                             
                        					<p class="btn-wrapper" style="float:right">
                                  				<input type="submit" class="submit btn" value="Send Feedback"/>
                                  			</p>                        			
                        				</form>
                        			</div><!-- end Comment Form -->					
                    			</div><!-- end Comments BEFORE SUBMISSION-->
                        		
	    					</div>
    					</div><!-- end Right -->
					</li><!-- end Comment Item -->
				</ul> 
				
				@else
				<p>No work has been submitted</p>
                @endif
			</div>
			@endif  
			@if(empty($selected_student))                
			    <div class="alert" style="text-align:center">
					<p class="heavy">Important: Deadline for Student Registration: {{$course->register_deadline}}</p>
					<p>There are no students have registered yet</p>
                </div>
	    	@endif	    	
	    	</td>   
	   	</tr>
	</tbody>
</table>