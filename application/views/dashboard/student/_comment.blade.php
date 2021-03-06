<div class="article-qa left w100">     
    <p><b>{{$comment->answer->question->title}}</b></p>
    <p>
        {{$comment->answer->content}} <br/>
        <small>{{$comment->answer->time_ago}} ago</small>
    </p>
	<div class="comment-container left w100">
	    <div class="left avatar a55 w10">       
    			<div class="image-wrap" style="background-image: url(<?php echo $comment->user->avatar ?>);"></div>
    	</div><!-- end Avatar -->    	
		<div class="comment-form right w80">
			<p>{{$comment->value}}</p>
		</div><!-- end Comment Form -->

        @foreach( $comment->replies as $reply)
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
                    <?php echo $this->formbuilder->hidden( 'source', 'comment') ?>               							                             					
                    <?php echo $this->formbuilder->hidden( 'activity_id', $comment->activity_id) ?>               							                             
                    <?php echo $this->formbuilder->hidden( 'parent_id', $comment->id) ?>               							                                                 
					<p class="btn-wrapper right">
          				<input type="submit" class="submit btn" value="reply"/>
          			</p>                        			
				</form>
			</div><!-- end Comment Form -->					
		</div><!-- end Comments BEFORE SUBMISSION-->
        
	</div><!-- end Comments -->
</div><!-- end Articla QA -->