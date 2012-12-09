<h1>STUDENT PROGRESS</h1>

<div id="student_progress" class="w80">

	<ul id="students_registered">
	    @foreach( $classrooms as $classroom)
		<li class="left w90">               
		    <a href="/teacher/dashboard/progress/{{$classroom->id}}">		    
			<span class="w30 left">{{$classroom->name}}</span>
			<span class="w60 left">{{$classroom->registered}} of {{$classroom->class_size}} Registered</span>
			<span class="arrow-right right"></span>
			</a>
		</li>
        @endforeach
	</ul>
	<!-- end Students Registered -->

</div>

<h1>PARTNER CLASSES</h1>

<div id="partner_classes" class="w80">
	<p>Once your class(es) are matched you can learn about your partner teacher(s) and class(es) here</p>
	<ul id="students_registered">
	    @foreach( $classrooms as $classroom)
            @foreach( $classroom->partnerships as $partner)	    
    		<li class="left w90">      
    		    <a href="/teacher/dashboard/progress">
    			<span class="w30 left">{{$partner->classroom->name}}</span>
    			<span class="arrow-right right"></span>
    			</a>
    		</li>
    		@endforeach
        @endforeach
	</ul>	
</div>