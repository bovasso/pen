<div class="action-article">
	<h4>{{$article->title}}</h4>
	<div class="article-image left">
  	    @if( $article->primary_image )    
		    <img src="http://src.sencha.io/90/80/{{$article->primary_image}}"/>
		@endif
		@if( $article->custom_image )     
	   	    <img src="/public/articles/mini/{{$article->custom_image}}"/>
	   	@endif
		@if( $article->hasNoImage )
            <img src="/public/images/default_article_image.png"/>
		@endif                                                                                                                                          				    	          
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
					<div class="image-wrap" style="background-image: url(<?php echo $student->avatar ?>"></div>
			</div><!-- end Avatar -->
			
			<div class="comment-form right w80">
                  <?php echo $this->formbuilder->open( '/student/dashboard/save_reply', array('id'=>'comment')) ?>                                
					<?php echo $this->formbuilder->textarea( 'comment', '', '', array('class'=>'w90')) ?>       
                    <?php echo $this->formbuilder->hidden( 'activity_id', $activity->id) ?>               							                             
                    <?php echo $this->formbuilder->hidden( 'parent_id', $assignment->id) ?>               							                                                 
					<p class="btn-wrapper right">
          				<input type="submit" class="submit btn" value="reply"/>
          			</p>                        			
				</form>
			</div><!-- end Comment Form -->					
		</div><!-- end Comments BEFORE SUBMISSION-->        

	</div><!-- end Comments -->
</div><!-- end Articla QA -->
@endforeach