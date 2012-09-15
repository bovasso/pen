<header id="header">
	<div class="wrapper">

		<h1 id="logo">
			<a href="/"><img src="<?php echo asset_url()?>images/logo.png" alt="Penpal News" title="Return to Penpal News Home" width="170" /></a>
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