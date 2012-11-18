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
					<div class="image-wrap" style="background-image: url(<?php $reply->avatar ?>);"></div>
			</div><!-- end Avatar -->
		    <div class="comment-form right w80">            					
            <p>
                {{$reply->first_name}} wrote <br/>
                {{$reply->value}} <br/>
                <small>{{$reply->time_ago}}</small>
            </p>
			</div>                                
        </div>
        @endforeach
        
        @if ($message->user->id !== $student->id )
        <div class="comment-container left w100">
			<div class="left avatar a55 w10">
					<div class="image-wrap" style="background-image: url(<?php echo $student->avatar ?>);"></div>
			</div><!-- end Avatar -->
			
			<div class="comment-form right w80">
                  <?php echo $this->formbuilder->open( '/student/dashboard/save_reply', array('id'=>'comment')) ?>                                
					<?php echo $this->formbuilder->textarea( 'comment', '', '', array('class'=>'w90')) ?>       
                    <?php echo $this->formbuilder->hidden( 'source', 'message') ?>               							                             					
                    <?php echo $this->formbuilder->hidden( 'activity_id', $message->id) ?>               							                             
					<p class="btn-wrapper right">
          				<input type="submit" class="submit btn" value="reply"/>
          			</p>                        			
				</form>
			</div><!-- end Comment Form -->					
		</div><!-- end Comments BEFORE SUBMISSION-->
        @endif
	</div><!-- end Comments -->
</div><!-- end Articla QA -->