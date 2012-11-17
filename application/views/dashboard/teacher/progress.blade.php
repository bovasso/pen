@layout('layouts/main')

@section('content')
	
	<div id="dashboard_progress" class="wrapper">
		<div class="student_progress_header">
			<h1 class="left w20">Student Progress</h1>
			<form action="#" method="get" id="student_progress_filters">
			    <div class="field-box">
				    <select name="class" id="class">
				        @foreach($classrooms as $classroom)
			            <option value="class_1">{{$classroom->name}}</option>
			            @endforeach
					</select>
				</div>
				<div class="field-box">      
				    <select name="week" id="week">
			            @foreach($assignments as $assignment)
			            <option value="{{$assignment->week}}">Week {{$assignment->week}}</option>
			            @endforeach
			        </select>			        
			    </div>
			    <div id="table_key" class="left">
			    	<div class=""></div>
			    </div>
			</form>
		</div>                                       
		@if($action == 'answers')
		    @include('dashboard/teacher/_progress_answers')
		@else         
		    @include('dashboard/teacher/_progress_comments')
		@endif
	</div>

@endsection

@section('scripts')                
<script type="text/javascript" src="/public/js/jquery.jeditable.mini.js" charset="utf-8"></script>
<script type="text/javascript">    
$(document).ready(function() {
    $('.field-box select').customSelect({
    	fixedWidth: true
    });
    $('.edit_area').editable('/teacher/dashboard/save_edit', { 
           type      : 'textarea',
           cancel    : 'Cancel',
           submit    : 'Save',
           indicator : 'Saving...',
           tooltip   : 'Click to edit...'
    });  
    
    $('.edit_answer').on('click', function(event){
        event.preventDefault();
        id = $(this).data('answer');
        $('#answer_' + id).trigger('click');
    });
});
</script>
@endsection