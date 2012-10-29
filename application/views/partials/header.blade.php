<header id="header">
	<div class="wrapper">

		<h1 id="logo">
			<a href="/"><img src="<?php echo asset_url()?>images/logo.png" alt="Penpal News" title="Return to Penpal News Home" width="170" /></a>
		</h1>

		<form id="join" method="GET" action="/student/register">
			<label for="group-code">Students</label>
			<input type="text" class="text clear-value" name="group_code" id="group-code" placeholder="Enter Group Code" />
			<div class="btn-wrapper"><input type="submit" class="submit btn" value="Join" /></div>
		</form>

		<div id="login" class="is-logged-out">
            @if ( !logged_in() )
			<a href="/account/login" class="toggle">Login</a>
			@else
            <a href="/account/logout" class="toggle">Logout</a>			
			@endif
            
            <!-- <form action="#" id="login-form" method="post" class="is-hidden">
                <div class="field">
                    <label for="login-username">Username or Email</label>
                    <input type="text" class="text clear-value" name="login-username" id="login-username" value="Username or Email" />
                </div>
                <div class="field">
                    <label for="login-password">Password</label>
                    <input type="password" class="text clear-value" name="login-password" id="login-password" value="Password" />
                </div>
                <div class="field">
                    <p><a href="#">Forgot Something?</a></p>
                </div>
                <div class="field">
                    <input type="submit" class="submit" name="login" value="Login" />
                </div>
                <span class="arrow"></span>
            </form> -->
		</div><!-- #login -->

	</div><!-- .wrapper -->
</header>