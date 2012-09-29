<!-- begin Before Assignment Posted -->
<div class="questions">
    @if ( !$assignment->active )
	<p class="instructions">You will be able to answer the questions starting on Week {{$assignment->week}} of the course</p>			
	@endif
	
	@if ( $assignment->active )
	<p class="btn-wrapper"><a href="#" class="btn save_as_draft">Save As Draft</a></p>	
	@endif

    <?php echo form_open('/assignments/save', array('id'=>'answers')) ?>	
	<ul class="w100">
	    @foreach( $assignment->questions as $question)
		<li class="action w100">
			<div class="article-qa left w100">
				<h4>Question {{$question->position}}</h4>
				<p>{{$question->title}}</p>
			</div><!-- end Articla QA -->
			
			@if ( $assignment->active )
			<div class="comment-form">
					<textarea data-question="{{$question->id}}" name="{{$question->id}}" placeholder="Write a comment...">{{$question->find_answer_by_user_id(User::session()->id)}}</textarea>
			</div><!-- end Comment Form -->
			@endif
		</li><!-- end Comment Item -->
	    @endforeach		
	</ul><!-- end Questions List -->
    <?php echo form_close() ?>	
	
	@if ( $assignment->active )
	<p class="btn-wrapper"><a href="#" class="btn left save_as_draft">Save As Draft</a></p>
	<p class="btn-wrapper"><a href="#" class="btn right">Send to Penpals</a></p>
	@endif
	
</div>
<!-- end Questions Before Assignment Posted-->