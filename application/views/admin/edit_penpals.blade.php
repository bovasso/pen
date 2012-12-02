@layout('layouts/admin')
@section('styles')
<link rel="stylesheet" href="/public/admin/css/uniform.css" />
<link rel="stylesheet" href="/public/admin/css/chosen.css" />		
@foreach ($css_files as $css)
<link rel="stylesheet" href="{{$css}}"/>
@endforeach
@endsection   
@foreach ($js_files as $js)
<script src="{{$js}}"></script>
@endforeach
@section('scripts')
<script src="/public/admin/js/jquery.peity.min.js"></script>
<script src="/public/admin/js/unicorn.js"></script>
<script src="/public/admin/js/jquery.uniform.js"></script>
<script src="/public/admin/js/chosen.jquery.min.js"></script>     
<script type="text/javascript" charset="utf-8">
    $('.penpals_dropdown_options').on('change', function(event){
        event.preventDefault();            
        var penpal_id = $(this).val();  
        var student_id = $(this).find('option:selected').data('student');        
        if (confirm("Are you sure?")) {             
            $.get('/admin/assign_student_to_penpal/' + student_id + '/' + penpal_id, function(data) {
                    window.location.reload();                    
            });                        
        };
    });
</script>
@endsection
@section('content-header')
<div id="content-header">
	<h1>Class</h1>
</div>
<div id="breadcrumb">
 <?php echo set_breadcrumb(); ?>
</div>
@endsection
@section('content')
<div class="container-fluid">    
	<div class="row-fluid">
		<div class="widget-box">
			<ul class="nav nav-tabs">
              <li @if ( $sub_menu == 'View' ) class="active" @endif><a href="/admin/classes/edit/{{$id}}">View</a></li>
              <li @if ( $sub_menu == 'Students' ) class="active" @endif><a href="/admin/users/class/{{$id}}">Students</a></li>
              <li @if ( $sub_menu == 'Penpals' ) class="active" @endif><a href="/admin/users/penpals/{{$id}}">Penpals</a></li>              
            </ul>
			<div class="widget-content nopadding">  
			    <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Class</th>
                        <th>Name</th>
                        <th>&nbsp;</th>                            
                        <th>Class</th>
                        <th>Penpal</th> 
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                               <td>{{$student->classroom->name}}</td><td><small>({{$student->gender}})</small>&nbsp;{{$student->full_name}}</td>
                               <td><i class="icon-resize-horizontal"></i></td>

                               @foreach ( $student->penpals_by_classroom as $penpal)                             
                               <td>{{$penpal->student->classroom->name}}</td>
                               <td>          
                                   <select class="penpals_dropdown_options">
                                        @foreach($available_penpals as $available_penpal)
                                            <option <?php echo ($penpal->student->id == $available_penpal->student->id)? 'selected="selected"' : '' ?> value="{{$available_penpal->student->id}}" data-student="{{$student->id}}">({{$available_penpal->student->gender}})&nbsp;{{$available_penpal->student->full_name}}</option>
                                        @endforeach
                                   </select>
                               </td>                     
                               @endforeach
                            </tr>
                        @endforeach                                                      
                    </tbody>
                </table>                      
			</div>
		</div>
	</div>
</div>

@endsection