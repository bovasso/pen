@if ($assignment)
<h3>This Week's Assignments</h3>
<div id="assignment_checklist">
	<h4>{{$assignment->name}}</h4>    
	@if ($assignment->video)
	<div class="article-image left">{{$assignment->video}}</div><!-- end Article Image -->
	@endif                   
	<ol> 
		<li><p class="left w80">Watch the video on Immigration and select an article</p>		    
		    <a href="/assignments" class="check_status <?php echo display_progress_check_status($student->progress->read) ?> right"></a>
        </li>
		<li><p class="left w80">Answer the questions about the article you selected</p>
		    <a href="/assignments/article/<?php echo ( $student->progress->selected_article )? $student->progress->selected_article : ''?>"  class="check_status <?php echo display_progress_check_status($student->progress->answer) ?> right"></a>
		</li>
		<li><p class="left w80">Comment on at least one of each of your penpals’ responses from last week</p>
		    <a href="/assignments/comment" class="check_status <?php echo display_progress_check_status($student->progress->comment) ?> right"></a>
		</li>
	</ol>
</div><!-- end #assignment_checklist -->
<div id="assignment_status">
	<h4>Assignment Status</h4>

    <div class="progress">
        <div id="progressbar"></div>
    </div>
    <!-- End demo -->
	<p class="due_date">{{$assignment->due_date}}</p>

</div>
@endif
@if (!$assignment)   
<h3>No Assignment This Week</h3> 
@endif
<h3>All Assignments</h3>

<div id="assigment_weeks" class="w80">
	<ul>
        @foreach( $assignments as $assignment_week)
		<li>
			<p id="{{str_replace(' ', '_', strtolower($assignment_week->topic->name))}}" class="category left"><a href=""><i class="{{str_replace(' ', '_', strtolower($assignment_week->topic->name))}}"></i>{{strtoupper($assignment_week->topic->name)}}</a></p>  	
			<ul class="student_actions right">
			@if($assignment_week->week == $current_week )     
				<li class="read"><i class="doc <?php echo display_progress($student->find_progress_by_assignment_id($assignment_week->id)->read) ?>"></i></li>
				<li class="answer"><i class="bubble <?php echo display_progress($student->find_progress_by_assignment_id($assignment_week->id)->answer) ?>"></i></li>
				<li class="comment"><i class="bubble <?php echo display_progress($student->find_progress_by_assignment_id($assignment_week->id)->comment) ?>"></i></li>
			@else
    			<li class="read"><i class="doc <?php echo display_progress($student->find_progress_by_assignment_id($assignment_week->id)->read) ?>"></i></li>
    			<li class="answer"><i class="bubble <?php echo display_progress($student->find_progress_by_assignment_id($assignment_week->id)->answer) ?>"></i></li>
    			<li class="comment"><i class="bubble <?php echo display_progress($student->find_progress_by_assignment_id($assignment_week->id)->comment) ?>"></i></li>			
			@endif
			</ul>
		</li>
		@endforeach
	</ul>
</div>
<!-- end Students Registered -->