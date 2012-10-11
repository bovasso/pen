<div class="article-qa left w100">
	<div class="comment-container left w100">
		<div class="comment-form right w90">
			<p>{{$comment->value}}</p>
		</div><!-- end Comment Form -->

        @foreach( $comment->replies as $reply)
        <div class="comment-container left w100">
			<div class="left avatar a55 w10">
					<div class="image-wrap" style="background-image: url(<?php echo asset_url().'images/default_avatars/pink55.png'?>);"></div>
			</div><!-- end Avatar -->
		    <div class="comment-form right w80">            					
            <p>
                {{$reply->first_name}} wrote <br/>
                {{$reply->value}} <br/>
                <small>{{$reply->created_at}}</small>
            </p>
			</div>                                
        </div>
        @endforeach
        
        <div class="comment-container left w100">
			<div class="left avatar a55 w10">
					<div class="image-wrap" style="background-image: url(<?php echo asset_url().'images/default_avatars/pink55.png'?>);"></div>
			</div><!-- end Avatar -->
			
			<div class="comment-form right w80">
                  <?php echo $this->formbuilder->open( '/student/dashboard/save_reply', array('id'=>'comment')) ?>                                
					<?php echo $this->formbuilder->textarea( 'comment', '', '', array('class'=>'w90')) ?>       
                      <?php echo $this->formbuilder->hidden( 'activity_id', $comment->id) ?>               							                             
					<p class="btn-wrapper right">
          				<input type="submit" class="submit btn" value="reply"/>
          			</p>                        			
				</form>
			</div><!-- end Comment Form -->					

		</div><!-- end Comments BEFORE SUBMISSION-->
        
	</div><!-- end Comments -->
</div><!-- end Articla QA -->