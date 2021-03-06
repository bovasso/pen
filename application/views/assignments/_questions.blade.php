<!-- begin Before Assignment Posted -->
<div class="questions">
    @if ( !$assignment->active )
	<p class="instructions">You will be able to answer the questions starting on Week {{$assignment->week}} of the course</p>			
	@endif
    @if ( count($assignment->questions) == 0 )	
         <p>Sorry, no questions have been assigned yet.</p>
         @include('partials/support')
	@endif
	@if ( $homework->feedback )
	       <p>{{$homework->user->classroom->teacher->full_name}} wrote {{$homework->feedback}}</p>
	@endif
	
	@if ( count($assignment->questions) != 0 )
        <?php echo $this->formbuilder->open( '/assignments/save', FALSE, array('id'=>'answers')) ?>    	            
	
    	@if ( $assignment->active && $homework->answer != 1 )
    	<p class="btn-wrapper"><input type="submit" class="btn left save_as_draft" value="Save As Draft"/></p>	
    	@endif
    	
    	<ul class="w100">
    	    @foreach( $assignment->questions as $key => $question)
    		<li class="action w100">
    			<div class="article-qa left w100">
    				<h4>Question {{$key + 1}}</h4>
    				<p>{{$question->title}}</p>
    			</div><!-- end Articla QA -->
			
    			@if ( $assignment->active && $homework->answer != 1)
    			<div class="comment-form">			        
    					<textarea data-question="{{$question->id}}" name="question_{{$question->id}}" placeholder="Write a comment...">{{$question->find_answer_by_user_id(User::session()->id)}}</textarea>
                        <?php echo $this->formbuilder->hidden('homework_id', $homework->id) ?>
                        <?php echo $this->formbuilder->hidden('article_id', $article->id) ?>                    
    			</div><!-- end Comment Form -->
    			@else
    			   <p>
    			       {{$question->find_answer_by_user_id(User::session()->id)}}
    			   </p>
    			@endif
    		</li><!-- end Comment Item -->
    	    @endforeach		
    	</ul><!-- end Questions List -->
	
    	@if ( $assignment->active && $homework->answer != 1)
    	<p class="btn-wrapper"><input type="submit" class="btn left save_as_draft" value="Save As Draft"/></p>
    	<p class="btn-wrapper"><a href="#" id="send_to_penpals" class="btn right">Send to Penpals</a></p>
    	@endif
    	</form>   
    @endif
</div>
<!-- end Questions Before Assignment Posted-->