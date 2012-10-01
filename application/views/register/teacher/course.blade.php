@layout('layouts/main')
@section('scripts')
    <script type="text/javascript" src="/public/js/jquery-dynamic-form.js" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
        	$('#sign-up-tabs').tabs();
    </script>
@endsection
@section('content')
<div class="wrapper" id="sign-up-form">
	<h1>Sign Up</h1>
	<div id="sign-up-tabs" class="tabs">
		<ul>
			<li class="sign-up-step1"><a href="#"><span>1.</span>Create Your Account<span class="tab_checkmark"></span></a></li>
			<li class="sign-up-step2"><a href="#"><span>2.Pick Your Session</span><span class="tab_checkmark"></span></a></li>
			<li class="sign-up-step3 ui-state-active"><a href="#"><span>3.</span>Add Your Class<span class="tab_checkmark"></span></a></li>
		</ul>
		<div id="sign-up-tabs-1" class="tab">
			<div class="tab-inner">
			    <?php echo $this->formbuilder->open(NULL, FALSE, array('id' => 'sign-up-teacher-tab-1') ) ?>			    
					<fieldset>
						<div>
						    <?php echo validation_errors(); ?>                            
							<legend>When would you like your students to Participate?</legend>
							<ul>
                                @foreach( $courses as $course )
									<li>
										<input class="radio" type="radio" name="course_id" @if ($course_id == $course->id) checked @endif value="{{$course->id}}" id="session_{{$course->id}}" />
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