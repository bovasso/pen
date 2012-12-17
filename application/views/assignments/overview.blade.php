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
            @if ( !$assignment->video )
                <img src="http://placehold.it/260x150/C0C0C0/E3EEFF&text=video+coming+soon">
            @endif            
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
    				<a href="/assignments/article/{{$article->id}}">
                    @if( $article->primary_image )    
    				    <img src="http://src.sencha.io/354/194/{{$article->primary_image}}"/>
    				@endif
    				@if( $article->custom_image )     
				   	    <img src="/public/articles/small/{{$article->custom_image}}"/>
				   	@endif
    				@if( $article->hasNoImage )
                        <img src="/public/images/default_article_image.png"/>
    				@endif                                                                                                                                          				
    				</a>	
    			</div>
    			<div class="right w70">
    				<h4><a href="/assignments/article/{{$article->id}}">{{$article->title}}</a></h4>
                    <p>{{$article->abstract}}</p>
    				<p class="read-more"><a href="/assignments/article/{{$article->id}}">Read More...</a></p>
    			</div><!-- end Featured Assignment Topic -->
    		</li>     		
    		@endforeach
    		@if (count($assignment->articles) == 0)
    		      <li>Sorry, it doesn't look like any articles were found for this assignment.</li>
    		      <li>@include('partials/support')</li>
    		@endif
    	</ul>
    </div>
</div>
@endsection

