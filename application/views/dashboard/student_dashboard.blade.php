@section('stylesheets')
@endsection

@layout('layouts/full')

@section('content')

		@include('dashboard/_student_dashboard_thisweek')

@endsection

@section('scripts')
	<script>
		$(function() {
			$( "#progressbar" ).progressbar({
				value: 37
			});
		});
	</script>
@endsection