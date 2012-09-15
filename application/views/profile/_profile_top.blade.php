	<h1>${account.getFullName()}</h1>
	<div class="profile_container">

		<div class="left w50">

			<div class="profile-box w100">
				<h3>Info</h3>
				<div id="profile-image" class="left w40">
					<a href="#" class="avatar a144">
						<span class="frame">&nbsp;</span>
						<img src="${account.avatar}" class="" alt="${account.getFullName()}" title="${account.getFullName()}" />
					</a>
				</div>
				<div class="right w60">
					<ul>
						#{list account.accounts}
						<li>
							<label>School:</label>
							<p>${_.course.school.name}</p>
						</li>
						<li>
							<label>Class:</label>
							<p>${_.course.name}</p>
						</li>
						#{/list}
					</ul>
				</div>
			</div> <!-- end Profile Avatar -->

		</div><!-- end Left Column-->

		<div class="right w50">
			<div class="profile-box w100">
				<h3>About</h3>
			<!-- 	<p>${account.about}</p> -->
				<p>Vestibulum id ligula porta felis euismod semper. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Nulla vitae elit libero, a pharetra augue.</p>
			</div>

		</div><!-- end Right Column-->

	</div>
	<!-- end Main Container -->