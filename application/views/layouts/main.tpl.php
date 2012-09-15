<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $this->config->item('site_title'); if(isset($title))echo " ".$this->config->item('site_title_delimiter')." ".$title;?></title>
	<meta charset="${_response_encoding}">
	<meta name="description" content="">
	<link rel="shortcut icon" type="image/png" href="/public/images/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- CSS -->
	<link type="text/css" rel="stylesheet" href="<?php echo asset_url()?>css/main.css" media="all">
	<link href="<?php echo asset_url() ?>css/home.css" rel="stylesheet" type="text/css" />

    
    <?php 
    	if(isset($head) && is_array($head)) {
    		foreach ($head as $headObject) {
    			echo $headObject; 
    		}  		
    	}
    ?>

</head>
<body <?php if(isset($onload)){echo "onload=$onload";}?>>
	<div id="sticky-wrapper">
		<div class="sticky-wrapper">

			<header id="header">
				<div class="wrapper">

					<h1 id="logo">
						<a href="/"><img src="/public/images/logo.png" alt="Penpal News" title="Return to Penpal News Home" width="170" /></a>
					</h1>

					<form id="join">
						<label for="group-code">Students</label>
						<input type="text" class="text clear-value" name="groupCode" id="group-code" placeholder="Enter Group Code" />
						<div class="btn-wrapper"><input type="submit" class="submit btn" value="Join" /></div>
					</form>

					<div id="login" class="is-logged-out">
						<a href="#" class="toggle">Log In</a>
						<form action="#" method="post" class="is-hidden">
							<div class="field">
								<label for="login-username" class="hidden">Username or Email</label>
								<input type="text" class="text clear-value" name="login-username" id="login-username" value="Username or Email" />
							</div>
							<div class="field">
								<label for="login-password" class="hidden">Password</label>
								<input type="password" class="text clear-value" name="login-password" id="login-password" value="Password" />
							</div>
							<div class="field">
								<p><a href="#">Forgot Something?</a></p>
							</div>
							<div class="field">
								<input type="submit" class="submit" name="login" value="Login" />
							</div>
							<span class="arrow"></span>
						</form>
					</div><!-- #login -->

				</div><!-- .wrapper -->
			</header>

			<div id="content">
				<?php echo $content;?>
			</div>

		</div><!-- .sticky-wrapper -->
	</div><!-- #sticky-wrapper -->

	<footer id="footer">
		<div class="wrapper">
			<small class="left copyright">Penpal News &copy; 2012</small>
			<nav class="right">
				<ul>
					<li><a href="">about</a></li>
					<li><a href="">blog</a></li>
					<li><a href="">jobs</a></li>
					<li><a href="">contact</a></li>
					<li><a href="">terms</a></li>
					<li><a href="">privacy</a></li>
					<li><a href="">site map</a></li>
				</ul>
			</nav>
		</div><!-- .wrapper -->
	</footer>
		<!-- Boilerplate/Header JS & External HTTP Request Scripts -->
	<script type="text/javascript" src="<?php echo asset_url() ?>js/modernizr.js"></script>
	<script type="text/javascript" src="http://fast.fonts.com/jsapi/54aa4dbe-b544-446f-8b71-2ac8fa086982.js"></script>

	<!-- jQuery & Related/Future Footer JS, to be compiled, minified/gzipped at launch -->
	<script type="text/javascript" src="<?php echo asset_url() ?>js/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="<?php echo asset_url() ?>js/jquery-ui-1.8.23.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo asset_url() ?>js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo asset_url() ?>js/jquery.customselect.js"></script>
	<script type="text/javascript" src="<?php echo asset_url() ?>js/main.js"></script>

	<script type='text/javascript'>
        <?php if (isset($js)){echo $js;}?>          
    </script>

</body>
</html>