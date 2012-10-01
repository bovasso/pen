<h1>ASSIGNMENTS</h1>
<div id="assignment-tabs" class="tabs">
	<ul>
		<li class="assignment-tab-setup"><a href="#assignment-tabs-setup">SETUP</a></li>
		<li class="assignment-tab-1"><a href="#assignment-tabs-1">WEEK 1</a></li>
		<li class="assignment-tab-2"><a href="#assignment-tabs-2">WEEK 2</a></li>
		<li class="assignment-tab-3"><a href="#assignment-tabs-3">WEEK 3</a></li>
		<li class="assignment-tab-4"><a href="#assignment-tabs-4">WEEK 4</a></li>
		<li class="assignment-tab-5"><a href="#assignment-tabs-5">WEEK 5</a></li>
		<li class="assignment-tab-6"><a href="#assignment-tabs-6">FINAL PROJECT</a></li>
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
    					<tr>
    						<th>CLASS</th>
    						<th>GROUP CODE</th>
    					</tr>
    					<tr>
    						<td>Class 1</td>
    						<td>XYNve67</td>
    					</tr>
    					 <tr>
    						<td>Class 1</td>
    						<td>XYNve67</td>
    					</tr>
    					<tr>
    						<td>Class 1</td>
    						<td>XYNve67</td>
    					</tr>
    					 <tr>
    						<td>Class 1</td>
    						<td>XYNve67</td>
    					</tr>
					</table>

					<div class="alert">
						<p class="heavy">Important: Deadline for Student Registration: Thursday, September 20</p>
						<p>Student that miss the deadline won't be matched with their own PenPal</p>
					</div>

				</li>
				<li>
					<p class="heavy">We'll send you an email introducing you to your partner class(es)</p>
				</li>
				<li>
					<p class="heavy">Your exchange will begin Tuesday, September 25.</p>
				</li>
			</ol>
			<!-- end Setup Steps -->
			<p class="heavy">Questions? Check out our <a href="#">FAQs</a></p>

		</div>
	</div><!-- end Assignment Tab 1 -->
    @foreach ($course->assignments as $assignment)
	<div id="assignment-tabs-{{$assignment->week}}" class="tab">
		<div class="tab-inner">
				<div class="due-date right">Due {{$assignment->due_date}}</div>
				<h2>YOUR STUDENTS' TO-DO LIST</h2>
				<h3 class="heavy">1. Watch the Video<br />{{$assignment->name}}</h3>
				<div class="featured-topic w100">
					<div class="img-wrapper left "> 
						<img src="http://placehold.it/272x153" class="">
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
                				<a href="/assignments/article/{{$article->id}}"><img src="{{$article->primary_image}}"/></a>	
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
		</div>
	</div><!-- end Assignment Tab 2 -->
    @endforeach
</div>