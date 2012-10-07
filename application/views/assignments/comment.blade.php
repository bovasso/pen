@layout('assignments/base')
@section('scripts')
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {       	
        $(".assignment-tab-3").addClass('ui-state-active');
    });
</script>
@endsection
@section('scripts')
<div id="assignment-feed" class="tab-inner">
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
@endsection