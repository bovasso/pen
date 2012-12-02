s@layout('layouts/admin')
@section('styles')
<link rel="stylesheet" href="/public/admin/css/uniform.css" />
<link rel="stylesheet" href="/public/admin/css/chosen.css" />
<style type="text/css" media="screen">
    @if ( $sub_menu != 'Find' ) 
    .fg-toolbar{
        display:none;
    }
    @endif
    .table th, .table td {
        text-align: center;
        vertical-align:middle;
    }
    .table .info {
        background-color: #BAEEED;
    }

    #view_students_modal {
        width:80%;
        margin: -20% 0 0 -40%;        
    }
</style>		
@foreach ($css_files as $css)
<link rel="stylesheet" href="{{$css}}"/>
@endforeach
@endsection
@section('scripts')
@foreach ($js_files as $js)
<script src="{{$js}}"></script>
@endforeach
<script src="/public/admin/js/jquery.peity.min.js"></script>
<script src="/public/admin/js/unicorn.js"></script>
<script src="/public/admin/js/jquery.uniform.js"></script>
<script src="/public/admin/js/chosen.jquery.min.js"></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {            
        var class_id;
        
        $('.view_students_button').on('click', function(event){
            event.preventDefault();            
            $.get('/admin/students_and_penpals/' + $(this).data('classroom'), function(data) {
                $("#penpals_list").html(data);
                $("#view_students_modal").modal('show');
            });            
        });
                
        $('.assign_class').on('click', function(event){
            event.preventDefault();
            class_id =  $(this).data('classroom');
            $('#selected_class').data('selected_class_id', class_id );
            $('#class_row_' + class_id).hide();
            $('#available_classes').modal('show');
        });
        
        $('.show_hide_partner').on('click', function(event) {
           event.preventDefault();
           var row = $(this).data('row');
           $(row).slideToggle('slow');
        });
        
        $('.close_button').on('click', function(event){
           event.preventDefault();
           $('.modal').modal('hide');
        });

        $('.partner_with_class').on('click', function(event){
           event.preventDefault();                  
           window.location = $(this).attr("href") + '/' + class_id;
        });
    
    

    });
</script>
@endsection
@section('content-header')
<div id="content-header">
	<h1>Course Schedule</h1>
</div>
<div id="breadcrumb">
 <?php echo set_breadcrumb(); ?>
</div>
@endsection
@section('content')
<div id="available_classes" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Classes</h3>
  </div>
  <div class="modal-body">
      <table class="table table-bordered">
          <thead>
          <tr>
              <th>School</th>
              <th>Name</th>
              <th>State</th>                            
              <th>Size</th>
              <th>Seats Available</th>              
              <th>Action</th>                            
          </tr>
          </thead>
          <tbody>
              @foreach ($classrooms as $class)
                  @if ($class->seats_available > 0 )
                  <tr id="class_row_{{$class->id}}"><td>{{$class->school->name}}</td><td>{{$class->name}}</td><td>{{$class->school->state}}</td><td>{{$class->class_size}}</td><td>{{$class->seats_available}}</td><td><a href="/admin/assign_partnership_with_class/{{$course->id}}/{{$class->id}}" class="btn btn-info partner_with_class">Yes</a></td></tr>
                  @endif
              @endforeach
          </tbody>
      </table>      
  </div>
  <div class="modal-footer">
    <a href="#" id="close_button" class="btn close_button class">Close</a>
  </div>
</div>
<div id="view_students_modal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Penpals</h3>
  </div>
  <div class="modal-body">
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
          <tbody id="penpals_list">
          </tbody>
      </table>      
  </div>
  <div class="modal-footer">
    <a href="#" id="close_button" class="btn close_button class">Close</a>
  </div>
</div
<div class="container-fluid">
	<div class="row-fluid">
		<div class="widget-box">
			<ul class="nav nav-tabs">
              <li @if ( $sub_menu == 'View' ) class="active" @endif><a href="/admin/courses/edit/{{$id}}">View</a></li>
              <li @if ( $sub_menu == 'Assignments' ) class="active" @endif><a href="/admin/assignments/assign/{{$id}}">Assignments</a></li>
              <li @if ( $sub_menu == 'Classes' ) class="active" @endif><a href="/admin/classes/assign/{{$id}}">Classes</a></li>              
              <li @if ( $sub_menu == 'Find' ) class="active" @endif><a href="/admin/classes/assign/{{$id}}?view=all">Find a Class</a></li>              
            </ul>
			<div class="widget-content nopadding">
			    @if ( $sub_menu == 'Classes' )
	            <div style="margin-left: 20px" class="row-fluid">
                <h4>Classes Partnered</h4>
                <br/>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Seats Left</th>
                        <th>Class</th>
                        <th>School</th>
                        <th>State</th>                        
                        <th>Size</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @if( $course->has_no_partnered_classes )<tbody><tr><td colspan="6">None</td></tr></tbody>@endif
                    
                    @foreach ($classrooms as $key => $classroom)
                        @if( $classroom->partnerships )                                       
                        <tbody>                        
                            <tr rowspan="2">
                                <td>{{$classroom->seats_available}}</td><td>{{$classroom->school->name}}</td><td>{{$classroom->name}}</td>
                                <td>{{$classroom->school->state}}</td><td>{{$classroom->class_size}}</td><td><a href="#" data-row="#row_{{$key}}" class="show_hide_partner btn">View Partners</a>
                                    &nbsp;<a href="#" data-classroom="{{$classroom->id}}" class="view_students_button btn">View Students</a>
                                </td>
                            </tr>
                        </tbody>                                                                                                                                
                        <tbody class="hide" id="row_{{$key}}"> 
                            @foreach ( $classroom->partnerships as $key => $partner )                   
                            <tr>
                                <td><i class="icon-arrow-right"></i></td><td>{{$partner->classroom->school->name}}</td><td>{{$partner->classroom->name}}</td><td>{{$partner->classroom->school->state}}</td><td>{{$partner->classroom->class_size}}</td><td><a href="/admin/remove_partnership_with_class/{{$partner->course_id}}/{{$partner->parent_classroom->id}}/{{$partner->classroom->id}}" class="btn">Undo</a></td>
                            </tr>
                            @endforeach
                        </tbody>  
                        @endif                              
                    @endforeach
                </table>
                <hr/>
                <h4>Available Classes <small><em> – classes assigned to course that are not yet partnered</em></small></h4>
                <br/>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Class</th>
                        <th>School</th>
                        <th>State</th>                        
                        <th>Size</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>                    
                    @if ( $course->has_available_classrooms )
                        @foreach ($classrooms as $key => $classroom)
                            @if( !$classroom->partnerships )                                       
                                <tr>
                                    <td>&nbsp;</td><td>{{$classroom->school->name}}</td><td>{{$classroom->name}}</td><td>{{$classroom->school->state}}</td><td>{{$classroom->class_size}}</td><td><a href="#" data-classroom="{{$classroom->id}}" class="assign_class btn">Partner</a>&nbsp;<a href="/admin/remove_class_from_course/{{$classroom->course_id}}/{{$classroom->id}}" class="btn">Remove</a></td>
                                </tr>                          
                            @endif  
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No Available Classes</td>
                        </tr>                                              
                    @endif
                    </tbody>                                                                                                                                                    
                </table>
                </div>
			    @endif
			    
			    @if ( $sub_menu != 'Classes' )
                    {{$output}}
    			@endif
			</div>
		</div>
	</div>
</div>
@endsection