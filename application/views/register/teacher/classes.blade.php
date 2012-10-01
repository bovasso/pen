@layout('layouts/main')
@section('content')
<div class="wrapper" id="sign-up-form">
	<h1>Sign Up</h1>
	<div id="sign-up-tabs" class="tabs">
		<ul>
			<li class="sign-up-step1"><a href="#"><span>1.</span>Create Your Account<span class="tab_checkmark"></span></a></li>
			<li class="sign-up-step2"><a href="#"><span>2.Pick Your Session</span><span class="tab_checkmark"></span></a></li>
			<li class="sign-up-step3 ui-state-active"><a href="#"><span>3.</span>Add Your Class<span class="tab_checkmark"></span></a></li>
		</ul>
		<div id="sign-up-classes" class="tab">
			<div class="tab-inner">
			    <?php echo $this->formbuilder->open( NULL, FALSE, array('id' => 'sign-up-teacher-classes') ) ?>
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
									    <?php echo $this->formbuilder->radio( 'area', '', 'urban', FALSE, NULL, array('id'=>'area-char-urban')); ?>
										<label for="area-char-urban">Urban</label>
									</li>
									<li>
                                        <?php echo $this->formbuilder->radio( 'area', '', 'rural', FALSE, NULL, array('id'=>'area-char-rural')); ?>
										<label for="area-char-rural">Rural</label>
									</li>
									<li>
									    <?php echo $this->formbuilder->radio( 'area', '', 'suburban', FALSE, NULL, array('id'=>'area-char-suburban')); ?>									    
										<label for="area-char-suburban">Suburban</label>
									</li>
								</ul>
							</div>
						</div>

						<fieldset class="session-class" id="class-info">
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
							<a href="#" id="add-session-class">+&nbsp;Add Another Class</a>
							<a href="#" id="remove-session-class">–&nbsp;Remove This Class</a>
						</fieldset>

					</fieldset>
					<a class="btn-back" href="/register/index">Back</a>
					<div class="btn-wrapper">
						<!-- <a href="" class="btn" id="val-sign-up-fieldset-1">Next Step</a> -->
						<input type="submit" class="submit btn" name="submit" value="Next Step" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
