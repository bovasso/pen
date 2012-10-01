@layout('layouts/main')
@section('content')
<div class="wrapper" id="sign-up-form">
	<h1>Sign Up</h1>
	<div id="sign-up-tabs" class="tabs">
		<ul>
			<li class="sign-up-tab-1"><a href="#sign-up-tabs-1"><span>1.</span>select your session<span class="tab_checkmark"></span></a></li>
			<li class="sign-up-tab-2"><a href="#sign-up-tabs-2"><span>2.</span>enter class info<span class="tab_checkmark"></span></a></li>
			<li class="sign-up-tab-3"><a href="#sign-up-tabs-3"><span>3.</span>create your account<span class="tab_checkmark"></span></a></li>
		</ul>
		<div id="sign-up-tabs-1" class="tab">
			<div class="tab-inner">
				<form action="/signup/create" method="post" id="sign-up-teacher-tab-1">
					<fieldset>
						<div>
							<legend>When would you like your students to Participate?</legend>
							<ul>
                                @foreach( $courses as $course )
									<li>
										<input class="radio" type="radio" name="sessionId" value="{{$course->id}}" id="session_{{$course->id}}" />
										<label for="session_{{$course->id}}">{{$course->start_date}}&nbsp;&nbsp;-&nbsp;&nbsp;{{$course->end_date}}</label>
									</li>
								@endforeach
							</ul>
						</div>
					</fieldset>
					<div class="btn-wrapper">
						<!-- <a href="" class="btn" id="val-sign-up-fieldset-1">Next Step</a> -->
						<input type="submit" class="submit btn" name="submit" value="Next Step" />
					</div>
				</form>
			</div>
		</div>
		<div id="sign-up-tabs-2" class="tab">
			<div class="tab-inner">
				<form action="/signup/create" method="post" id="sign-up-teacher-tab-2">
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
									    <?php echo $this->formbuilder->radio( 'area', '', 'urban', TRUE); ?>
										<label for="area-char-urban">Urban</label>
									</li>
									<li>
                                        <?php echo $this->formbuilder->radio( 'area', '', 'rural', FALSE); ?>
										<label for="area-char-rural">Rural</label>
									</li>
									<li>
									    <?php echo $this->formbuilder->radio( 'area', '', 'suburban', FALSE); ?>									    
										<label for="area-char-suburban">Suburban</label>
									</li>
								</ul>
							</div>
						</div>

						<fieldset class="session-class" id="session-class-1">
							<div class="w100">
								<label class="question" for="class-name">What is your class called?&nbsp;<span>(ex. Social Studies Period 3)</span></label>
								<div class="field-box">
								    <?php echo $this->formbuilder->text( 'name', '' ) ?>
								</div>
							</div>
							<div class="clear">
								<label class="question">What is the age range of the students?</label>
								<div class="field-box">
								    <?php echo $this->formbuilder->text( 'age_range_start', '', '', array('size'=>2, 'maxlength'=>2, 'class'=>'text clear-value inline-input') ) ?>
									<label for="age-range-low">&nbsp;years old&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;</label>
								    <?php echo $this->formbuilder->text( 'age_range_end', '', '', array('size'=>2, 'maxlength'=>2, 'class'=>'text clear-value inline-input') ) ?>
									<label for="age-range-high">&nbsp;years old</label>
								</div>
							</div>
							<div class="clear">
								<label class="question" for="student-amt">How many students are there in this class?&nbsp;<span>(If you don&rsquo;t know yet, please estimate)</span></label>
								<div class="field-box">
                                    <?php echo $this->formbuilder->text( 'class_size', '', '', array('size'=>2, 'maxlength'=>2, 'class'=>'text clear-value inline-input') ) ?>
								</div>
							</div>
							<a href="#" class="add-session-class">+&nbsp;Add Another Class</a>
							<a href="#" class="remove-session-class">–&nbsp;Remove This Class</a>
						</fieldset>

					</fieldset>
					<a class="btn-back" href="#" onClick="jQuery('#sign-up-tabs').tabs('select',0); return false;">Back</a>
					<div class="btn-wrapper">
						<!-- <a href="" class="btn" id="val-sign-up-fieldset-1">Next Step</a> -->
						<input type="submit" class="submit btn" name="submit" value="Next Step" />
					</div>
				</form>
			</div>
		</div>
		<div id="sign-up-tabs-3" class="tab">
			<div class="tab-inner">
				<form action="/signup/create" method="post" id="sign-up-teacher-tab-3">
					<fieldset>
						<div class="left w20">
							<label class="question" for="suffix">Suffix</label>
							<div class="field-box">
                                <?php echo $this->formbuilder->drop_down( 'suffix', '', array('mr'=>'Mr.', 'ms'=>'Ms.', 'mrs'=>'Mrs.') )  ?>
							</div>
						</div>
						<div class="left w40">
							<label class="question" for="first-name">First Name</label>
							<div class="field-box">
                                <?php echo $this->formbuilder->text( 'first_name', '', '', '', array('class'=>'text clear-value')) ?>
							</div>
						</div>
						<div class="left w40">
							<label class="question" for="last-name">Last Name</label>
							<div class="field-box">
                                <?php echo $this->formbuilder->text( 'last_name', '', '', '', array('class'=>'text clear-value')) ?>
							</div>
						</div>
						<div class="left w40">
							<label class="question" for="email">Email</label>
							<div class="field-box">
                                <?php echo $this->formbuilder->text( 'email', '', '', '', array('class'=>'text clear-value')) ?>							    
							</div>
						</div>
						<div class="left w40">
							<label class="question" for="email-confirm">Confirm email</label>
							<div class="field-box">
                                <?php echo $this->formbuilder->text( 'confirm_email', '', '', '', array('class'=>'text clear-value')) ?>
							</div>
						</div>
						<div class="left w100">
							<label class="question" for="phone-number">Phone Number</label>
							<div class="field-box">
                                <?php echo $this->formbuilder->text( 'phone', '', '', '', array('class'=>'text clear-value')) ?>    							
							</div>
						</div>
						<div class="left w100">
							<label class="question" for="username">Username</label>
							<div class="field-box">
                                <?php echo $this->formbuilder->text( 'username', '', '', '', array('class'=>'text clear-value')) ?>							    
							</div>
						</div>
						<div class="left w60">
							<label class="question" for="password">Create a Password&nbsp;<span>(8 or more characters w/letters &amp; numbers)</span></label>
							<div class="field-box">
                                <?php echo $this->formbuilder->text( 'password', '', '', '', array('class'=>'text clear-value')) ?>							    
							</div>
						</div>
						<div class="left w40">
							<label class="question" for="password-confirm">Confirm Password</label>
							<div class="field-box">
                                <?php echo $this->formbuilder->text( 'confirm_password', '', '', '', array('class'=>'text clear-value')) ?>							                                    
							</div>
						</div>
					</fieldset>
					<a class="btn-back" href="#" onClick="jQuery('#sign-up-tabs').tabs('select',1); return false;">Back</a>
					<div class="btn-wrapper">
						<input type="submit" class="submit btn" name="submit" value="Create Account" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection