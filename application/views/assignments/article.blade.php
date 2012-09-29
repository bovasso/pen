@layout('assignments/base')
@section('scripts')
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {       	        
        $(".assignment-tab-2").addClass('ui-state-active');
        
        $(".save_as_draft").on('click', function(event) {
            event.preventDefault();
            $.ajax({  
              type: "POST",  
              url: "/assignments/save/" + {{$assignment->id}},  
              data: $('#answers').serialize(),  
              success: function(data) {
                  humane.log("Your work has been saved!");
              }              
            });                              
        });
    });    
</script>
@endsection
@section('article')
<div id="answer-questions" class="w100">
	<div class="left w60">
		<h2>{{$article->title}}</h2>
        <p class="subhead">Author: {{$article->author}} {{$article->date}}</p>
        <img src="{{$article->primary_image}}"/>
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
@endsection