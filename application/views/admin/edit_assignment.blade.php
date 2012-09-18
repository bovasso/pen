@layout('layouts/admin')
@section('styles')
<link rel="stylesheet" href="/public/admin/css/uniform.css" />
<link rel="stylesheet" href="/public/admin/css/chosen.css" />		
@foreach ($css_files as $css)
<link rel="stylesheet" href="{{$css}}"/>
@endforeach
@endsection
@section('scripts')
<script src="/public/admin/js/jquery.peity.min.js"></script>
<script src="/public/admin/js/unicorn.js"></script>
<script src="/public/admin/js/jquery.uniform.js"></script>
<script src="/public/admin/js/chosen.jquery.min.js"></script>
@foreach ($js_files as $js)
<script src="{{$js}}"></script>
@endforeach
@endsection
@section('content-header')
<div id="content-header">
	<h1>Assignment</h1>
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
              <li @if ( $action == 'edit' ) class="active" @endif><a href="/admin/assignments/edit/{{$id}}">View</a></li>
              <li @if ( $title == 'Articles' ) class="active" @endif><a href="/admin/articles/assign/{{$id}}">Articles</a></li>
              <li @if ( $title == 'Questions' ) class="active" @endif><a href="/admin/questions/assign/{{$id}}">Questions</a></li>
            </ul>
			<div class="widget-content nopadding">
                {{$output}}
			</div>
		</div>
	</div>
</div>

@endsection