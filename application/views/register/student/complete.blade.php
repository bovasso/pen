@layout('layouts/main')
@section('content')
<div class="wrapper">
	<div>
		<h1>Thank You!</h1>
		<p>You are signed up for Penpal News</p>
		<h2>Your class: {{$student->classroom->name}}</h2>
		<h2>Your teacher: {{$student->classroom->teacher->full_name}}</h2>
		<p>Need Help?<br />
		Please contact us at <a href="mailto:support@penpalnews.com">support@penpalnews.com</a></p>
	</div>
</div>
@endsection

                             

