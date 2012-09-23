@layout('layouts/main')

@section('content')
	
	<div id="dashboard" class="wrapper">

		<div id="dashboard_left" class="left w30">
			@include('dashboard/dashboard_left')
		</div>

		<div id="dashboard_right" class="right w70">
			@include('dashboard/dashboard_right')
		</div>

	</div>

@endsection
