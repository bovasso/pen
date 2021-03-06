<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{$title}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="shortcut icon" type="image/png" href="<?php echo asset_url()?>favicon.ico">
    <link type="text/css" rel="stylesheet" href="<?php echo asset_url()?>css/main.css" media="all">
    <link type="text/css" rel="stylesheet" href="/public/js/humane/themes/original.css" media="all">	    
	@yield('stylesheets')
	<!-- Boilerplate/Header JS & External HTTP Request Scripts -->
	<script type="text/javascript" src="<?php echo asset_url() ?>js/modernizr.js"></script>
	<script type="text/javascript" src="http://fast.fonts.com/jsapi/54aa4dbe-b544-446f-8b71-2ac8fa086982.js"></script>
	
</head>
<body <?php if(isset($onload)){echo "onload=$onload";}?>>
	@include('partials/header')
	<div id="sticky-wrapper">
		<div class="sticky-wrapper">   
		    <?php echo $this->ci_alerts->display() ?>            
			<div id="content">
				@yield('content')
			</div>

		</div><!-- .sticky-wrapper -->
	</div><!-- #sticky-wrapper -->

	@include('partials/footer')

	<!-- jQuery & Related/Future Footer JS, to be compiled, minified/gzipped at launch -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>	
	<script type="text/javascript" src="<?php echo asset_url() ?>js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo asset_url() ?>js/jquery.customselect.js"></script>
	@yield('scripts')
    <script type="text/javascript" src="/public/js/humane/humane.min.js"></script>
</body>
</html>
