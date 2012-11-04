@layout('layouts/main')
@section('content')

<div class="wrapper" id="profile">
	<h1>{{$user->first_name}}&nbsp;{{$user->last_name}}</h1>
	<div class="profile_container">
		<div class="left w50">
			<div class="profile-box w100">
				<h3>Info</h3>
				<div id="profile-image" class="left w40">
					<a href="#" class="avatar a144">
						<span class="frame">&nbsp;</span> 
						<img src="{{$user->avatar}}" class="" alt="{{$user->first_name}}" title="{{$user->first_name}}" />
					</a>
				</div>
				<div class="right w60">
					<ul style="font-size:14px">
						<li>
							<label>School:</label>
							<p>{{$user->school->name}}</p>
						</li>
						<li>
							<label>Class:</label>
							<p>{{$user->classroom->name}}</p>
						</li>
					</ul>
				</div>
			</div> <!-- end Profile Avatar -->

		</div><!-- end Left Column-->

		<div class="right w50">
			<div class="profile-box w100">
				<h3>About</h3>
				<p>{{$user->about_me}}</p>
			</div>

		</div><!-- end Right Column-->

	</div>
	<!-- end Main Container -->
</div>
@endsection