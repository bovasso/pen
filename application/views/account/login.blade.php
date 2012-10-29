@layout('layouts/main')
@section('scripts')
<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $('#sign-up-tabs').tabs();
  });  
</script>
@endsection
@section('content')                    
<?php echo form_open("account/login");?>    
<?php echo $this->ci_alerts->display() ?>
<div class="wrapper">
    <!-- <h1>Login</h1>                      -->
	<div id="sign-up-tabs" class="tabs">
        <ul>
            <li><a href="#sign-up-tab-1">Login</a></li>
        </ul>
		<div id="sign-up-tab-1" class="tab">            
			<div class="tab-inner">                         
				<fieldset>
				    @if($message)
                        <?php echo validation_errors('<div class="error">', '</div>'); ?>    
                    @endif 
        		    
					<div class="left w100">
						<label for="identity">Email/Username:</label>
						<div class="field-box">   
                  	        <?php echo form_input($identity);?>						
                  	     </div>
					</div>						
					<div class="left w80">
						<label for="password">Password:</label>
						<div class="field-box">
                  	        <?php echo form_input($password);?>
                            <a href="/account/forgot_password"><small>Forgot your password?</small></a>  		      						
                  	     </div>
					</div>						
					<div class="left w100">
						<div class="field-box">
                            <input type="submit" class="submit btn" name="submit" value="Login" />                            
                  	     </div>
					</div>
				  </fieldset>      
    		 </div>
    	 </div>
     </div>
</div>  
<?php echo form_close();?>             
@endsection
