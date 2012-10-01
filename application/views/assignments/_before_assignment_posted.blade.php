<!-- begin Before Assignment Posted -->
<div class="questions">
	<p class="instructions">You will be able to answer the questions starting on Week {{$assignment->week}} of the course</p>			
	<ul class="w100">
	    @foreach( $assignment->questions as $question)
		<li class="action w100">
			<div class="article-qa left w100">
				<h4>Question {{$question->position}}</h4>
				<p>{{$question->title}}</p>
			</div><!-- end Articla QA -->
		</li><!-- end Comment Item -->
	    @endforeach		
	</ul><!-- end Questions List -->
</div>
<!-- end Questions Before Assignment Posted-->