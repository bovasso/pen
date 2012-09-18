@layout('layouts/admin')
@section('styles')
<link rel="stylesheet" href="/public/admin/css/uniform.css" />
<link rel="stylesheet" href="/public/admin/css/chosen.css" />		
@foreach ($css_files as $css)
<link rel="stylesheet" href="{{$css}}"/>
@endforeach
@endsection
@section('scripts')
@foreach ($js_files as $js)
<script src="{{$js}}"></script>
@endforeach
@endsection
@section('content-header')
<div id="content-header">
	<h1>{{$title}}</h1>
</div>
<div id="breadcrumb">
 <?php echo set_breadcrumb(); ?>
</div>

@endsection
@section('content')
<div class="container-fluid">
	<div class="row-fluid">
		<div class="widget-box">
			<div class="widget-title">			
				<h5></h5>
			</div>
			<div class="widget-content nopadding">
                {{$output}}
			</div>
		</div>
	</div>
</div>

@endsection