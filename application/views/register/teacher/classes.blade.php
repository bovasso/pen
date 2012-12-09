@layout('layouts/main')
@section('scripts')
<script type="text/javascript" src="/public/js/jquery-alerts/jquery.alerts.js" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
    $('.remove').on('click', function(event) {
        event.preventDefault();
        var url = $(this).attr('href');
        jConfirm('Are you sure?', 'Confirmation Dialog', function(r) {
            if (r) location.href = url;
        });        
    });
</script>
@endsection
@section('stylesheets')
<link href="/public/js/jquery-alerts/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen">
@endsection
@section('content')
<div class="wrapper" id="sign-up-form">
	<h1>Sign Up</h1>
	<div id="sign-up-tabs" class="tabs">
		<ul>
			<li class="sign-up-step1"><a href="#"><span>1.</span>Create Your Account<span class="tab_checkmark"></span></a></li>
			<li class="sign-up-step2 ui-state-active"><a href="#"><span>2.Add Your Class</span><span class="tab_checkmark"></span></a></li>
			<li class="sign-up-step3"><a href="#"><span>3.</span>Pick Your Session<span class="tab_checkmark"></span></a></li>
		</ul>
		<div id="sign-up-classes" class="tab">		    
			<div class="tab-inner">                  
			    @if($classes)
			    <div>
			        <p style="text-align: center"><b>Classes Registered</b></p>
    		        <ol style="margin-left: 50px">
    			    @foreach ($classes as $class )
                        <li>&bullet;&nbsp;{{$class->name}} &nbsp; <a href="/teacher/register/classes/{{$class->id}}"> edit </a> | <a href="/teacher/register/classes/{{$class->id}}/remove" class="remove">remove</a></li>
                    @endforeach                
                    </ol>			    
                </div>      
                @endif
                <br/>
			    <?php echo $this->formbuilder->open( NULL, FALSE, array('id' => 'sign-up-class-form') ) ?>
			        @if( isset($class) )
			        <?php echo $this->formbuilder->hidden( 'id', $class->id ) ?>
			        @endif
					<fieldset>
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
							<input type="submit" class="submit" name="submit" value="+&nbsp;Save & Add Another Class" />                            
						</fieldset>

					</fieldset>
					<div class="btn-wrapper">
                        <!-- <a href="/register/course" class="submit btn" id="val-sign-up-fieldset-1">Next Step</a> -->
                        <input type="submit" class="submit btn" name="submit" value="Next Step" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
