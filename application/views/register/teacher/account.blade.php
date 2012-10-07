@layout('layouts/main')
@section('content')
<div class="wrapper" id="sign-up-form">
	<h1>Sign Up</h1>
	<div id="sign-up-tabs" class="tabs">
		<ul>
			<li class="sign-up-step1 ui-state-active"><a href="#"><span>1.</span>Create Your Account<span class="tab_checkmark"></span></a></li>
			<li class="sign-up-step2"><a href="#"><span>2.Add Your Class</span><span class="tab_checkmark"></span></a></li>
			<li class="sign-up-step3"><a href="#"><span>3.</span>Pick Your Session<span class="tab_checkmark"></span></a></li>
		</ul>
    <div id="sign-up-tabs-3" class="tab">
    	<div class="tab-inner">			    
    	        <?php echo $this->formbuilder->open( NULL, array('id'=>'sign-up-teacher-tab-3')) ?>    	            
        			<fieldset>
        			    <div class="left w50">
							<label class="question" for="school-name">What is the name of your school?</label>
							<div class="field-box">
                                <?php echo $this->formbuilder->text( 'school', '' ) ?>
							</div>
						</div>
						<div class="left w50">
							<label class="question" for="state">In what state is it located?</label>
							<div class="field-box">
                                    <?php echo $this->formbuilder->drop_down( 'state', '', state_array() )  ?>
							</div>
						</div>
						<div class="clear">
							<legend class="question">How would you characterize the area where you teach?</legend>
							<div class="field-box">
								<ul class="radio-inline">
									<li>
									    <?php echo $this->formbuilder->radio( 'area', '', 'u', FALSE, NULL, array('id'=>'area-char-urban')); ?>
										<label for="area-char-urban">Urban</label>
									</li>
									<li>
                                        <?php echo $this->formbuilder->radio( 'area', '', 'r', FALSE, NULL, array('id'=>'area-char-rural')); ?>
										<label for="area-char-rural">Rural</label>
									</li>
									<li>
									    <?php echo $this->formbuilder->radio( 'area', '', 's', FALSE, NULL, array('id'=>'area-char-suburban')); ?>									    
										<label for="area-char-suburban">Suburban</label>
									</li>
								</ul>
							</div>
						</div>
        				<div class="left w20">
        					<label class="question" for="suffix">Suffix</label>
        					<div class="field-box">
                                <?php echo $this->formbuilder->drop_down( 'suffix', '', array('mr'=>'Mr.', 'ms'=>'Ms.', 'mrs'=>'Mrs.') )  ?>
        					</div>
        				</div>
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
        				<div class="left w40">
        					<label class="question" for="email">Email</label>
        					<div class="field-box">
                                <?php echo $this->formbuilder->text( 'email', '', '', array('class'=>'text clear-value', 'id'=>'email')) ?>							    
        					</div>
        				</div>
        				<div class="left w40">
        					<label class="question" for="email-confirm">Confirm email</label>
        					<div class="field-box">
                                <?php echo $this->formbuilder->text( 'confirm_email', '', '', array('class'=>'text clear-value')) ?>
        					</div>
        				</div>
        				<div class="left w100">
        					<label class="question" for="phone-number">Phone Number</label>
        					<div class="field-box">
                                <?php echo $this->formbuilder->text( 'phone', '', '', array('class'=>'text clear-value', 'id'=>'phone')) ?>    							
        					</div>
        				</div>
        				<div class="left w100">
        					<label class="question" for="username">Username</label>
        					<div class="field-box">
                                <?php echo $this->formbuilder->text( 'username', '', '', array('class'=>'text clear-value')) ?>							    
        					</div>
        				</div>
        				<div class="left w60">
        					<label class="question" for="password">Create a Password&nbsp;<span>(8 or more characters w/letters &amp; numbers)</span></label>
        					<div class="field-box">
                                <?php echo $this->formbuilder->text( 'password', '', '', array('class'=>'text clear-value', 'id'=>'password')) ?>							    
        					</div>
        				</div>
        				<div class="left w40">
        					<label class="question" for="password-confirm">Confirm Password</label>
        					<div class="field-box">
                                <?php echo $this->formbuilder->text( 'confirm_password', '', '', array('class'=>'text clear-value')) ?>							                                    
        					</div>
        				</div>
        			</fieldset>
                    <!-- <a class="btn-back" href="#" onClick="jQuery('#sign-up-tabs').tabs('select',1); return false;">Back</a> -->
        			<div class="btn-wrapper">
        				<input type="submit" class="submit btn" name="submit" value="Create Account" />
        			</div>
    		    </form>
    	    </div>
        </div>
	</div>
</div>
@endsection