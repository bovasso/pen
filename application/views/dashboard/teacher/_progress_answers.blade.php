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
	    				<div class="student_name"><a href="#">{{$student->full_name}}</a></div>
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
	    	
	    	<div id="assignment-feed">
                <center><h4>View {{$selected_student->full_name}}'s <a href="/teacher/dashboard/answers/{{$selected_student->username}}/">Answers</a> | <a href="/teacher/dashboard/comments/{{$selected_student->username}}">Comments</a></h4></center>
                <br/>
                @if($selected_student->progress->hasAnswers)
				<ul id="actions" class="w100">

					<li class="action w100">
    					<div class="left avatar a70">
    						<div class="image-wrap" style="background-image: url(<?php echo asset_url().'images/default_avatars/pink70.png'?>);"></div>
    					</div><!-- end Avatar -->
                        
    					<div class="right">
	    					<div class="action-details">
	    						<div class="action-authoring">
	    							<div class="action-title left">{{$selected_student->full_name}} {{$selected_student->progress->action}}:</div>
	    							<div class="action-date right"></div>
	    						</div> <!-- end Authour and Date -->

	    						<div class="action-article">
	    							<h4>{{$selected_student->progress->article->title}}</h4>
	    							<div class="article-image left"><img src="http://src.sencha.io/109/80/{{$selected_student->progress->article->primary_image}}"></div><!-- end Article Image -->
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
                        					<div class="image-wrap" style="background-image: url(<?php echo asset_url().'images/default_avatars/pink55.png'?>);"></div>
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
	    	</td>
	   	</tr>
	</tbody>
</table>