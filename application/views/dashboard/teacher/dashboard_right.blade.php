<h1>ASSIGNMENTS</h1>
<div id="assignment-tabs" class="tabs">
	<ul>
		<li class="assignment-tab-setup"><a href="#assignment-tabs-setup">SETUP</a></li>
        @foreach($assignments as $assignment)
		<li class="assignment-tab-{{$assignment->week}}"><a href="#assignment-tabs-{{$assignment->week}}">WEEK {{$assignment->week}}</a></li>
        @endforeach
	</ul>
	<div id="assignment-tabs-setup" class="tab">
		<div class="tab-inner">
			<div class="w100 left">					
				<div class="left avatar a55 w10">
					<span class="airplane-success"></span>
				</div><!-- end Avatar -->
				<div class="comment-success right w90">
					<p class="heavy">Welcome to PenPal News!</p>
					<p>What next?</p>
				</div>	
			</div>

			<ol id="setup_steps">
				<li>
					<p class="heavy">Give the group codes below to your students.  Direct them to enter the codes at 
<a href="#">www.penpalnews.com</a></p>
					
					<table border="0" cellspacing="5" cellpadding="5">
					    @foreach( $classrooms as $classroom)
    					<tr>
    						<td>{{$classroom->name}}</td>
    						<td>{{$classroom->group->code}}</td>
    					</tr>
    				    @endforeach
					</table>

					<div class="alert">
						<p class="heavy">Important: Deadline for Student Registration: {{$course->register_deadline}}.</p>
						<p>Student that miss the deadline won't be matched with their own PenPal</p>
					</div>

				</li>
				<li>
					<p class="heavy">We'll send you an email introducing you to your partner class(es)</p>
				</li>
				<li>
					<p class="heavy">Your exchange will begin {{$course->start_date}}.</p>
				</li>
			</ol>
			<!-- end Setup Steps -->
			<p class="heavy">Questions? Check out our <a href="#">FAQs</a></p>

		</div>
	</div><!-- end Assignment Setup Tab --> 
	@foreach ($course->assignments as $assignment)
	<div id="assignment-tabs-{{$assignment->week}}" class="tab">
		<div class="tab-inner">
				<div class="due-date right">Due {{$assignment->due_date}}</div>
				<h2>YOUR STUDENTS' TO-DO LIST</h2>
				<h3 class="heavy">1. Watch the Video<br />{{$assignment->name}}</h3>
				<div class="featured-topic w100">
					<div class="img-wrapper left "> 
                        {{$assignment->video}}
					</div>
					<div class="right">
						<a href="#">{{$assignment->name}}</a>
						<p>{{$assignment->description}}</p> 
					</div>
				</div><!-- end Featured Assignment Topic -->

				<div class="w100">
					<h3 class="heavy">2. Select a News Story about the Economy</h3>
					<p class="instructions">Students will select news to read and write about or you may direct the whole class to read an article of your choice. Students should answer the questions associated with the story.</p>
                    <ul class="assignments-list">
                        @foreach( $assignment->articles as $article)					    
                		<li>
                			<div class="left w30">
                				<a href="/assignments/article/{{$article->id}}"><img src="http://src.sencha.io/180/194/{{$article->primary_image}}"/></a>	
                			</div>
                			<div class="right w70">
                				<h4><a href="/assignments/article/{{$article->id}}">{{$article->title}}</a></h4>
                                <p>{{$article->abstract}}</p>
                				<p class="read-more"><a href="/assignments/article/{{$article->id}}">Read More...</a></p>
                			</div><!-- end Featured Assignment Topic -->
                		</li>
                		@endforeach
                	</ul>                	
				</div>  
				<div class="w100">
					<h3 class="heavy">3. Comment on Penpals Work</h3>
					<p class="instructions">Students will comment on at least one of their penpal's answers from the last week's topic. If your student's
					penpal has not completed last week's assignment, your student will automatically recieve credit for this part of the assignment.</p>
				</div>				
		</div>
	</div><!-- end Assignment Tab -->
    @endforeach
</div>