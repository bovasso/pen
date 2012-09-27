@layout('layouts/main')
@section('content')

<div class="wrapper" id="assignments">
	<h1><i class="title-arrow">&nbsp;</i>This Week's Assignments</h1>
	<div id="assignment-tabs" class="tabs">
		<ul>
			<li class="assignment-tab-1"><a href="#assignment-tabs-1"><span>1.</span>select a news story<span class="tab-check"></span></a></li>
			<li class="assignment-tab-2"><a href="#assignment-tabs-2"><span>2.</span>answer the questions</a></li>
			<li class="assignment-tab-3"><a href="#assignment-tabs-3"><span>3.</span>comment on your penpals answers</a></li>
		</ul>
		<div id="assignment-tabs-1" class="tab">
			<div class="tab-inner">

				<div class="featured-topic w100">
					<div class="img-wrapper left"> 
						<img src="http://placehold.it/354x196" class="">
					</div>
					<div class="right">
						<h2>The Economy Explained in One Minute</h2>
						<p>Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus.</p> 
						<p>Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue.</p>
					</div>
				</div><!-- end Featured Assignment Topic -->

				<div class="w100">
					<h3>Select a News Story about the Economy</h3>
					<ul class="assignments-list">
						<li>
							<div class="left w30">
								<img src="http://placehold.it/220x127" class="">	
							</div>
							<div class="right w70">
								<h4>The Economy Explained in One Minute</h4>
								<p>Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus.</p> 
								<p>Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue.</p>
								<p class="read-more"><a href="#">Read More...</a></p>
							</div><!-- end Featured Assignment Topic -->
						</li>
						<li>
							<div class="left w30">
								<img src="http://placehold.it/220x127" class="">	
							</div>
							<div class="right w70">
								<h4>The Economy Explained in One Minute</h4>
								<p>Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus.</p> 
								<p>Mauris iaculis porttitor posuere. Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue.</p>
								<p class="read-more"><a href="#">Read More...</a></p>
							</div><!-- end Featured Assignment Topic -->
						</li>
					</ul>

				</div>

			</div>
		</div><!-- end Assignment Tab 1 -->

		<div id="assignment-tabs-2" class="tab">
			<div class="tab-inner">

				<div id="answer-questions" class="w100">
					<div class="left w60">
						<h2>Immigration to the United States is a complex demographic</h2>
						<p class="subhead">Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus.</p>
						<img src="http://placehold.it/540x250">
						<p>Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus.Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus.</p>
						<p>Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus.</p> 
						<p>Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus.</p> 
						
						<center class="missing-media">
							<hr />
							<br />
							<p>Missing audio and video?</p>
							<p class="btn-wrapper">
								<a href="#" class="submit btn">View Original</a>
							</p>
						</center>
					</div>
					<!-- end Left -->
					<div id="assignments-right" class="right w40">
						@include('assignments/_before_assignment_posted')
						@include('assignments/_assignment_answer_questions')
						@include('assignments/_assignment_after_submission')
					</div><!-- end Right -->
				</div>

			</div>
		</div><!-- end Assignment Tab 2 -->

		<div id="assignment-tabs-3" class="tab">
			<div id="assignment-comments" class="tab-inner">

				<ul id="actions" class="w100">

					<li class="action w100">
    					<div class="left avatar a70">
    						<span class="frame">&nbsp;</span>
    						<img src="http://placehold.it/70x70">
    					</div><!-- end Avatar -->

    					<div class="right w90">
	    					<div class="action-details">
	    						<div class="action-authoring">
	    							<div class="action-title left">Brian L shared his Energy assignment:</div>
	    							<div class="action-date right">Thursday, Sept 6, 2012</div>
	    						</div> <!-- end Authour and Date -->

	    						<div class="action-article">
	    							<h4>Immigration to the United States is a complex demographic phenomenon that has been a major source of population growth and cultural change</h4>
	    							<div class="article-image left"><img src="http://placehold.it/109x80"></div><!-- end Article Image -->
	    							<div class="article-details right w80">
	    								<p>Eum causa causa inhibeo, wisi lucidus vel, iusto brevitas te ea. Blandit gravis olim foras autem paratus consequat dolor augue. Vicis meus saluto quis, lobortis ea. Abico fatua tum lobortis gilvus brevitas fatua vel rusticus paratus.</p>
	    								<p><a href="#" alt="Article Name">Read More</a></p>
	    							</div>
	    						</div><!-- end Article Share --> 

	    						<div class="article-qa left w100">
	    							<h4>What do you think about the way immigrants are treated in the U.S.?</h4>
	    							<p>Vicis meus saluto quis, lobortis ea. Abico fatua tum lobortis gilvus brevitas fatua vel rusticus paratus. Te typicus indoles venio, facilisi.</p>

	    							<div class="comment-container left w100">

	    								<div class="left avatar a55 w10">
    										<span class="frame">&nbsp;</span>
    										<img src="http://placehold.it/55x55">
    									</div><!-- end Avatar -->
    									<div class="comment-form right w90">
    										<form>
    											<textarea>Write a comment...</textarea>
    										</form>
    									</div><!-- end Comment Form -->

	    							</div><!-- end Comments -->
	    						</div><!-- end Articla QA -->

	    						<div class="article-qa left w100">
	    							<h4>What do you think about the way immigrants are treated in the U.S.?</h4>
	    							<p>Vicis meus saluto quis, lobortis ea. Abico fatua tum lobortis gilvus brevitas fatua vel rusticus paratus. Te typicus indoles venio, facilisi.</p>

	    							<div class="comment-container left w100">

	    								<div class="left avatar a55 w10">
    										<span class="frame">&nbsp;</span>
    										<img src="http://placehold.it/55x55">
    									</div><!-- end Avatar -->
    									<div class="comment-form right w90">
    										<form>
    											<textarea>Write a comment...</textarea>
    										</form>
    									</div><!-- end Comment Form -->

	    							</div><!-- end Comments -->
	    						</div><!-- end Articla QA -->

	    					</div>
    					</div><!-- end Right -->
					</li><!-- end Comment Item -->

					<li class="action w100">
    					<div class="left avatar a70">
    						<span class="frame">&nbsp;</span>
    						<img src="http://placehold.it/70x70">
    					</div><!-- end Avatar -->

    					<div class="right w90">
	    					<div class="action-details">
	    						<div class="action-authoring">
	    							<div class="action-title left">Brian L shared his Energy assignment:</div>
	    							<div class="action-date right">Thursday, Sept 6, 2012</div>
	    						</div> <!-- end Authour and Date -->

	    						<div class="action-article">
	    							<h4>Immigration to the United States is a complex demographic phenomenon that has been a major source of population growth and cultural change</h4>
	    							<div class="article-image left"><img src="http://placehold.it/109x80"></div><!-- end Article Image -->
	    							<div class="article-details right w80">
	    								<p>Eum causa causa inhibeo, wisi lucidus vel, iusto brevitas te ea. Blandit gravis olim foras autem paratus consequat dolor augue. Vicis meus saluto quis, lobortis ea. Abico fatua tum lobortis gilvus brevitas fatua vel rusticus paratus.</p>
	    								<p><a href="#" alt="Article Name">Read More</a></p>
	    							</div>
	    						</div><!-- end Article Share --> 

	    						<div class="article-qa left w100">
	    							<h4>What do you think about the way immigrants are treated in the U.S.?</h4>
	    							<p>Vicis meus saluto quis, lobortis ea. Abico fatua tum lobortis gilvus brevitas fatua vel rusticus paratus. Te typicus indoles venio, facilisi.</p>

	    							<div class="comment-container left w100">

	    								<div class="left avatar a55 w10">
    										<span class="frame">&nbsp;</span>
    										<img src="http://placehold.it/55x55">
    									</div><!-- end Avatar -->
    									<div class="comment-form right w90">
    										<form>
    											<textarea>Write a comment...</textarea>
    										</form>
    									</div><!-- end Comment Form -->					

	    							</div><!-- end Comments BEFORE SUBMISSION-->

	    							<div class="comment-container left w100 success">

	    								<div class="left avatar a55 w10">
    										<span class="airplane-success"></span>
    									</div><!-- end Avatar -->
    									<div class="comment-success right w90">
			    							<p>Congratulations! You’ve completed part of your assignment.<br />
			    								Keep the conversation going.
			    							</p>
    									</div>						

	    							</div><!-- end Comments AFTER SUCCESS SUBMISSION -->


	    						</div><!-- end Articla QA -->

	    						<div class="article-qa left w100">
	    							<h4>What do you think about the way immigrants are treated in the U.S.?</h4>
	    							<p>Vicis meus saluto quis, lobortis ea. Abico fatua tum lobortis gilvus brevitas fatua vel rusticus paratus. Te typicus indoles venio, facilisi.</p>

	    							<div class="comment-container left w100">

	    								<div class="left avatar a55 w10">
    										<span class="frame">&nbsp;</span>
    										<img src="http://placehold.it/55x55">
    									</div><!-- end Avatar -->
    									<div class="comment-form right w90">
    										<form>
    											<textarea>Write a comment...</textarea>
    										</form>
    									</div><!-- end Comment Form -->

	    							</div><!-- end Comments -->
	    						</div><!-- end Articla QA -->

	    					</div>
    					</div><!-- end Right -->
					</li><!-- end Comment Item -->



				</ul>
				<!-- end Comments -->
				<center class="missing-media">
					<p>Missing audio and video?</p>
					<p class="btn-wrapper">
						<a href="#" class="submit btn">View Original</a>
					</p>
				</center>
				<hr />
				<div class="bottom-navigation right w20"><a href="#">< RETURN TO HOME</a></div>

			</div>
		</div>
	</div>
</div>

@endsection
