@layout('assignments/base')
@section('scripts')
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {       	        
        $(".assignment-tab-2").addClass('ui-state-active');
        
        $('#send_to_penpals').on('click', function(event) {
           event.preventDefault();
           $('#answers').attr('action', '/assignments/save_and_send');
           $('#answers').submit(); 
        });
    });    
</script>
@endsection
@section('article')
<div class="tab-inner">
    <div id="answer-questions" class="w100">
    	<div class="left w60">
    		<h2>{{$article->title}}</h2>
            <p class="subhead">Author: {{$article->author}} Date: {{$article->date}}</p>
            <img src="http://src.sencha.io/354/194/{{$article->primary_image}}"/>
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
            @include('assignments/_questions')        
    	</div><!-- end Right -->
    </div>
</div>
@endsection