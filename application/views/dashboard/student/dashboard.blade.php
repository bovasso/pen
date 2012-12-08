@section('stylesheets')
@endsection

@layout('layouts/full')

@section('content')
<?php echo $this->ci_alerts->display() ?>            

<div class="wrapper">

	<div id="student_dashboard_left" class="left">
		@include('dashboard/student/_dashboard_left')
	</div><!-- end Student Dashboard Left -->

	<div id="student_dashboard_right" class="right">
		@include('dashboard/student/_dashboard_right')
	</div>

</div

@endsection

@section('scripts')
	<script>
		$(function() {
			$( "#progressbar" ).progressbar({
				value: <?php echo display_progress_bar($this->student->progress) ?>
			});
		});
	</script>
@endsection