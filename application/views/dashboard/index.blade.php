@layout('layouts/main')
@section('scripts')
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {       	
        $("#assignment-tabs").tabs();
    });
</script>
@endsection
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

@section('scripts')
<script type="text/javascript">
$('.field-box select').customSelect({
	fixedWidth: true
});
</script>
@endsection