@layout('layouts/main')
@section('scripts')
<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $('#sign-up-tabs').tabs();
  });  
</script>
@endsection
@section('content')                    
<?php echo form_open("account/edit_name");?>    
<?php echo $this->ci_alerts->display() ?>
<div class="wrapper">
    <!-- <h1>Login</h1>                      -->
	<div id="sign-up-tabs" class="tabs">
        <ul>
            <li><a href="#sign-up-tab-1">Change Name</a></li>
        </ul>
		<div id="sign-up-tab-1" class="tab">            
			<div class="tab-inner">                         
				<fieldset>        		    
					<div class="left w40">
						<label class="question" for="first-name">First Name</label>
						<div class="field-box">
                            <?php echo $this->formbuilder->text( 'first_name', '', '', array('class'=>'text clear-value')) ?>
						</div>
					</div>
					<div class="left w40">
						<label class="question" for="last-name">Last Name</label>
						<div class="field-box">
                            <?php echo $this->formbuilder->text( 'last_name', '', '', array('class'=>'text clear-value')) ?>
						</div>
					</div>

					<div class="left w100">
						<div class="field-box">
                            <input type="submit" class="submit btn" name="submit" value="Change" />                            
                  	     </div>
					</div>
				  </fieldset>      
    		 </div>
    	 </div>
     </div>
</div>  
<?php echo form_close();?>             
@endsection
                  


