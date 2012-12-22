<h1 class="left w50">ACTIVITY FEED</h1>

<!-- <div id="toggles" class="right w40">
    <button id="all" href="" class="toggle_left active">ALL</button>
    <button id="all" href="" class="">ASSIGNMENTS</button>
    <button id="all" href="" class="toggle_right">COMMENTS</button>
</div>-->
<!-- END #TOGGLES --> 

<div id="main_comments" class="comment-container w100">
    @if ( !$course->hasNotYetStarted )
	<div class="left avatar a70 w10">
		<div class="image-wrap" style="background-image: url(<?php echo $student->avatar ?>);"></div>
	</div><!-- end Avatar -->
	<div class="comment-form right w80">
        <?php echo $this->formbuilder->open( '/student/dashboard/save_message', array('id'=>'comment')) ?>
            <?php echo $this->formbuilder->textarea( 'comment', '', '', array('class'=>'w100')) ?>        

            @if ($penpals)
            <p id="student_selector" class="left">
                <span>Select a Student: </span>
            @foreach( $penpals as $penpal ) 
                <input type="radio" name="radiogroup" id="radio-1">
                <label for="radio-1">{{$penpal->full_name}}</label>
            @endforeach
            </p>
            @endif
			<p class="btn-wrapper right">
				<input type="submit" class="submit btn" value="SEND"/>
			</p>
		</form>
	</div><!-- end Comment Form -->
    @endif
</div><!-- end Comments -->

<div id="assignment-feed">   
    
	<ul id="actions" class="w100">
        
        @if ( empty($activities) )
        <p class="instructions">
    	    Welcome to Penpal News! Check back soon to meet your Penpal and start the exchange. 
    	    In the meantime, introduce yourself in your <a href="/student/profile">profile</a>    
        </p>			        	                    		    	
        @endif
        @foreach( $activities as $activity)           
		<li class="action w100">
			<div class="left avatar a70">
				<div class="image-wrap" style="background-image: url(<?php echo $activity->user->avatar ?>);"></div>
			</div><!-- end Avatar -->            
			<div class="right w80">
				<div class="action-details">
					<div class="action-auth oring w80">
						<div class="action-title left">
						@if($activity->belongsToUser) You @else {{$activity->user->first_name}} @endif<b>{{$activity->action}}</b> <small>{{$activity->time_ago}} ago</small></div>
					</div> <!-- end Author and Date -->
                    
                    {{$activity->output}}
                    
				</div>
			</div><!-- end Right -->
		</li><!-- end Comment Item -->
        @endforeach
	</ul>            
	
	<center><?php echo $this->pagination->create_links() ?></center>
    
</div>