	<h1>{{$user->first_name}}&nbsp;{{$user->last_name}}</h1>
	<div class="profile_container">

		<div class="left w40">

			<div class="profile-box w100">
				<h3>PROFILE PICTURE</h3>
				<div id="profile-image" class="left w40">
					<a href="#" class="avatar a144">
						<span class="frame">&nbsp;</span>
						<img src="${account.avatar}" class="" alt="${account.getFullName()}" title="${account.getFullName()}" />
					</a>
				</div>
				<div class="right w60">
					<div class="btn-wrapper"><input type="submit" class="btn" value="Save Avatar" /></div>
					<p class="help">Select and Avatar Below</p>
				</div>
				<div id="avatar_carousel" class="w100">
					<div class="carousel-btn"><a class="btn-prev ir">Prev</a></div>
					<ul>
						<li>
							<a href="#" class="avatar a64">
								<span class="frame">&nbsp;</span>
								<img src="@{'/public/images/default_avatars/pink144.jpg'}" class=""/>
							</a>
						</li>
						<li>
							<a href="#" class="avatar a64">
								<span class="frame">&nbsp;</span>
								<img src="@{'/public/images/default_avatars/lime144.jpg'}" class=""/>
							</a>
						</li>
						<li>
							<a href="#" class="avatar a64">
								<span class="frame">&nbsp;</span>
								<img src="@{'/public/images/default_avatars/lav144.jpg'}" class=""/>
							</a>
						</li>
						<li>
							<a href="#" class="avatar a64">
								<span class="frame">&nbsp;</span>
								<img src="@{'/public/images/default_avatars/aqua144.jpg'}" class=""/>
							</a>
						</li>
					</ul>
					<div class="carousel-btn"><a class="btn-next ir">Next</a></div>
				</div>
			</div> <!-- end Profile Avatar -->

			<div class="profile-box w100">
				<h3>Join A New Session</h3>
				<form id="join_profile">
					<input type="text" class="text clear-value left" name="groupCode" id="group-code" placeholder="Enter Group Code" />
					<div class="btn-wrapper left"><input type="submit" class="submit btn" value="Join" /></div>
                 </form>
			</div><!-- end Join Session -->

		</div><!-- end Left Column-->

		<div class="right w50">
			<div class="profile-box w100">
				<h3>About</h3>
				
				<form id="join_profile">
					<textarea class="w100" rows="10" value="{{$user->about}}">{{$user->about}}</textarea>
					<div class="btn-wrapper right"><input type="submit" class="btn" value="Join" /></div>
                </form>
			</div>
			<div class="profile-box w100">
				<h3>Your Info</h3>
				<div class="left w50">
					<ul>
						<li>
							<label>Name:</label>
							<p>{{$user->first_name}}&nbsp;{{$user->last_name}}<br/><a href="#" class="profile-edit">Edit</a></p>
						</li>
						<li>
							<label>Username:</label>
							<p>{{$user->username}}<br/><a href="#" class="profile-edit">Change Password</a></p>
						</li>
					</ul>
				
				</div>
				<div class="right w50">
					<ul>
						<li><label>School:</label>&nbsp;{{$user->school->name}}</li>
						<li><label>Class:</label>&nbsp;{{$user->school->name}}</li>
					</ul>
				</div>
			</div>

		</div><!-- end Right Column-->

	</div>
	<!-- end Main Container -->