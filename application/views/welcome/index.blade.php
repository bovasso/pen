@layout('layouts/main')
@section('stylesheets')
<link href="<?php echo asset_url() ?>css/home.css" rel="stylesheet" type="text/css" />	
@endsection

@section('content')
<div id="sticky-wrapper">
	<div class="sticky-wrapper">
		<div id="content" role="main">
			<section id="intro">
				<div id="video">
					<div class="wrapper">
						<h1>Connect Your Class to the World with PenPal News!</h1>
						<ul>
							<li class="facebook"><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2FPenPalNews&amp;send=false&amp;layout=button_count&amp;width=90&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe></li>
							<li class="twitter">
								<a href="https://twitter.com/share" class="twitter-share-button" data-related="jasoncosta" data-lang="en" data-count="horizontal" data-text="PenPal News is connecting classrooms across the U.S. this fall to discuss election-year issues. #penpalnewsRED/BLUE">Tweet</a>
								<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
							</li>
						</ul>
						<div class="video-container">
							<a href="#"><img src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/intro-video-placeholder.jpg" alt="Introducing Penpal News Red-Blue: An Election Year Exchange" /><span class="play_btn">Play</span></a>
							<iframe id="video-intro" src="http://player.vimeo.com/video/44539140?api=1&amp;player_id=video-intro&amp;title=0&amp;byline=0&amp;portrait=0&amp;color=5a91df" width="960" height="540" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
						</div>
						<img class="plane" src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/plane_01.png" alt="Paper plane" width="144" />
					</div>
				</div>
				<div id="intro-copy">
					<div class="wrapper">
						<div class="right">
							<div class="cta-group">
								<h3>Teachers</h3>
								<div class="btn-wrapper-large">
									<a href="http://www.penpalnews.com/sign-up/" class="btn">sign up</a>
								</div>
							</div>
							<p class="help">Deadline to sign up is September 20th</p>
						</div><!-- .right -->
						<div class="left copy-wrapper">
							<p>PenPal News is partnering middle and high school classrooms from Red States and Blue States across the U.S. to discuss important election-year issues.</p>
							<p>Our first 6-week exchange of the school year will run from September 24 to Election Day. <strong>Space is limited.</strong></p>
							<p><a class="self-link" href="#red-blue"><strong>Learn More</strong></a></p>
						</div><!-- .left -->
					</div>
				</div>
			</section><!-- #intro -->

			<aside id="banner-international">
				<div class="wrapper">
					<img class="globe" src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/globe_bg.png" alt="Globe graphic" />
					<p class="promo">Interested in an international exchange? Check out <strong>Penpal News</strong><img src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/banner_international_bubble.png" alt="International" />&nbsp;&nbsp; <span><a class="self-link" href="#international">Learn More</a> and <a href="http://www.penpalnews.com/sign-up-international/">Sign Up</a></span></p>
					<img class="plane" src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/plane_01.png" alt="Paper plane" width="86" />
				</div>
			</aside>

			<section id="how-penpal-news-works">
				<div class="wrapper">
					<h2>How PenPal News Works</h2>
					<div class="copy-wrapper">
						<p>We know teachers are busy, so we minimize prep time by matching students, creating assignments, and facilitating student discussion.</p>
					</div>
					<img class="arrow a1" src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/arrow_hand_right_1.png" alt="Paper plane" width="70" />
					<img class="arrow a2" src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/arrow_hand_right_2.png" alt="Paper plane" width="70" />
					<ul>
						<li>
							<h4>Match</h4>
							<img src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/match.png" alt="Match" />
							<p>Each class is matched with a partner class in another state or country. All Students are assigned penpals.</p>
						</li>
						<li>
							<h4>Learn</h4>
							<img src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/learn.png" alt="Learn" />
							<p>Students complete six short weekly assignments about topics in the news. Assignments are aligned to Common Core Standards.</p>
						</li>
						<li>
							<h4>Discuss</h4>
							<img src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/discuss.png" alt="Discuss" />
							<p>Students share what they&rsquo;ve written with their penpals, who respond with their own ideas and perspectives.</p>
						</li>
					</ul>
				</div>
			</section><!-- #how-penpal-news-works -->

			<section id="red-blue">
				<div class="wrapper">
					<h2>Penpal News&nbsp;&nbsp;<span class="bubble_white"><span class="red">Red</span>-<span class="blue">Blue</span></span></h2>
					<div class="copy-wrapper">
						<p>Over the course of their six-week exchange, students will learn about five important election-year issues:<br />the Economy, Health Care, Energy, Immigration &amp; Education. Penpal News provides lesson plans, videos,<br />curated news stories and thought-provoking questions that align with the Common Core State Standards.</p>
					</div>
					<div class="its-free">
						<div class="btn-wrapper">
							<a href="http://www.penpalnews.com/sign-up/" class="btn">Sign Up</a>
						</div>
					</div>
					<div class="video-showcase-container">
						<p class="help">Check out the one-minute topic intro videos to see how we&rsquo;ve made issues accessible for 12-18 year-olds.</p>
						<div class="video-showcase">
							<ul>
								<li class="video-tab-1 is-selected"><a href="#video-tab-1">The Economy</a></li>
								<li class="video-tab-2"><a href="#video-tab-2">Health Care</a></li>
								<li class="video-tab-3"><a href="#video-tab-3">Energy</a></li>
								<li class="video-tab-4"><a href="#video-tab-4">Immigration</a></li>
								<li class="video-tab-5"><a href="#video-tab-5">Education</a></li>
							</ul>
							<div class="tab-content video-container is-selected" id="video-tab-1">
								<iframe id="video-the-economy" src="http://player.vimeo.com/video/44463396?api=1&amp;player_id=video-the-economy&amp;title=0&amp;byline=0&amp;portrait=0&amp;color=5a91df" width="575" height="323" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							</div>
							<div class="tab-content video-container" id="video-tab-2">
								<iframe id="video-health-care" src="http://player.vimeo.com/video/46755035?api=1&amp;player_id=video-health-care&amp;title=0&amp;byline=0&amp;portrait=0&amp;color=5a91df" width="575" height="323" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							</div>
							<div class="tab-content video-container" id="video-tab-3">
								<iframe id="video-energy" src="http://player.vimeo.com/video/45947200?api=1&amp;player_id=video-energy&amp;title=0&amp;byline=0&amp;portrait=0&amp;color=5a91df" width="575" height="323" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							</div>
							<div class="tab-content video-container" id="video-tab-4">
								<iframe id="video-immigration" src="http://player.vimeo.com/video/45947201?api=1&amp;player_id=video-immigration&amp;title=0&amp;byline=0&amp;portrait=0&amp;color=5a91df" width="575" height="323" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							</div>
							<div class="tab-content video-container" id="video-tab-5">
								<iframe id="video-education" src="http://player.vimeo.com/video/46786318?api=1&amp;player_id=video-education&amp;title=0&amp;byline=0&amp;portrait=0&amp;color=5a91df" width="575" height="323" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							</div>
						</div><!-- .video-showcase -->
					</div><!-- .video-showcase-container -->
				</div>
			</section>

			<section id="international">
				<div class="wrapper">
					<h2>Penpal News&nbsp;&nbsp;<span class="bubble_grey"><span class="green">International</span></span></h2>
					<div class="img-wrapper left">
						<img src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/ghana_students.jpg" alt="Ghana Students communicating with their Huntington Beach Penpals" />
						<p class="caption">Students at the Crossover International Academy in Ghana wait<br />in line to connect with their penpals in Huntington Beach.</p>
					</div>
					<div class="copy-wrapper right">
						<p>In the past year, we&rsquo;ve signed up teachers in over 50 countries and connected thousands of students around the world.</p>
						<p>The curriculum for international sessions focuses on global current events about topics ranging from technology to government to the environment.</p>
						<p>International sessions start November 6.</p>
						<div class="its-free">
							<div class="btn-wrapper">
								<a href="http://www.penpalnews.com/sign-up-international/" class="btn">Sign Up</a>
							</div>
						</div>
					</div>
				</div>
			</section><!-- #international -->

			<section id="why-teachers-like-us">
				<div class="wrapper">
					<h2>Why Teachers Like Us</h2>
					<ul>
						<li>
							<img src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/teacher_icon_1_x2.png" alt="Match Icon" />
							<p>We match classes so teachers don&rsquo;t have to</p>
						</li>
						<li>
							<img src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/teacher_icon_2_x2.png" alt="Step-by-step Icon" />
							<p>Our step-by-step penpal program keeps students engaged</p>
						</li>
						<li>
							<img src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/teacher_icon_3_x2.png" alt="Stories Icon" />
							<p>Curated news stories and assignments align with Common Core Standards</p>
						</li>
						<li>
							<img src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/teacher_icon_4_x2.png" alt="Folder Icon" />
							<p>Class management tools make teacher oversight easy</p>
						</li>
					</ul>
					<div class="quote-container">
						<img class="subject" src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/teacher_1_x2.png" alt="Photo of Scott Tuffiash" />
						<div>
							<blockquote><span class="open-quote">&ldquo;</span>I&rsquo;ve long hoped for a program to engage my students beyond the world they know. PenPal News is the perfect fit.<span class="close-quote">&rdquo;</span></blockquote>
							<p><strong>Scott Tuffiash</strong><br />
							English Teacher<br />
							Avonworth High School</p>
						</div>
					</div>
					<div class="quote-container">
						<img class="subject" src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/teacher_2_x2.png" alt="Photo of Robin Stayvas" />
						<div>
							<blockquote><span class="open-quote">&ldquo;</span>PenPal News got my students excited to read, write and learn about current events in a really special way. They loved it.<span class="close-quote">&rdquo;</span></blockquote>
							<p><strong>Robin Stayvas</strong><br />
							Global Studies Teacher<br />
							Scotch Plains High School</p>
						</div>
					</div>
					<img class="plane" src="http://www.penpalnews.com/wp-content/themes/penpalnews/images/plane_02.png" alt="Paper plane" width="110" />
				</div>
			</section><!-- #why-teachers-like-us -->
			
							
			
		</div><!-- #content -->


	</div><!-- .sticky-wrapper -->
</div><!-- #sticky-wrapper -->

@endsection
