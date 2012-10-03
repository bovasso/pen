@layout('layouts/main')
@section('content')
<div class="wrapper" id="sign-up-form">
	<h1>Sign Up</h1>
	<div id="sign-up-tabs" class="tabs">
		<ul>
			<li class="sign-up-step1"><a href="#"><span>1.</span>Create Your Account<span class="tab_checkmark"></span></a></li>
			<li class="sign-up-step2"><a href="#"><span>2.Add Your Class</span><span class="tab_checkmark"></span></a></li>
			<li class="sign-up-step3 ui-state-active"><a href="#"><span>3.</span>Pick Your Session<span class="tab_checkmark"></span></a></li>
		</ul>
		<div id="sign-up-tabs-1" class="tab">
			<div class="tab-inner">
			    <?php echo $this->formbuilder->open(NULL, FALSE, array('id' => 'sign-up-teacher-tab-1') ) ?>			    
					<fieldset>
						<div>
							<legend>When would you like your students to Participate?</legend>
							<ul>
                                @foreach( $courses as $course )
									<li>
									    <?php echo $this->formbuilder->radio( 'course_id', '', $course->id, FALSE, NULL, array('id'=>'session_' . $course->id) ); ?>
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
	</div>
</div>
@endsection