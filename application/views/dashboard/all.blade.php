@layout('layouts/main')

@section('content')
	
	<div id="dashboard_progress" class="wrapper">
		<div class="student_progress_header">
			<h1 class="left w20">Student Progress</h1>
			<form action="#" method="get" id="student_progress_filters">
			    <div class="field-box">
				    <select name="class" id="class">
			            <option value="class_1">Class 2 xxxxxx</option>
			            <option value="class_2">Class 2 xxxxxx</option>
						<option>5</option>
					</select>
				</div>
				<div class="field-box">
			        <select name="week" id="week">
			            <option value="all">All Assignments</option>
			            <option value="week_1">Week 1</option>
			            <option value="week_2">Week 2</option>
			            <option value="week_3">Week 3</option>
			            <option value="week_4">Week 4</option>
			            <option value="week_5">Week 5</option>
			            <option value="week_6">Final Project</option>
			        </select>
			    </div>
			    <div id="table_key" class="left">
			    	<div class=""></div>
			    </div>
			</form>i
		</div>
		@include('dashboard/_student_progress_all')
	</div>

@endsection

@section('scripts')
<script type="text/javascript">
$('.field-box select').customSelect({
	fixedWidth: true
});
</script>
@endsection