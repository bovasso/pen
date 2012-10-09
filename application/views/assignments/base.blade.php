@layout('layouts/main')
@section('content')
<div class="wrapper" id="assignments">
	<h1>All Assignments</h1>
	<div id="assignment-tabs" class="tabs">
		<ul>
			<li class="assignment-tab-1"><a class="nav-link" href="/assignments"><span>1.</span>select a news story</a></li>
			<li class="assignment-tab-2"><a class="nav-link" href="#"><span>2.</span>answer the questions</a></li>
			<li class="assignment-tab-3"><a class="nav-link" href="#"><span>3.</span>comment on your penpals answers</a></li>
		</ul>
		<div id="assignment-tabs-1" class="tab">
			<div class="tab-inner">
			    @yield('overview')
			</div>
		</div><!-- end Assignment Tab 1 -->

		<div id="assignment-tabs-2" class="tab">
			<div class="tab-inner">
                @yield('article')
			</div>
		</div><!-- end Assignment Tab 2 -->

		<div id="assignment-tabs-3" class="tab">
			<div id="assignment-feed" class="tab-inner">
			    @yield('comment')
			</div>
		</div>
	</div>
</div>
@endsection
