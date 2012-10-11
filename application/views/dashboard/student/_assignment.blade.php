<div class="action-article">
	<h4>{{$article->title}}</h4>
	<div class="article-image left"><img src="{{$article->primary_image}}"/></div><!-- end Article Image -->
	<div class="article-details right w80">
		<p>{{$article->abstract}}</p>
		<p><a href="#" alt="Article Name">Read More</a></p>
	</div>
</div><!-- end Article Share --> 
@foreach($answers as $answer )
<div class="article-qa left w100">
	<h4>{{$answer->question->title}}</h4>
	<p>{{$answer->content}}</p>

	<div class="comment-container left w100">

        @foreach( $answer->replies as $reply)
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
                      <?php echo $this->formbuilder->hidden( 'activity_id', $answer->id) ?>               							                             
					<p class="btn-wrapper right">
          				<input type="submit" class="submit btn" value="reply"/>
          			</p>                        			
				</form>
			</div><!-- end Comment Form -->					

		</div><!-- end Comments BEFORE SUBMISSION-->
	</div><!-- end Comments -->
</div><!-- end Articla QA -->
@endforeach