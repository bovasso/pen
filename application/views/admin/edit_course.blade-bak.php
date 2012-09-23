@layout('layouts/admin')
@section('styles')
<link rel="stylesheet" href="/public/admin/css/uniform.css" />
<link rel="stylesheet" href="/public/admin/css/chosen.css" />
<style type="text/css" media="screen">
    @if ( $sub_menu != 'Find' ) 
    .fg-toolbar{
        display:none;
    }
    @endif
</style>		
@foreach ($css_files as $css)
<link rel="stylesheet" href="{{$css}}"/>
@endforeach
@endsection
@section('scripts')
@foreach ($js_files as $js)
<script src="{{$js}}"></script>
<script src="/public/admin/js/jquery.peity.min.js"></script>
<script src="/public/admin/js/unicorn.js"></script>
<script src="/public/admin/js/jquery.uniform.js"></script>
<script src="/public/admin/js/chosen.jquery.min.js"></script>
@endforeach
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
<div class="container-fluid">
	<div class="row-fluid">
		<div class="widget-box">
			<ul class="nav nav-tabs">
              <li @if ( $sub_menu == 'View' ) class="active" @endif><a href="/admin/courses/edit/{{$id}}">View</a></li>
              <li @if ( $sub_menu == 'Assignments' ) class="active" @endif><a href="/admin/assignments/assign/{{$id}}">Assignments</a></li>
              <li @if ( $sub_menu == 'PenPals' ) class="active" @endif><a href="/admin/students/penpals/{{$id}}">PenPals</a></li>              
              <li @if ( $sub_menu == 'Classes' ) class="active" @endif><a href="/admin/classes/assign/{{$id}}">Classes</a></li>
              <li @if ( $sub_menu == 'Find' ) class="active" @endif><a href="/admin/classes/assign/{{$id}}?view=all">Find a Class</a></li>              
            </ul>
			<div class="widget-content nopadding">
                {{$output}}
			</div>
		</div>
	</div>
</div>
@endsection