@layout('assignments/base')
@section('scripts')
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {       	        
        $(".assignment-tab-3").addClass('ui-state-active');
    });    
</script>
@endsection
@section('article')
@if(empty($assignments))
<div class="tab-inner">
    <div id="answer-questions" class="w100">
    	<div class="left w60">
    	    Your penpal hasn't submitted responses yet.
    	</div>
    </div>
</div>
@endif
@foreach($assignments as $homework)
<div class="tab-inner">
    <div id="answer-questions" class="w100">
    	<div class="left w60">
    		<h2>{{$homework->article->title}}</h2>
            <p class="subhead">Author: {{$homework->article->author}} {{$homework->article->date}}</p>
            <img src="http://src.sencha.io/354/194/{{$homework->article->primary_image}}"/>
            <p>
                {{$homework->article->content}}
            </p>		
    		<center class="missing-media">
    			<hr />
    			<br />
    			<p>Missing audio and video?</p>
    			<p class="btn-wrapper">
    				<?php echo anchor_popup($homework->article->source, 'View Original', array('class'=>"submit btn")) ?>
    			</p>
    		</center>
    	</div>
    	<!-- end Left -->
    	<div id="assignments-right" class="right w40">
            @include('assignments/_comment_on_answers', array('homework'=>$homework))        
    	</div><!-- end Right -->
    </div>
</div>
@endforeach
@endsection