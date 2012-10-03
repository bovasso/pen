@layout('layouts/main')
@section('content')
<div class="wrapper">
	<div>
		<h1>Thank You</h1>
		<p>We sent you a confirmation email with instructions on how to get started</p>
		<h2>Please check your email:</h2>
		<h3>{{$teacher->email}}</h3>
		<p>Didn’t receive your confirmation email?<br />
		Please contact us at <a href="mailto:support@penpalnews.com">support@penpalnews.com</a></p>
	</div>
</div>
@endsection