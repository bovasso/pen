@layout('layouts/main')
@section('content')
<div class="wrapper" id="sign-up-form">
	<h1>Sign Up</h1>
	<div id="sign-up-tabs-1" class="tabs">
		<ul>
			<li class="is-selected"><a href="#">create your account</a></li>
		</ul>
		<div id="sign-up-tabs-1" class="tab">
			<div class="tab-inner">
    	        <?php echo $this->formbuilder->open( NULL, array('id'=>'sign-up-student-tab-1')) ?>    	            
                    <input type="hidden" name="groupCode" value="${groupCode}"/>
					<fieldset>
						<div class="left w100">
							<label class="question" for="first-name">Group Code</label>
							<div class="field-box">
                                <?php echo $this->formbuilder->text( 'group_code', '', '', array('class'=>'text clear-value')) ?>
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
						<div class="left w100">
							<div class="field-box">
							    <?php echo $this->formbuilder->checkbox( 'agree', '', TRUE, TRUE, array('class'=>'text clear-value', 'id'=>'terms-and-conditions')) ?>							                                    
                                <label for="terms-and-conditions">I agree to Penpal News&rsquo; <a href="terms-and-conditions">Terms &amp; Conditions</a></label>
							</div>
						</div>
					</fieldset>
					<div class="btn-wrapper">
						<input type="submit" class="submit btn" name="submit" value="Create Account" />
					</div>
                </form>
			</div>
		</div>
	</div>
</div>
@endsection