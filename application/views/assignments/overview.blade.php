@layout('assignments/base')
@section('scripts')
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {       	
        $(".assignment-tab-1").addClass('ui-state-active');
    });
</script>
@endsection
@section('overview')
<div class="tab-inner">
    <div class="w100 featured-topic">
    	<div class="img-wrapper left "> 
            {{$assignment->video}}
    	</div>
    	<div class="right">
    		<h2>{{$assignment->name}}</h2>
    		<p>{{$assignment->description}}</p>
    	</div>
    </div><!-- end Featured Assignment Topic -->

    <div class="w100">
    	<h3>Select a News Story about the {{$assignment->name}}</h3>
    	<ul class="assignments-list">
            @foreach( $assignment->articles as $article)					    
    		<li>
    			<div class="left w30">
    				<a href="/assignments/article/{{$article->id}}"><img src="http://src.sencha.io/354/194/{{$article->primary_image}}"/></a>	
    			</div>
    			<div class="right w70">
    				<h4><a href="/assignments/article/{{$article->id}}">{{$article->title}}</a></h4>
                    <p>{{$article->abstract}}</p>
    				<p class="read-more"><a href="/assignments/article/{{$article->id}}">Read More...</a></p>
    			</div><!-- end Featured Assignment Topic -->
    		</li>
    		@endforeach
    	</ul>
    </div>
</div>
@endsection

