<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{$title}}</title>
	<meta charset="${_response_encoding}">
	<meta name="description" content="">
	<link rel="shortcut icon" type="image/png" href="favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<link type="text/css" rel="stylesheet" href="<?php echo asset_url()?>css/main.css" media="all">
	@yield('stylesheets')

	<!-- Boilerplate/Header JS & External HTTP Request Scripts -->
	<script type="text/javascript" src="<?php echo asset_url() ?>js/modernizr.js"></script>
	<script type="text/javascript" src="http://fast.fonts.com/jsapi/54aa4dbe-b544-446f-8b71-2ac8fa086982.js"></script>
	

</head>
<body <?php if(isset($onload)){echo "onload=$onload";}?>>
	@include('partials/header')
	<div id="sticky-wrapper">
		<div class="sticky-wrapper">
			<div id="content">
				@yield('content')
			</div>

		</div><!-- .sticky-wrapper -->
	</div><!-- #sticky-wrapper -->

	@include('partials/footer')

	<!-- jQuery & Related/Future Footer JS, to be compiled, minified/gzipped at launch -->
	<script type="text/javascript" src="<?php echo asset_url() ?>js/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="<?php echo asset_url() ?>js/jquery-ui-1.8.23.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo asset_url() ?>js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo asset_url() ?>js/jquery.customselect.js"></script>
	<script type="text/javascript" src="<?php echo asset_url() ?>js/main.js"></script>

	@yield('scripts')


</body>
</html>
