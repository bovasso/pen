@layout('layouts/main')
@section('content') 
<div style="margin-left:30px">
<select id="article_dropdown">
@foreach($assignment->articles as $assignment_article)
    <option value="{{$assignment_article->id}}" <?php if ($article->id == $assignment_article->id ) echo 'selected=selected'?>>{{$assignment_article->title}}</option>
@endforeach        
</select>       
&nbsp;|&nbsp;
<small><a href="/teacher/dashboard">back to dashboard</a></small>
</div>
<div class="tab-inner">                                             
    <div id="answer-questions" class="w100">
    	<div class="left w60">
    		<h2>{{$article->title}}</h2>
            <p class="subhead">Author: {{$article->author}} Date: {{$article->date}}</p>
             @if( $article->primary_image )
                <img src="http://src.sencha.io/354/194/{{$article->primary_image}}"/>
			@endif			
			@if( $article->custom_image )
                <img src="/public/articles/large/{{$article->custom_image}}"/>
			@endif			
			@if( $article->hasNoImage )
                <img src="/public/images/default_article_image.png"/>
			@endif
            <p>
                {{$article->content}}
            </p>		
    		<center class="missing-media">
    			<hr />
    			<br />
    			<p>Missing audio and video?</p>
    			<p class="btn-wrapper">
    				<?php echo anchor_popup($article->source, 'View Original', array('class'=>"submit btn")) ?>
    			</p>
    		</center>
    	</div>
    	<!-- end Left -->
    	<div id="assignments-right" class="right w40">
            <!-- begin Before Assignment Posted -->
            <h2 style="margin-left: 15px">Questions</h2>   
            <div class="questions">                
            	<ul class="w100">
            	    @foreach( $assignment->questions as $key => $question)
            		<li class="action w100">
            			<div class="article-qa left w100">
            				<h4>Question {{$key + 1}}</h4>
            				<p>{{$question->title}}</p>
            			</div><!-- end Articla QA -->
            		</li><!-- end Comment Item -->
            	    @endforeach	 
            	    @if ( empty($assignment->questions) )
            	         <li>Sorry, no questions have been posted yet</li>
            	    @endif   
            	</ul><!-- end Questions List -->
            </div>
            <!-- end Questions Before Assignment Posted-->    	</div><!-- end Right -->
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {       	
        $('#article_dropdown').on('change', function(event) {
            event.preventDefault();
            var article_id = $('#article_dropdown option:selected').val();
            location.href = '/teacher/dashboard/article/' + article_id;
        });
    });
</script>      
@endsection
