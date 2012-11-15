<h3>This Week's Assignments</h3>

<div id="assignment_checklist">
	<h4>{{$assignment->name}}</h4>
	<div class="article-image left">{{$assignment->video}}</div><!-- end Article Image -->
	<ol>
		<li><p class="left w80">Watch the video on Immigration and select an article</p><a href="/assignments" class="check_status <?php echo display_progress_check_status($student->progress->read) ?> right"></a></li>
		<li><p class="left w80">Answer the questions about the article you selected</p><a href="/assignments/article/{{$student->selected_assignment_article_id}}" class="check_status <?php echo display_progress_check_status($student->progress->answer) ?> right"></a></li>
		<li><p class="left w80">Comment on at least one of each of your penpals’ responses from last week</p><a href="/assignments/comment/{{$assignment->id}}" class="check_status <?php echo display_progress_check_status($student->progress->comment) ?> right"></a></li>
	</ol>
</div><!-- end #assignment_checklist -->
<div id="assignment_status">
	<h4>Assignment Status</h4>

    <!-- <div class="progress">
        <div id="progressbar"></div>
    </div> -->
    <!-- End demo -->
	<p class="due_date">{{$assignment->due_date}}</p>

</div>

<h3>All Assignments</h3>

<div id="assigment_weeks" class="w80">
	<ul>
        @foreach( $assignments as $assignment)
		<li>
			<p id="{{str_replace(' ', '_', strtolower($assignment->topic))}}" class="category left"><a href=""><i class="{{str_replace(' ', '_', strtolower($assignment->topic))}}"></i>{{strtoupper($assignment->topic)}}</a></p>  	
			<ul class="student_actions right">
				<li class="read"><a href="/assignments/{{$assignment->id}}"><i class="doc <?php echo display_progress($student->progress->read) ?>"></i></a></li>
				<li class="answer"><a href="/assignments/{{$assignment->id}}"><i class="bubble <?php echo display_progress($student->progress->answer) ?>"></i></a></li>
				<li class="comment"><a href="/assignments/{{$assignment->id}}"><i class="bubble <?php echo display_progress($student->progress->comment) ?>"></i></a></li>
			</ul>
		</li>
		@endforeach
	</ul>
</div>
<!-- end Students Registered -->