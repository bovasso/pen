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

	<style>
	#modal{
		width:400px;
		height: 300px;
		padding: 20px;
		position: absolute;
		left: 40%;
		top:20%;
		z-index: 1000;
		background-color: #efefef;
	}
	.enabled{background-color: green;}
	</style>

	<!-- Boilerplate/Header JS & External HTTP Request Scripts -->
	<script type="text/javascript" src="<?php echo asset_url() ?>js/modernizr.js"></script>
	<script type="text/javascript" src="http://fast.fonts.com/jsapi/54aa4dbe-b544-446f-8b71-2ac8fa086982.js"></script>
	

</head>
<body <?php if(isset($onload)){echo "onload=$onload";}?>>
	@include('partials/header')
	<div id="sticky-wrapper">
		<div class="sticky-wrapper">
			<div id="content">
				<a href="#" class="opener">Open Modal</a>
				@yield('content')
			</div>

		</div><!-- .sticky-wrapper -->
	</div><!-- #sticky-wrapper -->

	@include('partials/footer')

	<div id="modal" style="display:none;">
		<p class="alert"></p>
		<input type="text" id="title" />
		<input type="submit" id="submit" value="submit">
	</div>

	<!-- jQuery & Related/Future Footer JS, to be compiled, minified/gzipped at launch -->
	<script type="text/javascript" src="<?php echo asset_url() ?>js/jquery-1.8.0.min.js"></script>

	@yield('scripts')

	<script>

		$('a.opener').click(function(){
			$('#title').val('');
			$('#modal').show();

			return false;
		});

		$('#title').blur(function(){
			
			if ( $(this).val().length == 0 ) {
				$('p.alert').text('need to fill this in');		
			} 

		});

		$('#submit').bind('click', function(e){
			e.preventDefault();
			validateTitle();
		});



		function validateTitle(){
			if ( $('#title').val().length == 0 ){
				$('p.alert').text('need to fill this in');		

			} else {
				$('p.alert').text('');
				$('#modal').hide();
			}
		}
		
	</script>

</body>
</html>
