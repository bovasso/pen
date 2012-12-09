@layout('layouts/main')
@section('content')
	
	<div id="dashboard_progress" class="wrapper">
	    <div id="dashboard_left" class="left w30">
			@include('dashboard/teacher/dashboard_left')
		</div>
		<div id="dashboard_right" class="right w70">
			@include('dashboard/teacher/dashboard_right')
		</div>

	</div>

@endsection

@section('scripts')
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {       	
        $("#assignment-tabs").tabs();
    });
</script>      
@endsection
