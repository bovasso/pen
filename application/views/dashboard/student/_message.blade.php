<div class="article-qa left w100">     
	<div class="comment-container left w100">
        @if ($message->user->id !== $student->id )	    
	    <div class="left avatar a55 w10">
    			<div class="image-wrap" style="background-image: url(<?php echo $message->user->avatar ?>);"></div>
    	</div><!-- end Avatar -->    	         
    	<div class="comment-form right w80">
			<p>{{$message->value}}</p>
		</div><!-- end Comment Form -->		
		@else
    	<div class="comment-form w80">
			<p>{{$message->value}}</p>
		</div><!-- end Comment Form -->		
    	@endif

        @foreach( $message->replies as $reply)
        <div class="comment-container left w100">
			<div class="left avatar a55 w10">
					<div class="image-wrap" style="background-image: url(<?php echo $reply->user->avatar ?>);"></div>
			</div><!-- end Avatar -->
		    <div class="comment-form right w80">            					
            <p>     
                @if ($reply->user->id !== $student->id ) 
                    {{$reply->first_name}} wrote <br/>
                @else
                    you replied <br/>
                @endif
                {{$reply->value}} <br/>
                <small>{{$reply->time_ago}} ago</small>
            </p>
			</div>                                
        </div>
        @endforeach
        
        <div class="comment-container left w100">
			<div class="left avatar a55 w10">
					<div class="image-wrap" style="background-image: url(<?php echo $student->avatar ?>);"></div>
			</div><!-- end Avatar -->
			
			<div class="comment-form right w80">
                  <?php echo $this->formbuilder->open( '/student/dashboard/save_reply', array('id'=>'comment')) ?>                                
					<?php echo $this->formbuilder->textarea( 'comment', '', '', array('class'=>'w90')) ?>       
                    <?php echo $this->formbuilder->hidden( 'source', 'message') ?>               							                             					
                    <?php echo $this->formbuilder->hidden( 'parent_id', $message->id) ?>                           
                    <?php echo $this->formbuilder->hidden( 'activity_id', $message->activity_id) ?>               							                                     							                                                 
                            							                             
					<p class="btn-wrapper right">
          				<input type="submit" class="submit btn" value="reply"/>
          			</p>                        			
				</form>
			</div><!-- end Comment Form -->					
		</div><!-- end Comments BEFORE SUBMISSION-->
	</div><!-- end Comments -->
</div><!-- end Articla QA -->